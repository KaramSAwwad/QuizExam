<?php

namespace Modules\Student\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Exam\Models\Answer;
use Modules\Exam\Models\Exam;
use Modules\Exam\Models\Question;
use Modules\Student\Http\Requests\FinishExamRequest;
use Modules\Student\Models\Student;
use Modules\Student\Models\StudentExam;
use Modules\Student\Models\StudentExamQuestionsAnswers;

class ExamController extends Controller
{
    public function index()
    {
        $page_name = "Available Exams";
        $data = Exam::withoutTrashed()->with(['teacher', 'speciality', 'questions'])->withCount('questions')->where('is_draft', 'false')->get();
        $now = Carbon::now();
        if (isset($data) and count($data) > 0) {
            for ($i = 0; $i < count($data); $i++) {
                if ($now->gt($data[$i]->end_at)) {
//                    $available_exams [] = "Closed";
                    //in this case the exam is closed, and we do not need to set any variable on array
                } else {
                    $available_exams [] = $data[$i];
                }
            }
        } else {
            $available_exams [] = 0;
        }
        if (isset($available_exams) and count($available_exams) > 0) {
            for ($i = 0; $i < count($available_exams); $i++) {
                for ($j = 0; $j < count($available_exams[$i]->questions); $j++) {
                    $array_of_mark [$i][] = $available_exams[$i]->questions[$j]->mark;
                }
            }
        } else {
            $available_exams = 0;
            $array_of_mark [0] = 0;
        }
        return view('student::layouts.exams.index', compact(['page_name', 'data', 'available_exams', 'now', 'array_of_mark']));
    }

    public function applyToOpenExam($exam)
    {
        $page_name = "Apply To Exams";
        $student = Student::withoutTrashed()->findOrFail(auth()->user()->id);
        //step1: check exam exist or not
        $exam = Exam::withoutTrashed()->with(['teacher', 'speciality', 'questions.answers'])->where('is_draft', 'false')->findOrFail($exam);
        //step2: check exam active or not
        $now = Carbon::now();
        if ($now->between($exam->start_at, Carbon::parse($exam->start_at)->addMinutes(15))) {
            //in this case exam is active and opened and exam start form less than 14 minutes and 59 seconds
            $student_exams = StudentExam::withoutTrashed()->where([
                ['student_id', $student->id],
                ['exam_id', $exam->id]
            ])->first();
            if ($student_exams == null) {
                // in this case student apply once only, and this only the student can apply for the exam
                alert()->toast('The Exam Is Started Now, Good Lock', 'info');
//                return redirect()->route('student.start.exam', $exam);
                return view('student::layouts.exams.applyingExam', compact('exam', 'student',));

            } else {
                // in this case student apply for once before
                alert()->toast('You Dont Have A Permeation To Apply Again In This Exam', 'error');
                return redirect()->route('student.show.exams');
            }

        } else {
            //in this case exam is closed and exam start form more than 15 minutes and 01 seconds
            alert()->toast('You Dont Have A Permeation To Join Exam After 15 Minutes', 'error');
            return redirect()->route('student.show.exams');
        }
    }

    public function startExam($exam)
    {
        $page_name = "Start Exam";
        $exam = Exam::withoutTrashed()->findOrFail($exam);
        return view('student::layouts.exams.applyingExam', compact('exam', 'page_name'));
    }

