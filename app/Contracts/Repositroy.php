<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface Repository
{
    public function create(array $data) : Model;

    public function get(string|int $id) : Collection;

    public function getAll() : Collection;

    public function update(Model $model, array $data) : Model;

    public function delete(Model $model) : bool;
}