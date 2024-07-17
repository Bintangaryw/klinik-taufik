<?php

namespace Database\Factories;

use App\Models\Dokter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jadwal>
 */
class JadwalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Memastikan ada data dokter di database
        $dokter_available = Dokter::pluck('id')->all();

        // Jika tidak ada dokter, maka buatkan satu dokter di database
        if (empty($dokter_available)) {
            $dokter = Dokter::factory()->create();
            $dokter_available = [$dokter->id];
        }



        return [
            'tanggal' => fake()->date(),
            'jam_mulai' => fake()->time(),
            'jam_selesai' => fake()->time(),
            'status_aktif' => fake()->boolean(),
            'dokter_id' => fake()->randomElement($dokter_available)
        ];
    }
}
