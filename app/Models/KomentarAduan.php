<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KomentarAduan extends Model
{
    use SoftDeletes;

    protected $table = 'komentar_aduan';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'aduan_id',
        'warga_id',
        'isi_komentar',
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

    public function aduan()
    {
        return $this->belongsTo(Aduan::class, 'aduan_id');
    }

    public function penulis()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }
}
