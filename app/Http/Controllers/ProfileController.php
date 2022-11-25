<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() : View
    {
        $user = User::with('posts')->get();
    
        return view('pages.profile', compact('user'));
    }
}
