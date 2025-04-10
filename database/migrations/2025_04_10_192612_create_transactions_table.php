<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->unsignedBigInteger('invoice_id');
            $table->string('transaction_status'); // e.g. pending, success, failure, expire, etc.
            $table->string('payment_type')->nullable(); // e.g. bank_transfer, qris, gopay, etc.
            $table->string('payment_method')->nullable(); // Optional: e.g. BCA, BNI, QRIS
            $table->string('transaction_id_midtrans')->nullable(); // Midtrans transaction ID
            $table->string('order_id')->nullable(); // Midtrans order_id
            $table->string('fraud_status')->nullable(); // e.g. accept, deny, challenge
            $table->integer('gross_amount')->nullable(); // nominal
            $table->json('payload')->nullable();
            $table->timestamps();

            $table->foreign('invoice_id')->references('invoice_id')->on('invoices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
