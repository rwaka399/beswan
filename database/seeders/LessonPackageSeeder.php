<?php

namespace Database\Seeders;

use App\Models\LessonPackage;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::find(1);

        LessonPackage::create([
            'lesson_package_name' => 'Lesson Package 1',
            'lesson_duration'     => 1,
            'lesson_package_price' => 100000,
            'created_by'         => $admin->user_id,
            'updated_by'         => $admin->user_id
        ]);

        LessonPackage::create([
            'lesson_package_name' => 'Lesson Package 2',
            'lesson_duration'     => 2,
            'lesson_package_price' => 200000,
            'created_by'         => $admin->user_id,
            'updated_by'         => $admin->user_id
        ]);

        LessonPackage::create([
            'lesson_package_name' => 'Lesson Package 3',
            'lesson_duration'     => 3,
            'lesson_package_price' => 300000,
            'created_by'         => $admin->user_id,
            'updated_by'         => $admin->user_id
        ]);
        
        LessonPackage::create([
            'lesson_package_name' => 'Lesson Package 4',
            'lesson_duration'     => 4,
            'lesson_package_price' => 400000,
            'created_by'         => $admin->user_id,
            'updated_by'         => $admin->user_id
        ]);
    }
}
