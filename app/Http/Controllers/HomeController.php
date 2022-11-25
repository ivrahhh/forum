<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $posts =  Post::with(['user:id,username'])->paginate(10);
        return view('pages.home', compact('posts'));
    }
}
