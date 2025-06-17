<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\ItemPesanan;
use App\Models\Pemesanan;
use App\Models\Users;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
  /**
   * Display the laporan page with filtered completed transactions.
   */
  public function index(Request $request)
  {
    // 1. Query utama untuk daftar laporan pemesanan
    $query = Pemesanan::with(['user', 'itemPesanans'])
      ->where('status_222305', 'selesai');

    if ($request->filled('start_date')) {
      $query->whereDate('tanggal_pemesanan_222305', '>=', $request->start_date);
    }
    if ($request->filled('end_date')) {
      $query->whereDate('tanggal_pemesanan_222305', '<=', $request->end_date);
    }

    $pemesanans = $query->orderBy('tanggal_pemesanan_222305', 'desc')->get();

    // 2. Query untuk mencari user yang paling sering bertransaksi
    $userPalingSering = null;
    $topUserQuery     = Pemesanan::query()
      ->select('email_222305', DB::raw('COUNT(*) as total_transaksi'))
      ->where('status_222305', 'selesai');

    if ($request->filled('start_date')) {
      $topUserQuery->whereDate('tanggal_pemesanan_222305', '>=', $request->start_date);
    }
    if ($request->filled('end_date')) {
      $topUserQuery->whereDate('tanggal_pemesanan_222305', '<=', $request->end_date);
    }

    $topUser = $topUserQuery
      ->groupBy('email_222305')
      ->orderByRaw('COUNT(*) DESC')
      ->first();

    if ($topUser) {
      $userPalingSering                  = Users::find($topUser->email_222305);
      $userPalingSering->total_transaksi = $topUser->total_transaksi;
    }

    // 3. Query untuk mencari album terlaris
    $albumTerlaris = null;
    // Asumsi: model ItemPesanan memiliki kolom 'jumlah_222305' untuk jumlah item yang dibeli
    $topAlbumQuery = ItemPesanan::query()
      ->select('id_album_222305', DB::raw('SUM(jumlah_222305) as total_terjual'))
      ->whereHas('pemesanan', function ($q) use ($request) {
        $q->where('status_222305', 'selesai');
        if ($request->filled('start_date')) {
          $q->whereDate('tanggal_pemesanan_222305', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
          $q->whereDate('tanggal_pemesanan_222305', '<=', $request->end_date);
        }
      });

    $topAlbum = $topAlbumQuery
      ->groupBy('id_album_222305')
      ->orderByRaw('SUM(jumlah_222305) DESC')
      ->first();

    if ($topAlbum) {
      $albumTerlaris                = Album::find($topAlbum->id_album_222305);
      $albumTerlaris->total_terjual = $topAlbum->total_terjual;
    }

    // 4. Kirim semua data ke view
    return view('pages.admin.laporan.index', compact(
      'pemesanans',
      'userPalingSering',
      'albumTerlaris'
    ));
  }

  /**
   * Export the filtered laporan to PDF.
   */
  public function exportPdf(Request $request)
  {
    $query = Pemesanan::with(['user', 'itemPesanans'])
      ->where('status_222305', 'selesai');

    if ($request->filled('start_date')) {
      $query->whereDate('tanggal_pemesanan_222305', '>=', $request->start_date);
    }
    if ($request->filled('end_date')) {
      $query->whereDate('tanggal_pemesanan_222305', '<=', $request->end_date);
    }

    $pemesanans = $query->orderBy('tanggal_pemesanan_222305', 'desc')->get();

    $pdf = PDF::loadView('pages.admin.laporan.pdf', compact('pemesanans'));

    return $pdf->download('laporan-transaksi.pdf');
  }
}
