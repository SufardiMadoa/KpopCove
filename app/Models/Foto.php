<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table      = 'foto_222305';
    protected $primaryKey = 'id_foto_222305';
    public $incrementing  = false;
    protected $keyType    = 'string';
    public $timestamps    = false;

    protected $fillable = [
        'id_foto_222305',
        'id_album_222305',
        'gambar_222305',
    ];

    /**
     * Get the album that owns the foto.
     */
    public function album()
    {
        return $this->belongsTo(Album::class, 'id_album_222305', 'id_album_222305');
    }
}
