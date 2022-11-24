<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Repositories\UserRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserRegistrationController extends Controller
{
    public function __construct(
        private UserRepository $repository
    ) {
    }

    public function create() : View
    {
        return view('pages.auth.register');
    }

    public function store(RegistrationRequest $request) : RedirectResponse
    {
       $user = $this->repository->create($request->getValidatedWithHashedPassword());

       Auth::login($user);

       return redirect('/');
    }
}
