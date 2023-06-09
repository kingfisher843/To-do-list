<?php

namespace App\Repositories\User;

use App\Repositories\User\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface
{
    protected $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function getAll(): Collection
    {
        return $this->user->all();
    }

    public function find($id): User
    {
        return $this->user->find($id);
    }

    public function store($userData)
    {
       return $this->user->create($userData);
    }

    public function update($id, array $newUserData)
    {
        return $this->user->find($id)->update($newUserData);
    }

    public function delete($id)
    {
        return $this->user->delete($id);
    }
}