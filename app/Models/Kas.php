<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kas extends Model
{
    use SoftDeletes;

    protected $table = 'kas';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'jenis',
        'jumlah',
        'keterangan',
        'tanggal_transaksi',
        'dicatat_oleh',
        'rt_rw_scope',
    ];

    protected $casts = [
        'jumlah' => 'decimal:2',
        'tanggal_transaksi' => 'date',
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

    public function pencatat()
    {
        return $this->belongsTo(Warga::class, 'dicatat_oleh');
    }
}
