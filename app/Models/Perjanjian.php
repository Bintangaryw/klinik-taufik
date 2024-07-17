<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perjanjian extends Model
{
    use HasFactory;
    protected $fillable = [
        'status_perjanjian', 'pasien_id', 'dokter_id', 'jadwal_id'
    ];

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }

    public function dokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }

    public function jadwal(): BelongsTo
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        // search berdasarkan nomor rm
        $query->when($filters['searchNomorRm'] ?? false, function ($query, $search) {
            $query->whereHas('pasien', function ($query) use ($search) {
                $query->where('nomor_rm', 'like', '%' . $search . '%');
            });
        });
        // search berdasarkan nama pasien
        $query->when($filters['searchNama'] ?? false, function ($query, $search) {
            $query->whereHas('pasien', function ($query) use ($search) {
                $query->where('nama_pasien', 'like', '%' . $search . '%');
            });
        });
        // search berdasarkan nomor telepon
        $query->when($filters['searchNomorTelepon'] ?? false, function ($query, $search) {
            $query->whereHas('pasien', function ($query) use ($search) {
                $query->where('nomor_telepon', 'like', '%' . $search . '%');
            });
        });
        // search berdasarkan tanggal
        $query->when($filters['searchTanggal'] ?? false, function ($query, $search) {
            $query->whereHas('jadwal', function ($query) use ($search) {
                $query->where('tanggal', 'like', '%' . $search . '%');
            });
        });
        // search berdasarkan status
        $query->when($filters['searchStatus'] ?? false, function ($query, $search) {
            $query->where('status_perjanjian', $search);
        });
    }
}
