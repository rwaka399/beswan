<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;
    protected $primaryKey = "role_permission_id";
    protected $fillable = [
        'role_permission_id',
        'role_id',
        'menu_master_id',
        'slug',
        'value',
        'created_by',
        'updated_by'
    ];

    public static function isHasPermission($role_id, $permission_slug):bool
    {;
        $permission = RolePermission::where('role_id', $role_id)
            ->where('slug', $permission_slug)
            ->first();
        if ($permission && $permission->value === true) {
            return true;
        }
        return false;
    }
}
