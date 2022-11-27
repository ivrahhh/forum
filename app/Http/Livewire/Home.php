<?php

namespace App\Http\Livewire;

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    /**
     * Toggle the like relationship between the user and post
     * 
     * @param int $id Post ID
     */
    public function toggleLike(int $id) : void
    {
        Auth::user()->likes()->toggle($id);
    }

    public function render()
    {
        $posts =  Post::with(['user:id,username','likes'])->paginate(10);
        
        return view('livewire.home', compact('posts'))
            ->extends('layouts.main');
    }
}
