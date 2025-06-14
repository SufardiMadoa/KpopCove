<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemKeranjang extends Model
{
    use HasFactory;

    protected $table      = 'item_keranjang_222305';
    protected $primaryKey = 'id_item_keranjang_222305';
    public $incrementing  = false;
    protected $keyType    = 'string';
    public $timestamps    = false;

    protected $fillable = [
        'id_item_keranjang_222305',
        'id_keranjang_222305',
        'id_album_222305',
        'jumlah_222305',
        'harga_222305',
    ];

    /**
     * Get the keranjang that owns the item keranjang.
     */
    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class, 'id_keranjang_222305', 'id_keranjang_222305');
    }

    /**
     * Get the album that is in the item keranjang.
     */
    public function album()
    {
        return $this->belongsTo(Album::class, 'id_album_222305', 'id_album_222305');
    }
}
