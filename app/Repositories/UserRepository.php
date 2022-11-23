<?php

namespace App\Repositories;

use App\Contracts\Repository;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements Repository
{
    /**
     * Create a new user
     */
    public function create(array $data): Model
    {
        return User::create($data);
    }

    /**
     * Get the user from the database
     */
    public function get(string|int $id): Collection
    {
        return User::query()->findOrFail($id);
    }

    /**
     * Get all the user from the database
     */
    public function getAll(): Collection
    {
        return User::all();
    }
    
    /**
     * Update the user data and return its value
     */
    public function update(Model $model, array $data): Model
    {
        return tap($model)->update($data);
    }

    /**
     * Delete the user from the database
     */
    public function delete(Model $model): bool
    {
        return $model->delete();
    }
}