<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $superAdminRole = Role::where('name', 'super_admin')->firstOrFail();

        // Create a user
        $user = User::create([
            'name' => 'Marah Daher',
            'user_name' => 'marah-daher',
            'email' => 'marah@outlook.com',
            'password' => bcrypt('123123'),
            'phone' => '+961791234567',
            'role_id' => $superAdminRole->id,
        ]);

        // Retrieve all permissions and attach them to the user
        $permissions = $superAdminRole->permissions;
        $user->permissions()->attach($permissions);
    }
}
