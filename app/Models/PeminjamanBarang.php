<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PeminjamanBarang extends Model
{
    use SoftDeletes;

    protected $table = 'peminjaman_barang';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'warga_id',
        'barang_id',
        'jumlah_pinjam',
        'tanggal_mulai',
        'tanggal_kembali_rencana',
        'tanggal_kembali_realisasi',
        'status_peminjaman',
        'alasan_peminjaman',
        'catatan_kondisi_kembali',
        'disetujui_oleh',
    ];

    protected $casts = [
        'tanggal_mulai' => 'datetime',
        'tanggal_kembali_rencana' => 'datetime',
        'tanggal_kembali_realisasi' => 'datetime',
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

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function approver()
    {
        return $this->belongsTo(Warga::class, 'disetujui_oleh');
    }
}
