<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    use HasFactory;

    protected $table = 'jasa';
    protected $primaryKey = 'id_jasa';
    protected $fillable = ['nama_jasa', 'deskripsi', 'id_kategori', 'id_pengguna', 'poin'];

    public function pemilik() { return $this->belongsTo(Pengguna::class, 'id_pengguna'); }
    public function kategori() { return $this->belongsTo(Kategori::class, 'id_kategori'); }
    public function transaksi() { return $this->hasMany(Transaksi::class, 'id_jasa'); }
}