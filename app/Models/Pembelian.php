<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    public $table = "tbl_pembelian";
    protected $fillable = [
    'nm_cust',
    'alamat',
    'quantity',
    'grade',
    'harga',
    'total_harga', // ✅ WAJIB
    'tgl_antar',
    'status',
    'keterangan',
    'bukti_pembayaran',
    'alasan_penolakan',
    'foto_lokasi'
];

    
}
