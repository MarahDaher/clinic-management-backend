<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_name' => 'required|string|exists:users,user_name',
            'password' => 'required|string|min:3',
        ];
    }
}
