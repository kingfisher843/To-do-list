<?php

namespace App\Repositories\User;

use App\Models\User;

interface UserInterface {

    public function getAll();

    public function find($id);

    public function store(array $userData);

    public function update(User $user, array $newUserData);

    public function delete($id);
}