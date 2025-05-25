<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table      = 'keranjang_222305';
    protected $primaryKey = 'id_keranjang_222305';
    public $incrementing  = false;
    protected $keyType    = 'string';
    public $timestamps    = false;

    protected $fillable = [
        'id_keranjang_222305',
        'email_222305',
    ];

    /**
     * Get the user that owns the keranjang.
     */
    public function user()
    {
        return $this->belongsTo(Users::class, 'email_222305', 'email_222305');
    }

    /**
     * Get the item keranjangs for the keranjang.
     */
    public function itemKeranjangs()
    {
        return $this->hasMany(ItemKeranjang::class, 'id_keranjang_222305', 'id_keranjang_222305');
    }
}
