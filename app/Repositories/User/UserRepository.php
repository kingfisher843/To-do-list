<?php

namespace App\Repositories\User;

use App\Repositories\UserInterface as UserInterface;
use App\User;

class UserRepository implements UserInterface
{
    public $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function getAll(): Collection
    {
        return $this->user->getAll();
    }

    public function find($id): User
    {
        return $this->user->find($id);
    }

    public function store($userData)
    {
        return $this->user->store($userData);
    }

    public function update($id, array $newUserData)
    {
        return $this->task->update($newUserData);
    }

    public function delete($id)
    {
        return $this->user->delete($id);
    }
}