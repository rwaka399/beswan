<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogKeuangan extends Model
{
    protected $fillable = [
        'invoice_id',
        'transaction_id',
        'user_id',
        'lesson_package_id',
        'amount',
        'transaction_type',
        'payment_method',
        'description',
        'transaction_date',
    ];

    protected $casts = [
        'transaction_date' => 'datetime',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'invoice_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'transaction_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function lessonPackage()
    {
        return $this->belongsTo(LessonPackage::class, 'lesson_package_id', 'lesson_package_id');
    }
}