<?php

namespace App\Models;

use App\Helpers\IDGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class AlbumKategori extends Pivot
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

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $model->id_album_kategori_222305 = IDGenerator::generateAlbumKategoriID();
    //     });
    // }
}
