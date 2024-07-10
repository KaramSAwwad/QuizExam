<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Http\Requests\SignInRequest;

class SignInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showSignInForm()
    {
        return view('admin::layouts.auth.sign-in');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
    public function signingIn(SignInRequest $request)
    {
        $validated = $request->validated();

        if (auth()->guard('admin')->attempt(['email' => $validated['email'], 'password' =>$validated['password']])) {
            alert()->toast('You have been successfully logged in', 'success');
            return redirect()->route('admin.show.dashboard');
        }
        else {
            alert()->toast('The email or administrative number or password is incorrect', 'error');
            return redirect()->back()->with(['error' => 'The email or password is incorrect']);
        }
    }
}
