<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pengumuman extends Model
{
    use SoftDeletes;

    protected $table = 'pengumuman';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'judul',
        'konten',
        'dibuat_oleh',
        'is_urgent',
        'tampil_sampai',
    ];

    protected $casts = [
        'is_urgent' => 'boolean',
        'tampil_sampai' => 'datetime',
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

    public function pembuat()
    {
        return $this->belongsTo(Warga::class, 'dibuat_oleh');
    }
}
