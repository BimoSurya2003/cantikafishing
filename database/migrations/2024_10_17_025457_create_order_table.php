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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('order_date');
            $table->string('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->foreignId('cart_id')->nullable();
            $table->decimal('total_price', 10, 2);
            $table->foreignId('user_id');
            $table->string('bukti_bayar')->nullable();
            $table->enum('status', ['Unpaid', 'Paid', 'Processing', 'Shipped', 'Completed', 'Canceled'])->default('Unpaid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
