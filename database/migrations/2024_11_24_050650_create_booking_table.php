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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->enum('kolam', ['kolam_1', 'kolam_2', 'kolam_3']);
            $table->enum('jenis_pemesanan', ['harian', 'jam', 'kiloan']);
            $table->enum('harian_duration', ['setengah_hari', 'seharian'])->nullable();
            $table->date('tgl_booking');
            $table->decimal('harga', 10, 2);
            $table->enum('status', ['pending', 'confirmed', 'canceled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
