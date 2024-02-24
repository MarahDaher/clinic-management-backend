<?php

namespace App\Http\Resources\User;

use App\Models\Clinic;
use App\Models\Role;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $this->load('role', 'clinic');

        return [
            'id' => $this->id,
            'name' => $this->name,
            'user_name' => $this->user_name,
            'email' => $this->email,
            'role' => $this->role ? $this->role->name : null,
            'clinic_name' => $this->clinic ? $this->clinic->name : null,
        ];
    }
}
