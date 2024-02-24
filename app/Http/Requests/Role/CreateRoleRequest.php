<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|unique:roles,name',
        ];
    }
}
