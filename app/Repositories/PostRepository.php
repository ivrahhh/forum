<?php

namespace App\Repositories;

use App\Contracts\Repository;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PostRepository implements Repository
{
    /**
     * Create a new post
     */
    public function create(array $data): Model
    {
        return Post::create($data + [
            'user_id' => Auth::id(),
        ]);
    }

    /**
     * Get the post with the given id
     */
    public function get(string|int $id): Collection
    {
        return Post::query()->findOrFail($id);
    }

    /**
     * Get all the post
     */
    public function getAll(): Collection
    {
        return Post::all();
    }

    /**
     * Update the given model and return its value
     */
    public function update(Model $post, array $data): Model
    {
        return tap($post)->update($data);
    }
    
    /**
     * Delete the model from database
     */
    public function delete(Model $model): bool
    {
        return $model->delete();    
    }
}