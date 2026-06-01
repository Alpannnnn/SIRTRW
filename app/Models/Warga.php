<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Warga extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'warga';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'nik',
        'nama_lengkap',
        'no_telepon',
        'blok_rumah',
        'rt_id',
        'rw_id',
        'password',
        'status_akun',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    // ── Relationships ──

    public function surat(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Surat::class);
    }

    public function aduan(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Aduan::class);
    }

    public function peminjaman(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PeminjamanBarang::class);
    }

    public function komentarAduan(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(KomentarAduan::class);
    }

    // ── Scopes ──

    public function scopeActive($query)
    {
        return $query->where('status_akun', 'ACTIVE');
    }

    public function scopePending($query)
    {
        return $query->where('status_akun', 'PENDING_VERIFICATION');
    }

    public function scopeByRt($query, string $rtId)
    {
        return $query->where('rt_id', $rtId);
    }

    // ── Helper Methods ──

    public function isWarga(): bool
    {
        return $this->role === 'WARGA';
    }

    public function isPengurusRt(): bool
    {
        return $this->role === 'PENGURUS_RT';
    }

    public function isPengurusRw(): bool
    {
        return $this->role === 'PENGURUS_RW';
    }

    public function isAktif(): bool
    {
        return $this->status_akun === 'ACTIVE';
    }
}
