<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'ulasan';
    protected $primaryKey = 'id_ulasan';
    protected $fillable = ['id_transaksi', 'id_pengguna', 'rating', 'komentar'];

    public function transaksi() { return $this->belongsTo(Transaksi::class, 'id_transaksi'); }
    public function pengguna() { return $this->belongsTo(Pengguna::class, 'id_pengguna'); }
}