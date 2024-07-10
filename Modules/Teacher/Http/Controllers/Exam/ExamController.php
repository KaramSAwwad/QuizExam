<?php

namespace Modules\Teacher\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Exam\Models\Answer;
use Modules\Exam\Models\Exam;
use Modules\Exam\Models\Question;
use Modules\Teacher\Http\Requests\CreateDraftExamRequest;
use Modules\Teacher\Http\Requests\SaveExamQuestionsRequest;
use Modules\Teacher\Http\Requests\UpdateExamRequest;
use Modules\Teacher\Models\Teacher;

class ExamController extends Controller
{
    public function index()
    {
        $page_name = "Exams";
        $data = Exam::withoutTrashed()->where('teacher_id', auth()->user()->id)->get();
        for ($i = 0; $i < count($data); $i++) {
            for ($j = 0; $j < count($data[$i]->questions); $j++) {
                $array_of_mark [$i][] = $data[$i]->questions[$j]->mark;
            }
        }

        return view('teacher::layouts.exams.index', compact(['page_name', 'data', 'array_of_mark']));
    }

    public function create()
    {
        $page_name = "Create New Exam";
        return view('teacher::layouts.exams.create', compact(['page_name']));
    }

    public function createDraftExam(CreateDraftExamRequest $request)
    {
        $validated = $request->validated();
        $teacher = Teacher::withoutTrashed()->findOrFail(auth()->user()->id);
        $exam = Exam::create([
            'speciality_id' => $teacher->speciality_id,
            'teacher_id' => $teacher->id,
            'title' => $validated['title'],
            'num_of_questions' => $validated['num_of_questions'],
            'start_at' => $validated['start_at'],
            'end_at' => $validated['end_at'],
            'is_draft' => 'true',
        ]);
        alert()->toast('The Exam Created Successfully,And You Well Insert The Questions In This Step ', 'successes');
        return redirect()->route('teacher.fill.exam.questions', $exam->id);
    }

    public function fillExamQuestions($exam)
    {
        $page_name = "Fill Questions";
        $teacher = Teacher::withoutTrashed()->findOrFail(auth()->user()->id);
        $exam = Exam::withoutTrashed()->where('teacher_id', $teacher->id)->findOrFail($exam);
        if ($exam->is_draft == "true") {
            return view('teacher::layouts.exams.insertExamQuestionForm', compact(['exam', 'page_name']));

        } else {
            alert()->toast('You Dont Have A Permeation To Show This Page', 'error');
            return redirect()->route('teacher.show.exams');
        }
    }

    public function saveExamQuestions(SaveExamQuestionsRequest $request, $exam)
    {
        $validated = $request->validated();
        $teacher = Teacher::withoutTrashed()->findOrFail(auth()->user()->id);
        $exam = Exam::withoutTrashed()->where('teacher_id', $teacher->id)->findOrFail($exam);
//       dd($validated,$validated['questions'][0]['answer'][0]);
        if ($exam->is_draft == "true") {
            for ($i = 0; $i < $exam->num_of_questions; $i++) {
                $question[] = Question::create([
                    'exam_id' => $exam->id,
                    'question_title' => $validated['questions'][$i]['title'],
                    'question_text' => $validated['questions'][$i]['text'],
                    'question_image' => null,
                    'mark' => $validated['questions'][$i]['mark'],
                ]);
                for ($j = 0; $j < count($validated['questions'][$i]['answer']); $j++) {
                    if ($j == 0) {
                        Answer::create([
                            'question_id' => $question[$i]->id,
                            'answer_text' => $validated['questions'][$i]['answer'][$j],
                            'is_correct_answer' => "True",

                        ]);
                    } else {
                        Answer::create([
                            'question_id' => $question[$i]->id,
                            'answer_text' => $validated['questions'][$i]['answer'][$j],
                            'is_correct_answer' => "False",

                        ]);
                    }

                }
            }
            $exam->update([
                'is_draft' => 'false',
            ]);
            alert()->toast('The Exam And Question Created Successfully', 'successes');
            return redirect()->route('teacher.show.exams');
        } else {
            alert()->toast('You Dont Have A Permeation To Show This Page', 'error');
            return redirect()->route('teacher.show.exams');
        }

    }

