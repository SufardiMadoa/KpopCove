<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumKategori extends Model
{
    use HasFactory;

    protected $table      = 'album_kategori_222305';
    protected $primaryKey = 'id_album_kategori_222305';
    public $incrementing  = false;
    protected $keyType    = 'string';
    public $timestamps    = false;

    protected $fillable = [
        'id_album_kategori_222305',
        'id_album_222305',
        'id_kategori_222305',
    ];
}
