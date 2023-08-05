<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'sometimes|required|min:4|max:20|unique:users',
            'email' => 'sometimes|required|email|unique:users',
            'old_password' => 'sometimes|required|min:8|max:20',
            'password' => 'sometimes|required|min:8|max:20|different:old_password',
        ];
    }
}
