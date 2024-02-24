<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'name' => 'required|string',
            'user_name' => 'required|string|unique:users,user_name',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string',
            'password' => 'required|string|min:3',
            'role_id' => 'required|exists:roles,id',
        ];

        // Add conditional validation rule for clinic_id
        if ($this->role_id == 'clinic_admin') {
            $rules['clinic_id'] = 'required|exists:clinics,id';
        }

        return $rules;
    }
}
