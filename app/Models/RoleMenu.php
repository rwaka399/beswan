<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoleMenu extends Model
{
    use HasFactory;

    protected $primaryKey = 'role_menu_id';

    protected $fillable = [
        'role_menu_id',
        'role_id',
        'menu_master_id',
        'created_by',
        'updated_by',
    ];

    public function role():BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }

    public function menu_master():BelongsTo
    {
        return $this->belongsTo(MenuMaster::class, 'menu_master_id', 'menu_master_id');
    }
}
