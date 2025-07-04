<?php

namespace App\Models;

use App\Helpers\IDGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;

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
        'email_222305',
        'judul_222305',
        'deskripsi_222305',
        'harga_222305',
        'stok_222305',
        'status_222305',
        'path_img_222305',
    ];

    /**
     * Get the user that owns the album.
     */
    public function user()
    {
        return $this->belongsTo(Users::class, 'email_222305', 'email_222305');
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

    public function kategorialbums()
    {
        return $this->belongsToMany(
            Kategori::class,
            'album_kategori_222305',
            'id_album_222305',
            'id_kategori_222305'
        )->using(AlbumKategori::class);
    }

    protected static function boot()
    {
        parent::boot();  // Jangan lupa memanggil parent::boot()

        // Menambahkan event 'deleting'
        // Logika ini akan berjalan setiap kali Anda mencoba menghapus sebuah Album
        static::deleting(function ($album) {
            // Cek apakah album ini memiliki relasi dengan item pesanan
            // ->itemPesanans()->count() akan menghitung jumlah item pesanan yang terkait
            if ($album->itemPesanans()->count() > 0) {
                // Jika ada (lebih dari 0), batalkan proses penghapusan
                // dengan melempar exception atau return false.
                // Melempar exception lebih baik karena memberikan feedback yang jelas.

                throw new Exception('Produk ini tidak dapat dihapus karena sudah ada dalam data pemesanan.');

                // Alternatif lain (tanpa pesan error yang jelas):
                // return false;
            }
        });
    }

    public function syncKategorisWithCustomIds(array $kategoriIds)
    {
        // Hapus semua relasi yang ada
        $this->kategorialbums()->detach();

        // Tambahkan relasi baru dengan custom ID
        foreach ($kategoriIds as $kategoriId) {
            AlbumKategori::create([
                'id_album_kategori_222305' => IDGenerator::generateAlbumKategoriID(),
                'id_album_222305'          => $this->id_album_222305,
                'id_kategori_222305'       => $kategoriId
            ]);
        }
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
