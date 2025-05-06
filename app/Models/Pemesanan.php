<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table      = 'pemesanan_222305';
    protected $primaryKey = 'id_pemesanan_222305';
    public $incrementing  = false;
    protected $keyType    = 'string';
    public $timestamps    = false;

    protected $fillable = [
        'id_pemesanan_222305',
        'id_user_222305',
        'tanggal_pemesanan_222305',
        'total_harga_222305',
        'metode_pembayaran_222305',
        'status_pembayaran_222305',
    ];

    /**
     * Get the user that owns the pemesanan.
     */
    public function user()
    {
        return $this->belongsTo(Users::class, 'id_user_222305', 'id_user_222305');
    }

    /**
     * Get the item pesanans for the pemesanan.
     */
    public function itemPesanans()
    {
        return $this->hasMany(ItemPesanan::class, 'id_pemesanan_222305', 'id_pemesanan_222305');
    }
}
