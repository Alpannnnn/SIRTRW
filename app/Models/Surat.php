<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Surat extends Model
{
    use SoftDeletes;

    protected $table = 'surat';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'warga_id',
        'jenis_surat',
        'tujuan_pembuatan',
        'status',
        'approved_by_rt',
        'approved_by_rw',
        'kode_verifikasi',
        'file_pdf_path',
        'catatan_penolakan',
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

    public function pemohon()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    public function approverRt()
    {
        return $this->belongsTo(Warga::class, 'approved_by_rt');
    }

    public function approverRw()
    {
        return $this->belongsTo(Warga::class, 'approved_by_rw');
    }
}
