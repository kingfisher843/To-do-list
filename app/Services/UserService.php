<?php

namespace App\Services;
use App\Repositories\User\UserRepository;


class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function find($id){
        return $this->userRepository->find($id);
    }
}
?>