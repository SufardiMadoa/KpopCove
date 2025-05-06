<?php

namespace App\Helpers;

use App\Models\Album;
use App\Models\AlbumKategori;
use App\Models\Foto;
use App\Models\ItemKeranjang;
use App\Models\ItemPesanan;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Pemesanan;
use App\Models\User;

class IDGenerator
{
  /**
   * Generate ID for User
   * Format: USR001, USR002, ...
   */
  public static function generateUserID()
  {
    $prefix   = 'USR';
    $lastUser = User::orderBy('id_user_222305', 'desc')->first();

    if (!$lastUser) {
      return $prefix . '001';
    }

    $lastNumber = (int) substr($lastUser->id_user_222305, 3);
    $newNumber  = $lastNumber + 1;

    return $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
  }

  /**
   * Generate ID for Kategori
   * Format: KTG001, KTG002, ...
   */
  public static function generateKategoriID()
  {
    $prefix       = 'KTG';
    $lastKategori = Kategori::orderBy('id_kategori_222305', 'desc')->first();

    if (!$lastKategori) {
      return $prefix . '001';
    }

    $lastNumber = (int) substr($lastKategori->id_kategori_222305, 3);
    $newNumber  = $lastNumber + 1;

    return $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
  }

  /**
   * Generate ID for Album
   * Format: ALB001, ALB002, ...
   */
  public static function generateAlbumID()
  {
    $prefix    = 'ALB';
    $lastAlbum = Album::orderBy('id_album_222305', 'desc')->first();

    if (!$lastAlbum) {
      return $prefix . '001';
    }

    $lastNumber = (int) substr($lastAlbum->id_album_222305, 3);
    $newNumber  = $lastNumber + 1;

    return $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
  }

  /**
   * Generate ID for AlbumKategori
   * Format: AK001, AK002, ...
   */
  public static function generateAlbumKategoriID()
  {
    $prefix            = 'AK';
    $lastAlbumKategori = AlbumKategori::orderBy('id_album_kategori_222305', 'desc')->first();

    if (!$lastAlbumKategori) {
      return $prefix . '001';
    }

    $lastNumber = (int) substr($lastAlbumKategori->id_album_kategori_222305, 2);
    $newNumber  = $lastNumber + 1;

    return $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
  }

  /**
   * Generate ID for Foto
   * Format: FTO001, FTO002, ...
   */
  public static function generateFotoID()
  {
    $prefix   = 'FTO';
    $lastFoto = Foto::orderBy('id_foto_222305', 'desc')->first();

    if (!$lastFoto) {
      return $prefix . '001';
    }

    $lastNumber = (int) substr($lastFoto->id_foto_222305, 3);
    $newNumber  = $lastNumber + 1;

    return $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
  }

  /**
   * Generate ID for Keranjang
   * Format: KRJ001, KRJ002, ...
   */
  public static function generateKeranjangID()
  {
    $prefix        = 'KRJ';
    $lastKeranjang = Keranjang::orderBy('id_keranjang_222305', 'desc')->first();

    if (!$lastKeranjang) {
      return $prefix . '001';
    }

    $lastNumber = (int) substr($lastKeranjang->id_keranjang_222305, 3);
    $newNumber  = $lastNumber + 1;

    return $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
  }

  /**
   * Generate ID for ItemKeranjang
   * Format: ITK001, ITK002, ...
   */
  public static function generateItemKeranjangID()
  {
    $prefix            = 'ITK';
    $lastItemKeranjang = ItemKeranjang::orderBy('id_item_keranjang_222305', 'desc')->first();

    if (!$lastItemKeranjang) {
      return $prefix . '001';
    }

    $lastNumber = (int) substr($lastItemKeranjang->id_item_keranjang_222305, 3);
    $newNumber  = $lastNumber + 1;

    return $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
  }

  /**
   * Generate ID for Pemesanan
   * Format: PMS001, PMS002, ...
   */
  public static function generatePemesananID()
  {
    $prefix        = 'PMS';
    $lastPemesanan = Pemesanan::orderBy('id_pemesanan_222305', 'desc')->first();

    if (!$lastPemesanan) {
      return $prefix . '001';
    }

    $lastNumber = (int) substr($lastPemesanan->id_pemesanan_222305, 3);
    $newNumber  = $lastNumber + 1;

    return $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
  }

  /**
   * Generate ID for ItemPesanan
   * Format: ITP001, ITP002, ...
   */
  public static function generateItemPesananID()
  {
    $prefix          = 'ITP';
    $lastItemPesanan = ItemPesanan::orderBy('id_item_pesanan_222305', 'desc')->first();

    if (!$lastItemPesanan) {
      return $prefix . '001';
    }

    $lastNumber = (int) substr($lastItemPesanan->id_item_pesanan_222305, 3);
    $newNumber  = $lastNumber + 1;

    return $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
  }
}
