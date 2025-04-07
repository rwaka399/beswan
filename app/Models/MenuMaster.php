<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuMaster extends Model
{
    use HasFactory;

    protected $primaryKey = 'menu_master_id';

    protected $guarded = [];

    public function roleMenu():HasMany
    {
        return $this->hasMany(RoleMenu::class, 'menu_master_id', 'menu_master_id');
    }
}
