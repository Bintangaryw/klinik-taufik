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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pemeriksaan');
            $table->text('rk_1');
            $table->text('rk_2');
            $table->text('rp_1');
            $table->text('rp_2');
            $table->text('pf_1');
            $table->text('pf_2');
            $table->text('diagnosis');
            $table->text('cp_1');
            $table->text('cp_2');
            $table->text('cp_3');
            $table->text('rpb_1');
            $table->text('rpb_2');
            $table->text('ck_1');
            $table->timestamps();

            // relasi dengan id pasien
            $table->foreignId('pasien_id')->constrained(
                table: 'pasiens',
                indexName: 'rekamMedis_pasien_id'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};