    public function finishExam(FinishExamRequest $request, $exam)
    {
        $validated = $request->validated();
        $student = Student::withoutTrashed()->findOrFail(auth()->user()->id);
//        dd($validated);
        $exam = Exam::withoutTrashed()->with(['teacher', 'speciality', 'questions.answers'])->where('is_draft', 'false')->findOrFail($exam);
        $now = Carbon::now();
        $exam_duration = Carbon::parse($exam->start_at)->diffInMinutes(Carbon::parse($exam->end_at));
        if ($now->between($exam->start_at, Carbon::parse($exam->start_at)->addMinutes($exam_duration)->addSecond())) {
            //in this case check if student finish exam within given time
            $student_exams = StudentExam::withoutTrashed()->where([
                ['student_id', $student->id],
                ['exam_id', $exam->id]
            ])->first();
            if ($student_exams == null) {
                // in this case student apply once only, and this only the student can apply for the exam
                /**
                 * Start Save Student Exam Details
                 */
                if (count($validated['questions']) == $exam->questions()->count()) {
                    for ($i = 0; $i < count($validated['questions']); $i++) {
                        $array_keys [] = array_values(array_keys($validated['questions'][$i]));
                        $question_array [] = $array_keys[$i][0];
                        $array_values [] = array_values(array_values($validated['questions'][$i]));
                        $answers_array [] = intval($array_values[$i][0]);
                        $truth_question_answer[] = Answer::withoutTrashed()->select('id', 'question_id', 'is_correct_answer')->where([
                            ['question_id', $question_array[$i]],
                            ['is_correct_answer', 'True']
                        ])->first()->id;
                        if ($answers_array[$i] == $truth_question_answer[$i]) {
                            $student_question_mark [] = $exam->questions[$i]->mark;
                        } else {
                            $student_question_mark [] = 0;
                        }
                    }
//                    dd($validated,$question_array,$truth_question_answer,$answers_array,$student_question_mark);
                    for ($i = 0; $i < count($validated['questions']); $i++) {
                        StudentExamQuestionsAnswers::create([
                            'student_id' => $student->id,
                            'exam_id' => $exam->id,
                            'question_id' => $question_array[$i],
                            'answer_id' => $answers_array[$i],
                            'mark' => $student_question_mark[$i],
                        ]);
                    }
                    StudentExam::create([
                        'student_id' => $student->id,
                        'exam_id' => $exam->id,
                        'mark' => array_sum($student_question_mark),
                    ]);
                    /**
                     * in this steep student exams and saved all answers into database
                     */
                    alert()->toast('You Finished Your Exam Successfully', 'success');
                    return redirect()->route('student.show.my.finished.exams');
                } else {
                    alert()->toast('You Need To Answer All Your Questions', 'error');
                    return redirect()->route('student.apply.to.active.exam', $exam->id);
                }
            } else {
                // in this case student apply for once before
                alert()->toast('You Dont Have A Permeation To Apply Again In This Exam', 'error');
                return redirect()->route('student.show.exams');
            }

        } else {
            //in this case exam is closed and exam start form more than 15 minutes and 01 seconds
            alert()->toast('The Exam Time IS Finished And You Dont Have Permeation To Submit Exam After End Time', 'error');
            return redirect()->route('student.show.exams');
        }
    }

    public function showMyFinishedExams()
    {
        $page_name = "My Finished Exams";
        $data = Student::withoutTrashed()->with(['exams.exam', 'exams', 'exams.exam.questions'])->findOrFail(auth()->user()->id);
        if (isset($data->exams) and count($data->exams) > 0) {
            for ($i = 0; $i < count($data->exams); $i++) {
                $array_of_exam_questions_marks [] = $data->exams[$i]->exam->questions()->select('mark')->get()->toArray();
                for ($j = 0; $j < count($array_of_exam_questions_marks[$i]); $j++) {
                    $array_of_questions_mark [$i] [] = $array_of_exam_questions_marks[$i][$j]['mark'];
                }
            }
        } else {
            $array_of_questions_mark [] = 0;
        }


        return view('student::layouts.exams.myFinishedExams', compact('data', 'page_name', 'array_of_questions_mark'));
    }

    public function previewMyFinishedExam($exam)
    {
        $page_name = "Preview My Finished Exam";
        $student = Student::withoutTrashed()->findOrFail(auth()->user()->id);
        $exam = Exam::withoutTrashed()->findOrFail($exam);
        $check = StudentExam::withoutTrashed()->where([
            ['exam_id', $exam->id],
            ['student_id', $student->id],
        ])->first();
        $now = Carbon::now();
        if ($check != null and $now->gt($exam->end_at)) {
            return view('student::layouts.exams.preview', compact(['exam', 'page_name']));
        } else {
            alert()->toast('You Dont Have A Permeation To Preview This Exam ', 'error');
            return redirect()->route('student.show.my.finished.exams');
        }


    }

}
