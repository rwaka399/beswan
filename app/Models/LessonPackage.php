<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonPackage extends Model
{
    use HasFactory;

    protected $primaryKey = 'lesson_package_id';
    protected $fillable = [
        'lesson_package_name',
        'lesson_duration',
        'lesson_package_price',
        'created_by',
        'updated_by'
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'lesson_package_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
