<?php

namespace App\Models;

use App\Helpers\IDGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table      = 'users_222305';
    protected $primaryKey = 'id_user_222305';
    public $incrementing  = false;
    protected $keyType    = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_user_222305',
        'nama_222305',
        'email_222305',
        'password_222305',
        'no_telp_222305',
        'role_222305',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Generate ID sebelum model disimpan
            $model->id_user_222305 = IDGenerator::generateUserID();
        });
    }

    public function getAuthPassword()
    {
        return $this->password_222305;
    }

    public function getAuthIdentifierName()
    {
        return 'id_user_222305';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    /**
     * Get the albums created by the user.
     */
    public function albums()
    {
        return $this->hasMany(Album::class, 'id_user_222305', 'id_user_222305');
    }

    /**
     * Get the keranjang associated with the user.
     */
    public function keranjang()
    {
        return $this->hasOne(Keranjang::class, 'id_user_222305', 'id_user_222305');
    }

    /**
     * Get the pemesanan for the user.
     */
    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_user_222305', 'id_user_222305');
    }
}
