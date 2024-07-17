<?php

namespace Database\Factories;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasien>
 */
class PasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_pasien' => fake()->name(),
            'tanggal_lahir' => fake()->date(),
            'alamat' => fake()->address(),
            'nomor_telepon' => fake()->phoneNumber(),
            'nomor_rm' => fake()->numerify('####'),
            'password' => fake()->password()
        ];
    }
}
