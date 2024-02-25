<?php

namespace App\Config;

use ReflectionClass;

class PermissionConstants
{
    // Roles
    public const VIEW_ROLES = 'view_roles';

    public const VIEW_ROLE = 'view_role';

    public const CREATE_ROLE = 'create_role';

    public const UPDATE_ROLE = 'update_role';

    // Users
    public const VIEW_USERS = 'view_users';

    public const VIEW_USER = 'view_user';

    public const CREATE_USER = 'create_user';

    public const UPDATE_USER = 'update_user';

    // Clinics
    public const VIEW_CLINICS = 'view_clinics';

    public const VIEW_CLINIC = 'view_clinic';

    public const CREATE_CLINIC = 'create_clinic';

    public const UPDATE_CLINIC = 'update_clinic';

    public static function toArray(): array
    {
        return (new ReflectionClass(static::class))->getConstants();
    }
}
