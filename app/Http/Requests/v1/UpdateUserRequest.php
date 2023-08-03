<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('user:update');
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if ($method == 'PUT'){
            return [
                'username' => 'required|min:4|max:20|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|max:20',
            ];
        } else {
            return [
                'username' => 'sometimes|required|min:4|max:20|unique:users',
                'email' => 'sometimes|required|email|unique:users',
                'password' => 'sometimes|required|min:8|max:20',
            ];
        }
        
    }
}

