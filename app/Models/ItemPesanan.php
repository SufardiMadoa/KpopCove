<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPesanan extends Model
{
    use HasFactory;

    protected $table      = 'item_pesanan_222305';
    protected $primaryKey = 'id_item_pesanan_222305';
    public $incrementing  = false;
    protected $keyType    = 'string';
    public $timestamps    = false;

    protected $fillable = [
        'id_item_pesanan_222305',
        'id_pemesanan_222305',
        'id_album_222305',
        'harga_satuan_222305',
        'jumlah_222305',
        'total_harga_222305',
    ];

    /**
     * Get the pemesanan that owns the item pesanan.
     */
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan_222305', 'id_pemesanan_222305');
    }

    /**
     * Get the album that is in the item pesanan.
     */
    public function album()
    {
        return $this->belongsTo(Album::class, 'id_album_222305', 'id_album_222305');
    }
}
