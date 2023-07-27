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

    public function update(User $user, array $newUserData)
    {
        if (isset($newUserData["username"])){

            $user->username = $newUserData["username"];

        }
        
        //This condition will be useful later to send confirm on new adress
        if (isset($newUserData["email"])){

            $user->email = $newUserData["email"];

        }
        if (isset($newUserData["password"])){

            $user->password = bcrypt($newUserData["password"]);

        }

        return $user;
        
    }

    public function delete($id)
    {
        return $this->user->delete($id);
    }
}