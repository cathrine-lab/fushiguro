<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pengguna extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table      = 'pengguna';
    protected $primaryKey = 'id_pengguna';

    protected $fillable = ['nama', 'email', 'password', 'no_hp', 'alamat', 'role', 'poin'];
    protected $hidden   = ['password', 'remember_token'];

    protected function casts(): array
    {
        return ['poin' => 'integer'];
    }

    public function jasa(): HasMany
    {
        return $this->hasMany(Jasa::class, 'id_pengguna');
    }

    public function transaksiSebagaiPenyedia(): HasMany
    {
        return $this->hasMany(Transaksi::class, 'id_penyedia_jasa');
    }

    public function transaksiSebagaiPenerima(): HasMany
    {
        return $this->hasMany(Transaksi::class, 'id_penerima_jasa');
    }

    public function ulasan(): HasMany
    {
        return $this->hasMany(Ulasan::class, 'id_pengguna');
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}