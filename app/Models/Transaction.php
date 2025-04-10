<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'transaction_id';

    protected $fillable = [
        'invoice_id',
        'transaction_status',
        'payment_type',
        'payment_method',
        'transaction_id_midtrans',
        'order_id',
        'fraud_status',
        'gross_amount',
        'payload',
    ];

    protected $casts = [
        'payload' => 'array',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }
}
