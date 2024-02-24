<?php

namespace App\Http\Collections;

use App\Models\Clinic;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($user) {
            $roleName = Role::find($user->role_id)->name;

            // Check if the role is clinic_admin and if clinic_id is provided
            $clinicName = null;
            if ($roleName === 'clinic_admin' && isset($user->clinic_id)) {
                $clinicName = Clinic::find($user->clinic_id)->name;
            }

            return [
                'id' => $user->id,
                'name' => $user->name,
                'user_name' => $user->user_name,
                'phone' => $user->phone,
                'email' => $user->email,
                'role' => $roleName,
                'clinic_name' => $clinicName,
            ];
        })->toArray();
    }
}
