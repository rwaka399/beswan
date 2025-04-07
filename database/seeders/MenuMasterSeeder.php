<?php

namespace Database\Seeders;

use App\Models\MenuMaster;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        
        MenuMaster::create([
            'menu_master_name' => 'Dashboard',
            'menu_master_type' => 'main',
            'menu_master_icon' => 'fa-solid fa-house',
            'menu_master_link' => 'dashboard',
            'menu_master_order' => 1,
            'menu_master_slug' => 'dashboard',
            'parent_id' => null,
            'created_by' => $user->user_id,
            'updated_by' => $user->user_id,
        ]);
        MenuMaster::create([
            'menu_master_name' => 'User',
            'menu_master_type' => 'MENU',
            'menu_master_icon' => 'fa-solid fa-user',
            'menu_master_link' => 'user-index',
            'menu_master_order' => 2,
            'menu_master_slug' => 'user',
            'parent_id' => null,
            'created_by' => $user->user_id,
            'updated_by' => $user->user_id,
        ]);
        MenuMaster::create([
            'menu_master_name' => 'Role',
            'menu_master_type' => 'MENU',
            'menu_master_icon' => 'fa-solid fa-user-shield',
            'menu_master_link' => 'role-index',
            'menu_master_order' => 3,
            'menu_master_slug' => 'role',
            'parent_id' => null,
            'created_by' => $user->user_id,
            'updated_by' => $user->user_id,
        ]);
        MenuMaster::create([
            'menu_master_name' => 'Menu Master',
            'menu_master_type' => 'MENU',
            'menu_master_icon' => 'fa-solid fa-bars',
            'menu_master_link' => 'menu-index',
            'menu_master_order' => 4,
            'menu_master_slug' => 'menu-master-index',
            'parent_id' => null,
            'created_by' => $user->user_id,
            'updated_by' => $user->user_id,
        ]);
    }
}