<?php

namespace Modules\Student\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Student\Models\Student;

class StudentController extends Controller
{
    protected function guard()
    {
        return Auth::guard('student');

    }

    public function index()
    {
        $page_name = "Student Panel";
        $student = Student::withoutTrashed()->with('exams')->findOrFail(auth()->user()->id);
        return view("student::layouts.panel", compact(['page_name','student']));
    }

    public function Logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('show.student.login.form');

    }
}
