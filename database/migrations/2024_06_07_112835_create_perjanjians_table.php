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
        Schema::create('perjanjians', function (Blueprint $table) {
            $table->id();
            $table->enum('status_perjanjian', ['dibatalkan', 'selesai', 'belum_selesai']);
            $table->timestamps();

            // relasi dengan id pasien
            $table->foreignId('pasien_id')->constrained(
                table: 'pasiens',
                indexName: 'perjanjian_pasien_id'
            );
            // relasi dengan id pasien
            $table->foreignId('dokter_id')->constrained(
                table: 'dokters',
                indexName: 'perjanjian_dokter_id'
            );
            // relasi dengan id jadwal
            $table->foreignId('jadwal_id')->constrained(
                table: 'jadwals',
                indexName: 'perjanjian_jadwal_id'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perjanjians');
    }
};
