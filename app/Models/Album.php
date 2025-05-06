<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table      = 'album_222305';
    protected $primaryKey = 'id_album_222305';
    public $incrementing  = false;
    protected $keyType    = 'string';
    public $timestamps    = false;

    protected $fillable = [
        'id_album_222305',
        'id_user_222305',
        'judul_222305',
        'deskripsi_222305',
        'harga_222305',
        'status_222305',
        'path_img_222305',
    ];

    /**
     * Get the user that owns the album.
     */
    public function user()
    {
        return $this->belongsTo(Users::class, 'id_user_222305', 'id_user_222305');
    }

    /**
     * The kategoris that belong to the album.
     */
    public function kategoris()
    {
        return $this->belongsToMany(
            Kategori::class,
            'album_kategori_222305',
            'id_album_222305',
            'id_kategori_222305',
            'id_album_222305',
            'id_kategori_222305'
        );
    }

    /**
     * Get the fotos for the album.
     */
    public function fotos()
    {
        return $this->hasMany(Foto::class, 'id_album_222305', 'id_album_222305');
    }

    /**
     * Get the item keranjangs for the album.
     */
    public function itemKeranjangs()
    {
        return $this->hasMany(ItemKeranjang::class, 'id_album_222305', 'id_album_222305');
    }

    /**
     * Get the item pesanans for the album.
     */
    public function itemPesanans()
    {
        return $this->hasMany(ItemPesanan::class, 'id_album_222305', 'id_album_222305');
    }
}
