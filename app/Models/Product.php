<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table      = 'produk';
    public $timestamps    = false;
    protected $primaryKey = 'id';
    protected $foreignKey = 'id_artis';

    protected $fillable = [
        'id_album',
        'id_artis',
        'nama',
        'deskripsi',
        'harga',
        'kategori_id',
        'path_img',
        'jumlah',
        'created_at'
    ];

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'kategori_id', 'id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_produk', 'id');
    }
}
