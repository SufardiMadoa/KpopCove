<?php

namespace App\Models;

use App\Helpers\IDGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table      = 'kategori_222305';
    protected $primaryKey = 'id_kategori_222305';
    public $incrementing  = false;
    protected $keyType    = 'string';
    public $timestamps    = false;

    protected $fillable = [
        'id_kategori_222305',
        'nama_kategori_222305',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id_kategori_222305 = IDGenerator::generateKategoriID();
        });
    }

    /**
     * The albums that belong to the kategori.
     */
    public function albums()
    {
        return $this->belongsToMany(
            Album::class,
            'album_kategori_222305',
            'id_kategori_222305',
            'id_album_222305',
            'id_kategori_222305',
            'id_album_222305'
        );
    }
}
