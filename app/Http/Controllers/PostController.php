<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{

    public function __construct(
        private PostRepository $repository
    ) {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('pages.new-post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request) : RedirectResponse
    {
        $this->repository->create($request->validated()); 

        return back()->with('status', 'New topic has been posted');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post) : View
    {
        return view('pages.show-post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post) : View
    {
        return view('pages.edit-post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post) : RedirectResponse
    {
        $this->repository->update($post, $request->valdited());

        return redirect()->route('posts.show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post) : RedirectResponse
    {
        $this->repository->delete($post);

        return redirect('/')->with('status', 'The topic has been deleted');
    }
}
