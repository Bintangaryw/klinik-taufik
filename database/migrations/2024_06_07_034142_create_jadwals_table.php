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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->boolean('status_aktif');
            $table->integer('pasien_maksimum');
            $table->boolean('pasien_limit');
            $table->timestamps();

            // relasi dengan id dokter
            $table->foreignId('dokter_id')->constrained(
                table: 'dokters',
                indexName: 'jadwal_dokter_id'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
