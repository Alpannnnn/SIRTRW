<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Barang extends Model
{
    use SoftDeletes;

    protected $table = 'barang';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'nama_barang',
        'kategori_barang',
        'total_stok',
        'stok_tersedia',
        'kondisi_fisik',
        'deskripsi_aset',
    ];

    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    public function peminjaman()
    {
        return $this->hasMany(PeminjamanBarang::class, 'barang_id');
    }

    public function getStatusKetersediaanAttribute(): string
    {
        if (in_array($this->kondisi_fisik, ['RUSAK_RINGAN', 'RUSAK_BERAT'])) {
            return 'Dalam Pemeliharaan';
        }
        if ($this->stok_tersedia <= 0) {
            return 'Sedang Dipinjam';
        }
        return 'Tersedia';
    }
}
