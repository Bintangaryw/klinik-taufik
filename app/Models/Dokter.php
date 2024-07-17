<?php

namespace App\Models;

use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Dokter extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $table = 'dokters';
    protected $fillable = [
        'nama_dokter',
        'nomor_telepon_dokter',
        'email_dokter',
        'password'
    ];

    protected $hidden = [
        'remember_token',
        'password'
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function jadwals(): HasMany
    {
        return $this->hasMany(Jadwal::class);
    }
    public function perjanjians(): HasMany
    {
        return $this->hasMany(Perjanjian::class);
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        // search berdasarkan nama dokter
        $query->when($filters['searchNama'] ?? false, function ($query, $search) {
            $query->where('nama_dokter', 'like', '%' . $search . '%');
        });
        // search berdasarkan nomor telepon
        $query->when($filters['searchNomorTelepon'] ?? false, function ($query, $search) {
            $query->where('nomor_telepon_dokter', 'like', '%' . $search . '%');
        });
    }
}
