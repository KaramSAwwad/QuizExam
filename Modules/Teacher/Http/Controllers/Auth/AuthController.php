<?php

namespace Modules\Teacher\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Constant\Models\Speciality;
use Modules\Teacher\Http\Requests\SignInRequest;
use Modules\Teacher\Http\Requests\SignUpRequest;
use Modules\Teacher\Models\Teacher;

class AuthController extends Controller
{
    public function showSignInForm()
    {
        return view('teacher::layouts.auth.sign-in');
    }

    protected function guard()
    {
        return Auth::guard('teacher');
    }

    public function signingIn(SignInRequest $request)
    {
        $validated = $request->validated();

        if (auth()->guard('teacher')->attempt(['teacher_number' => $validated['teacher_number'], 'password' => $validated['password']])) {
            alert()->toast('You have been successfully logged in', 'success');
            return redirect()->route('teacher.show.dashboard');
        } else {
            alert()->toast('The teacher Number or password is incorrect', 'error');
            return redirect()->back()->with(['error' => 'The teacher Number or password is incorrect']);
        }

    }

    public function showSignUpForm()
    {
        $specialities = Speciality::withoutTrashed()->get();
        return view('teacher::layouts.auth.sign-up', compact('specialities'));
    }


    public function signingUp(SignUpRequest $request)
    {
        $validated = $request->validated();
        $teacher =  Teacher::create(
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'teacher_number' => 'TE' . rand(0, 99) . str()->random(3),
                'mobile' => $validated['mobile'],
                'speciality_id' => $validated['speciality_id'],
            ],
        );
        $this->guard()->login($teacher);
        alert()->toast('You have been successfully registered', 'success');
        return redirect()->route('teacher.show.dashboard');

    }


}
