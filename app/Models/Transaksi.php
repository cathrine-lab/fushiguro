<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['tgl_transaksi', 'id_jasa', 'id_penyedia_jasa', 'id_penerima_jasa', 'jumlah_poin', 'status'];

    public function jasa() { return $this->belongsTo(Jasa::class, 'id_jasa'); }
    public function penyedia() { return $this->belongsTo(Pengguna::class, 'id_penyedia_jasa', 'id_pengguna'); }
    public function penerima() { return $this->belongsTo(Pengguna::class, 'id_penerima_jasa', 'id_pengguna'); }
    public function ulasan() { return $this->hasOne(Ulasan::class, 'id_transaksi'); }
}