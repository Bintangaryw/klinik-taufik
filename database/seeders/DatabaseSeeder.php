<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use App\Models\Dokter;
use App\Models\Jadwal;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pasien;
use App\Models\Perjanjian;
use App\Models\RekamMedis;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Pasien::factory(10)->create();
        // Dokter::factory(3)->create();
        // Jadwal::factory(5)->create();

        Admin::factory()->create([
            'nama_admin' => 'Admin 1',
            'username' => 'admin1',
            'password' => 'admin1234',

        ]);

        // RekamMedis::factory(10)
        //     ->recycle(Pasien::factory(5)->create())
        //     ->create();
        // Jadwal::factory(3)->create();
        // Perjanjian::factory()->count(10)->create();
    }
}
