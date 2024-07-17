<?php

namespace App\Models;


use App\Models\RekamMedis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pasien extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $fillable = [
        'nama_pasien',
        'tanggal_lahir',
        'alamat',
        'nomor_telepon',
        'username',
        'password',
        'nomor_rm'
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

    public function rekam_medis(): HasMany
    {
        return $this->hasMany(RekamMedis::class, 'pasien_id');
    }
    public function perjanjians(): HasMany
    {
        return $this->hasMany(Perjanjian::class, 'pasien_id');
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        // search berdasarkan nomor rm
        $query->when($filters['searchNomorRm'] ?? false, function ($query, $search) {
            $query->where('nomor_rm', 'like', '%' . $search . '%');
        });
        // search berdasarkan nama pasien
        $query->when($filters['searchNama'] ?? false, function ($query, $search) {
            $query->where('nama_pasien', 'like', '%' . $search . '%');
        });
        // search berdasarkan nomor telepon
        $query->when($filters['searchNomorTelepon'] ?? false, function ($query, $search) {
            $query->where('nomor_telepon', 'like', '%' . $search . '%');
        });
    }
}
