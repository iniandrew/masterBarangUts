<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'harga_barang',
        'stok_barang',
        'deskripsi_barang',
        'satuan_id'
    ];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
}
