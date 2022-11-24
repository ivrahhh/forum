<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function index() : View|RedirectResponse
    {
        if(request()->user()->hasVerifiedEmail()) {
            return redirect('/');
        }

        return view('pages.auth.email-verify');
    }

    public function store(EmailVerificationRequest $request) : RedirectResponse
    {
        if(! $request->user()->hasVerifiedEmail()) {
            $request->fulfill();
        }
        
        return redirect('/');
    }
}
