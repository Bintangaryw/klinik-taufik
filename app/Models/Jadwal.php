<?php

namespace App\Models;

use App\Models\Dokter;
use App\Models\Perjanjian;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal', 'jam_mulai', 'jam_selesai', 'status_aktif', 'maksimum_pasien'
    ];

    public function dokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class);
    }

    public function perjanjian(): HasMany
    {
        return $this->hasMany(Perjanjian::class);
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        // search berdasarkan tanggal
        $query->when($filters['searchTanggal'] ?? false, function ($query, $search) {
            $query->where('tanggal', $search);
        });
        // search berdasarkan jam mulai
        $query->when($filters['searchJamMulai'] ?? false, function ($query, $search) {
            $query->where('jam_mulai', $search);
        });
        // search berdasarkan jam selesai
        $query->when($filters['searchJamSelesai'] ?? false, function ($query, $search) {
            $query->where('jam_selesai', $search);
        });
        // search berdasarkan status aktif
        $query->when($filters['searchStatusAktif'] ?? false, function ($query, $search) {
            $query->where('status_aktif', $search);
        });
    }

    // Metode untuk menghitung jumlah pasien terdaftar
    public function jumlahPasienTerdaftar()
    {
        return $this->hasMany(Perjanjian::class, 'jadwal_id')
            ->where('status_perjanjian', 'belum_selesai')
            ->count();
    }

    // Metode untuk memperbarui pasien_limit
    // Metode untuk memperbarui pasien_limit
    public function perbaruiPasienLimit()
    {
        if ($this->jumlahPasienTerdaftar() >= $this->pasien_maksimum) {
            $this->pasien_limit = true;
        } else {
            $this->pasien_limit = false;
        }
        $this->save();
    }
}
