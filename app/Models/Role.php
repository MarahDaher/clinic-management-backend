<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo(Role::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Role::class, 'parent_id');
    }

    public function permissions(): BelongsToMany
    {
        return $this
            ->belongsToMany(Permission::class, 'role_has_permissions');
    }
}