    function deleteExam($exam)
    {
        $teacher = Teacher::withoutTrashed()->findOrFail(auth()->user()->id);
        $exam = Exam::withoutTrashed()->where('teacher_id', $teacher->id)->findOrFail($exam);
        $questions = $exam->questions()->get();
        for ($i = 0; $i < count($questions); $i++) {
            $questions[$i]->answers()->delete();
        }
        $questions->each->delete();
        $exam->delete();
        alert()->toast('The Exam And Its Questions And Its Answers Were Deleted Successfully', 'successes');
        return redirect()->route('teacher.show.exams');
    }

    function showEditForm($exam)
    {
        $page_name = "Edit Exam";
        $teacher = Teacher::withoutTrashed()->findOrFail(auth()->user()->id);
        $exam = Exam::withoutTrashed()->with('questions.answers')->where('teacher_id', $teacher->id)->findOrFail($exam);
        return view('teacher::layouts.exams.edit', compact(['exam', 'teacher', 'page_name']));
    }

    public function updateExam(UpdateExamRequest $request, $exam)
    {
        $validated = $request->validated();
        $teacher = Teacher::withoutTrashed()->findOrFail(auth()->user()->id);
        $exam = Exam::withoutTrashed()->where('teacher_id', $teacher->id)->findOrFail($exam);
        if ($exam->is_draft == "false") {
            $now = Carbon::now();
            if ($now->gt($exam->start_at) and $now->gt($exam->end_at)) {
                //in this case the exam closed
                alert()->toast('You Can not Update Closed Exams ', 'error');
                return redirect()->route('teacher.show.exams');
            } else {
                if ($now->lt($exam->start_at)) {
                    //in this case the exam schedule
                    $exam->update([
                        'title' => $validated['title'],
                        'start_at' => $validated['start_at'],
                        'end_at' => $validated['end_at'],
                    ]);

                } elseif (($now->between($exam->start_at, $exam->end_at))) {
                    $exam->update([
                        //in this case the exam active
                        'title' => $validated['title'],
                        'end_at' => $validated['end_at'],
                    ]);
                }
                $questions = $exam->questions()->get();
                for ($i = 0; $i < $questions->count(); $i++) {
                    $questions[$i]->update([
                        'question_title' => $validated['questions'][$i]['title'],
                        'question_text' => $validated['questions'][$i]['text'],
                        'question_image' => null,
                        'mark' => $validated['questions'][$i]['mark'],
                    ]);
                    $answers [] = $questions[$i]->answers()->get();
                    for ($j = 0; $j < $answers[$i]->count(); $j++) {
                        if ($j == 0) {
                            $answers[$i][$j]->update([
                                'answer_text' => $validated['questions'][$i]['answer'][$j],
                                'is_correct_answer' => "True",

                            ]);
                        } else {
                            $answers[$i][$j]->update([
                                'answer_text' => $validated['questions'][$i]['answer'][$j],
                                'is_correct_answer' => "False",

                            ]);
                        }

                    }
                }
                alert()->toast('The Exam And Question And Answers Updated Successfully', 'successes');
                return redirect()->route('teacher.show.exams');
            }
        } else {
            alert()->toast('You Dont Have A Permeation To Show This Page', 'error');
            return redirect()->route('teacher.show.exams');
        }
    }

    public function previewExam($exam)
    {
        $page_name = "Preview Exam";
        $teacher = Teacher::withoutTrashed()->findOrFail(auth()->user()->id);
        $exam = Exam::withoutTrashed()->where('teacher_id', $teacher->id)->findOrFail($exam);
        return view('teacher::layouts.exams.preview', compact(['exam', 'page_name']));
    }
}
