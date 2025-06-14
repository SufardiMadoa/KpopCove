<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
  /**
   * Display the laporan page with filtered completed transactions.
   */
  public function index(Request $request)
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

    return view('pages.admin.laporan.index', compact('pemesanans'));
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
