<?php

namespace Database\Seeders;

use App\Models\MenuMaster;
use App\Models\Role;
use App\Models\RoleMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class RoleMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = MenuMaster::all();
        $roles = Role::all();

        foreach ($roles as $role) {
            foreach ($menus as $menu) {
                if ($menu->menu_master_name === 'Dashboard' || $role->role_name === 'Super Admin') {
                    RoleMenu::create([
                        'role_id' => $role->role_id,
                        'menu_master_id' => $menu->menu_master_id,
                    ]);
                }
            }
        }
    }
}
