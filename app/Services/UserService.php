<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Validation\Rule;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Validator;

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

    public function update(User $user, $newUserData){


        $valid = Validator::make($newUserData, [
            'username' => 
            [
                'min:4',
                'max:20',
                Rule::unique('users')->ignore($user->id),
            ],
            'email' => 
            [
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'min:8|max:20',
        ]);

        if ($valid) {

            $this->userRepository->update($user, $newUserData);
            $user->save();
            return $user;

        }
    }

    public function delete($id){
        return $this->userRepository->delete($id);
    }

    
    /**
     * @todo more features useful in the app
     */
}
?>