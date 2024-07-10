<?php

namespace Modules\Student\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Student\Http\Requests\SignInRequest;
use Modules\Student\Http\Requests\SignUpRequest;
use Modules\Student\Models\Student;

class AuthController extends Controller
{

    public function showSignInForm()
    {
        return view('student::layouts.auth.sign-in');
    }
    protected function guard()
    {
        return Auth::guard('student');
    }
    public function signingIn(SignInRequest $request)
    {
        $validated = $request->validated();

        if (auth()->guard('student')->attempt(['student_number' => $validated['student_number'], 'password' => $validated['password']])) {
            alert()->toast('You have been successfully logged in', 'success');
            return redirect()->route('student.show.exams');
        } else {
            alert()->toast('The student Number or password is incorrect', 'error');
            return redirect()->back()->with(['error' => 'The student Number or password is incorrect']);
        }

    }
    public function showSignUpForm()
    {
        return view('student::layouts.auth.sign-up');
    }
    public function signingUp(SignUpRequest $request)
    {
        $validated = $request->validated();
        dd($validated);
        $student =  Student::create(
            [
                'name' => $validated['name'],
                'student_number' => 'ST' . rand(0, 99) . str()->random(3),
                'mobile' => $validated['mobile'],
                'gender' => $validated['gender'],
                'password' => Hash::make($validated['password']),

            ],
        );
        $this->guard()->login($student);
        alert()->toast('You have been successfully registered', 'success');
        return redirect()->route('student.show.exams');

    }

}
