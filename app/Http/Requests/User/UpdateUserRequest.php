<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'name' => 'string',
            'user_name' => 'string|unique:users,user_name',
            'email' => 'email|unique:users,email',
            'phone' => 'string',
            'password' => 'string|min:3',
            'role_id' => 'exists:roles,id',
        ];

        // Add conditional validation rule for clinic_id
        if ($this->role_id == 'clinic_admin') {
            $rules['clinic_id'] = 'exists:clinics,id';
        }

        return $rules;
    }
}
