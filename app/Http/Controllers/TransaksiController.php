<?php

namespace App\Http\Controllers;

use App\Models\Product;  // Pastikan model Product sudah di-import
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;  // Make sure to import Carbon for date handling
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $userId = session('user_id');

        $transaksiList = Transaksi::where('id_pelanggan', $userId)
            ->where('status', 'selesai')
            ->get();

        foreach ($transaksiList as $transaksi) {
            $productIds          = explode(',', $transaksi->id_produk);
            $transaksi->products = Product::whereIn('id', $productIds)->get();
        }

        return view('pages.users.riwayat', compact('transaksiList'));
    }

    public function showPesanan()
    {
        $userId        = session('user_id');
        $transaksiList = Transaksi::with('product')  // Muat relasi ke produk
            ->where('id_pelanggan', $userId)
            ->whereIn('status', ['pending', 'dikemas', 'dikirim'])
            ->get();

        return view('pages.users.pesanan', compact('transaksiList'));
    }

    public function updateStatusByUser(Request $request, $id)
    {
        // Cari transaksi berdasarkan ID
        $transaksi = Transaksi::findOrFail($id);

        // Periksa apakah status saat ini adalah 'dikirim'
        if ($transaksi->status === 'dikirim') {
            // Ubah status menjadi 'diterima'
            $transaksi->status = 'selesai';
            $transaksi->save();

            return redirect()->route('pesanan')->with('success', 'Pesanan telah diterima.');
        }

        return redirect()->route('pages.users.pesanan')->with('error', 'Status pesanan tidak valid.');
    }

    public function showAll()
    {
        // Ambil semua transaksi beserta relasi pelanggan dan produk
        $transaksi = Transaksi::with(['pelanggan', 'produk'])->get();

        return view('pages.admin.transaksi.index', compact('transaksi'));
    }

    // Mengupdate status transaksi
    public function updateStatus(Request $request, $id)
    {
        $transaksi         = Transaksi::findOrFail($id);
        $transaksi->status = $request->status;
        $transaksi->save();

        return response()->json(['message' => 'Status transaksi berhasil diperbarui']);
    }

    public function generatePdf($filter, Request $request)
    {
        // Ambil parameter start_date dan end_date dari request
        $startDate = $request->input('start_date');
        $endDate   = $request->input('end_date');

        // Query transaksi dengan relasi pelanggan dan produk
        $query = Transaksi::with(['pelanggan', 'produk']);

        // Filter berdasarkan tanggal jika diberikan
        if ($startDate) {
            $query->where('tanggal_transaksi', '>=', $startDate);
        }

        if ($endDate) {
            $query->where('tanggal_transaksi', '<=', $endDate);
        }

        // Ambil semua transaksi sesuai filter
        $transaksis = $query->get();

        // Hitung total transaksi
        $totalTransaksi = $transaksis->sum('harga_total');

        // Generate PDF menggunakan tampilan dan data
        $pdf = Pdf::loadView('dashboard.transaksi.pdf', compact('transaksis', 'totalTransaksi'));

        // Tentukan nama file PDF
        $filename = 'Transaksi-' . ucfirst($filter) . '.pdf';

        // Download PDF
        return $pdf->download($filename);
    }

    public function showAllLaporan(Request $request)
    {
        // Retrieve start_date and end_date from request
        $startDate = $request->input('start_date');
        $endDate   = $request->input('end_date');

        // Query transaksi with optional date filtering
        $query = Transaksi::with(['pelanggan', 'produk']);

        if ($startDate) {
            $query->where('tanggal_transaksi', '>=', $startDate);
        }

        if ($endDate) {
            $query->where('tanggal_transaksi', '<=', $endDate);
        }

        $transaksis = $query->get();

        // Calculate total transaksi
        $totalTransaksi = $transaksis->sum('harga_total');

        return view('pages.admin.transaksi.laporan', [
            'transaksi'      => $transaksis,
            'totalTransaksi' => $totalTransaksi,
        ]);
    }

    public function destroy($id)
    {
        // Temukan transaksi berdasarkan ID
        $transaksi = Transaksi::findOrFail($id);

        // Hapus transaksi
        $transaksi->delete();

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Transaksi berhasil dihapus.');
    }
}
