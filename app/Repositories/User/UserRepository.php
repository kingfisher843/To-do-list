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
    public function getAll()
    {
        return $this->user->getAll();
    }
    public function find($id)
    {
        return $this->user->findUser($id);
    }
    public function delete($id)
    {
        return $this->user->deleteUser($id);
    }
}