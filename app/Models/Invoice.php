<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $primaryKey = 'invoice_id';
    protected $fillable = [
        'user_id',
        'lesson_package_id',
        'status', // pending, paid, failed
        'amount',
        'expired_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lessonPackage()
    {
        return $this->belongsTo(LessonPackage::class, 'lesson_package_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'invoice_id');
    }
}
