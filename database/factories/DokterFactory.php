<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dokter>
 */
class DokterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_dokter' => fake()->name(),
            'nomor_telepon_dokter' => fake()->phoneNumber(),
            'email_dokter' => fake()->email(),
            'password_dokter' => fake()->password()
        ];
    }
}
