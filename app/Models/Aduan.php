<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Aduan extends Model
{
    use SoftDeletes;

    protected $table = 'aduan';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'warga_id',
        'judul',
        'deskripsi',
        'kategori',
        'foto_bukti_path',
        'status',
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

    public function pelapor()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    public function komentar()
    {
        return $this->hasMany(KomentarAduan::class, 'aduan_id');
    }
}
