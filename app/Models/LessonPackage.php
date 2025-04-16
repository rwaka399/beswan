<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonPackage extends Model
{
    protected $primaryKey = 'lesson_package_id'; // Sesuaikan primary key

    protected $fillable = [
        'lesson_package_name',
        'lesson_duration',
        'lesson_package_price',
        'created_by',
        'updated_by',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'lesson_package_id', 'lesson_package_id');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'lesson_package_id', 'lesson_package_id');
    }

    public function logKeuangans()
    {
        return $this->hasMany(LogKeuangan::class, 'lesson_package_id', 'lesson_package_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'user_id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'user_id');
    }
}

