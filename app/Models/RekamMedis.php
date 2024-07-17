<?php

namespace App\Models;


use App\Models\Pasien;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RekamMedis extends Model
{
    use HasFactory;
    protected $fillable = ['rk_1', 'rk_2', 'rp_1', 'rp_2', 'pf_1', 'pf_2', 'diagnosis', 'cp_1', 'cp_2', 'cp_3', 'rpb_1', 'rpb_2', 'ck_1'];

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class);
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['searchTanggal'] ?? false, function ($query, $search) {
            $query->where('tanggal_pemeriksaan', $search);
        });
    }
}
