<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuMaster extends Model
{
    use HasFactory;

    protected $primaryKey = 'menu_master_id';

    protected $fillable = [
        'menu_master_name',
        'menu_master_type',
        'menu_master_icon',
        'menu_master_link',
        'parent_id',
        'menu_master_order',
        'menu_master_slug',
        'created_by',
        'updated_by'
    ];

    public function roleMenu():HasMany
    {
        return $this->hasMany(RoleMenu::class, 'menu_master_id', 'menu_master_id');
    }
}
