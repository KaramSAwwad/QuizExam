<?php

namespace Modules\Teacher\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Exam\Models\Exam;
use Modules\Student\Models\Student;
use Modules\Teacher\Models\Teacher;

class TeacherController extends Controller
{
    protected function guard()
    {
        return Auth::guard('teacher');

    }

    public function index()
    {
        $page_name = "Teachers Panel";
        $teacher = Teacher::withoutTrashed()->with('exams.students')->findOrFail(auth()->user()->id);

        if (isset($teacher->exams) and $teacher->exams->count() > 0) {
            for ($i = 0; $i < count($teacher->exams); $i++) {
                $count_of_student_per_exam [] = $teacher->exams[$i]->students->count();
                $count_of_question_per_exam [] = $teacher->exams[$i]->questions->count();
                if ($count_of_student_per_exam[$i] > 0) {
                    for ($j = 0; $j < count($teacher->exams[$i]->students); $j++) {
                        $array_of_mark [] = $teacher->exams[$i]->students[$j]->mark;
                    }
                } else {
                    $count_of_student_per_exam [] = 0;
                    $array_of_mark [] = 0;
                }
            }
        } else {
            $count_of_student_per_exam [] = 0;
            $array_of_mark [] = 0;
            $count_of_question_per_exam [] = 0;
        }

        return view("teacher::layouts.panel", compact(['page_name', 'teacher', 'count_of_student_per_exam','array_of_mark','count_of_question_per_exam']));
    }

    public function Logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('show.teacher.login.form');

    }
}
