<?php

namespace Database\Seeders;

use App\Config\PermissionConstants;
use App\Config\RoleConstants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allPermissions = PermissionConstants::toArray();

        $clinicAdminPermission = [
            PermissionConstants::VIEW_ROLE,
            PermissionConstants::VIEW_USER,
            PermissionConstants::VIEW_CLINIC,
            PermissionConstants::UPDATE_CLINIC,
        ];

        // Create or retrieve permissions
        foreach ($allPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Define roles and their corresponding permissions
        $allRolePermissions = [
            RoleConstants::SUPER_ADMIN => $allPermissions,
            RoleConstants::CLINIC_ADMIN => $clinicAdminPermission,
        ];

        // Create roles and assign permissions
        foreach ($allRolePermissions as $roleName => $permissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($permissions);
        }

        Role::firstOrCreate(['name' => RoleConstants::SUPER_ADMIN]);
        Role::firstOrCreate(['name' => RoleConstants::CLINIC_ADMIN]);
    }
}
