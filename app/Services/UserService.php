<?php

namespace App\Services;
use App\Repositories\User\UserRepository;


class UserService
{
    public function __construct(protected UserRepository $userRepository)
    {
    }

    public function find($id){
        return $this->userRepository->find($id);
    }
}
?>