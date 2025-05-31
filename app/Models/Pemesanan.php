<?php

namespace App\Models;

use App\Helpers\IDGenerator;
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
        'email_222305',
        'tanggal_pemesanan_222305',
        'total_harga_222305',
        'metode_pembayaran_222305',
        'status_222305',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id_pemesanan_222305 = IDGenerator::generatePemesananID();
        });
    }

    /**
     * Get the user that owns the pemesanan.
     */
    public function user()
    {
        return $this->belongsTo(Users::class, 'email_222305', 'email_222305');
    }

    /**
     * Get the item pesanans for the pemesanan.
     */
    public function itemPesanans()
    {
        return $this->hasMany(ItemPesanan::class, 'id_pemesanan_222305', 'id_pemesanan_222305');
    }
}
