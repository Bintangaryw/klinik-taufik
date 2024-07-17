<?php

namespace Database\Factories;

use App\Models\Dokter;
use App\Models\Jadwal;
use App\Models\Pasien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perjanjian>
 */
class PerjanjianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // untuk memilih perjanjian dengan dokter yang ada di database saja
        $dokter_available = Dokter::pluck('id')->all();

        // untuk memilih perjanjian dengan pasien yang ada di database saja
        $pasien_available = Pasien::pluck('id')->all();



        // untuk memilih jadwal yang berstatus aktif saja
        $jadwal_available = Jadwal::where('status_aktif', true)->pluck('id')->all();

        // memilih jadwal yang sesuai dengan secara acak
        $jadwalId = $this->faker->randomElement($jadwal_available);
        $jadwal = Jadwal::find($jadwalId);



        return [
            'pasien_id' => fake()->randomElement($pasien_available),
            'jadwal_id' => $jadwalId,
            'dokter_id' => $jadwal->dokter_id,
            'status_perjanjian' => fake()->randomElement(['dibatalkan', 'selesai', 'belum_selesai'])
            // 'pasien_id' => \App\Models\Pasien::factory(),
            // 'dokter_id' => \App\Models\Dokter::factory()
        ];
    }
}
