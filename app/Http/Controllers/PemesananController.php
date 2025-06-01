<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\ItemPesanan;
use App\Models\Pemesanan;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PemesananController extends Controller
{
  // ====================== ADMIN METHODS ======================

  /**
   * Display a listing of all orders for admin
   *
   * @return \Illuminate\Http\Response
   */
  public function adminIndex()
  {
    $pemesanans = Pemesanan::with(['user', 'itemPesanans'])->orderBy('tanggal_pemesanan_222305', 'desc')->get();
    return view('pages.admin.pemesanan.index', compact('pemesanans'));
  }

  /**
   * Show specific order details for admin
   *
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function adminShow($id)
  {
    $pemesanan = Pemesanan::with(['user', 'itemPesanans.album'])->findOrFail($id);
    return view('pages.admin.pemesanan.show', compact('pemesanan'));
  }

  /**
   * Show the form for editing order status
   *
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function adminEdit($id)
  {
    $pemesanan = Pemesanan::findOrFail($id);
    return view('pages.admin.pemesanan.edit', compact('pemesanan'));
  }

  /**
   * Update order status
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function adminUpdate(Request $request, $id)
  {
    $validator = Validator::make($request->all(), [
      'status_222305' => 'required',
    ]);

    if ($validator->fails()) {
      return back()->withErrors($validator)->withInput();
    }

    $pemesanan                = Pemesanan::findOrFail($id);
    $pemesanan->status_222305 = $request->status_222305;
    $pemesanan->save();

    return redirect()->route('admin.pemesanan.index')->with('success', 'Status pemesanan berhasil diperbarui.');
  }

  /**
   * Remove the specified order from database
   *
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function adminDestroy($id)
  {
    $pemesanan = Pemesanan::findOrFail($id);

    // Delete related item pesanan first to maintain referential integrity
    $pemesanan->itemPesanans()->delete();

    // Then delete the pemesanan
    $pemesanan->delete();

    return redirect()->route('admin.pemesanan.index')->with('success', 'Pemesanan berhasil dihapus.');
  }

  // ====================== USER METHODS ======================

  /**
   * Display a listing of the user's orders
   *
   * @return \Illuminate\Http\Response
   */
 public function userIndex(Request $request)
{
    $user_id = Auth::user()->email_222305;
    $status  = $request->get('status'); // Ambil status dari query string

    $query = Pemesanan::where('email_222305', $user_id);

    // Filter hanya jika status bukan 'semua' dan tidak kosong
    if ($status && $status !== 'semua') {
        $query->where('status_222305', $status);
    }

    $pemesanans = $query->orderBy('tanggal_pemesanan_222305', 'desc')->get();

    return view('pages.users.pemesanan.index', compact('pemesanans'));
}


  /**
   * Show the form for creating a new order / checkout page
   *
   * @return \Illuminate\Http\Response
   */
  public function checkout()
  {
    // Assuming you have a cart system with session or database
    $cart_items = session('cart', []);

    if (empty($cart_items)) {
      return redirect()->route('produk.index')->with('error', 'Keranjang anda kosong!');
    }

    $total = 0;
    $items = [];

    foreach ($cart_items as $id => $details) {
      $album    = Album::findOrFail($id);
      $subtotal = $album->harga_222305 * $details['quantity'];
      $total   += $subtotal;

      $items[] = [
        'album'    => $album,
        'quantity' => $details['quantity'],
        'subtotal' => $subtotal
      ];
    }

    return view('pages.users.pemesanan.checkout', compact('items', 'total'));
  }

  /**
   * Store a newly created order in database
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    try {
      $validator = Validator::make($request->all(), [
        'metode_pembayaran_222305' => 'required|in:qris,transfer,cod,e-wallet',
        'album_id'                 => 'required|exists:album_222305,id_album_222305',
        'quantity'                 => 'required|integer|min:1'
      ]);

      if ($validator->fails()) {
        return response()->json([
          'success' => false,
          'message' => 'Validation error',
          'errors'  => $validator->errors()
        ], 422);
      }

      // Create new order
      $pemesanan                           = new Pemesanan();
      $pemesanan->id_pemesanan_222305      = 'ORD-' . Str::random(10);
      $pemesanan->email_222305             = Auth::user()->email_222305;
      $pemesanan->tanggal_pemesanan_222305 = now();
      $pemesanan->total_harga_222305       = $request->total_harga_222305;
      $pemesanan->metode_pembayaran_222305 = $request->metode_pembayaran_222305;
      $pemesanan->status_222305            = 'pending';
      $pemesanan->save();

      // Save order item
      $itemPesanan                      = new ItemPesanan();
      $itemPesanan->id_pemesanan_222305 = $pemesanan->id_pemesanan_222305;
      $itemPesanan->id_album_222305     = $request->album_id;
      $itemPesanan->jumlah_222305       = $request->quantity;
      $itemPesanan->harga_satuan_222305 = $request->total_harga_222305;
      $itemPesanan->save();

      // Decrement album stock quantity
      $album = Album::find($request->album_id);
      if ($album) {
        $album->stok_222305 = max(0, $album->stok_222305 - $request->quantity);
        $album->save();
      }

      // Handle file upload if payment proof is provided
      if ($request->hasFile('bukti_pembayaran')) {
        $file     = $request->file('bukti_pembayaran');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('bukti_pembayaran', $filename, 'public');

        // Save filename to model
        $pemesanan->bukti_pembayaran_222305 = $filename;

        // Update order status to paid if payment proof is provided
        $pemesanan->status_222305 = 'dibayar';
        $pemesanan->save();
      }

      return response()->json([
        'success'  => true,
        'message'  => 'Pemesanan berhasil dibuat!',
        'redirect' => route('users.pemesanan.show', $pemesanan->id_pemesanan_222305)
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Terjadi kesalahan: ' . $e->getMessage()
      ], 500);
    }
  }

  /**
   * Display the specified order details to user
   *
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function userShow($id)
  {
    $pemesanan = Pemesanan::with(['itemPesanans.album'])
      ->where('email_222305', Auth::user()->email_222305)
      ->findOrFail($id);

    return view('pages.users.pemesanan.show', compact('pemesanan'));
  }

  /**
   * Cancel an order (for user)
   *
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function cancelOrder($id)
  {
    $pemesanan = Pemesanan::where('email_222305', Auth::user()->email_222305)
      ->findOrFail($id);

    // Only allow cancellation if status is pending
    if ($pemesanan->status_222305 !== 'pending') {
      return back()->with('error', 'Hanya pemesanan dengan status pending yang dapat dibatalkan.');
    }

    $pemesanan->status_222305 = 'cancelled';
    $pemesanan->save();

    return redirect()
      ->route('users.pemesanan.index')
      ->with('success', 'Pemesanan berhasil dibatalkan.');
  }

  /**
   * Confirm payment for an order (for user)
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function confirmPayment(Request $request, $id)
  {
    $validator = Validator::make($request->all(), [
      'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($validator->fails()) {
      return back()->withErrors($validator)->withInput();
    }

    $pemesanan = Pemesanan::where('email_222305', Auth::user()->email_222305)
      ->findOrFail($id);

    // Only allow payment confirmation if status is pending
    if ($pemesanan->status_222305 !== 'pending') {
      return back()->with('error', 'Hanya pemesanan dengan status pending yang dapat dikonfirmasi pembayarannya.');
    }

    // Handle file upload
    if ($request->hasFile('bukti_pembayaran')) {
      $file     = $request->file('bukti_pembayaran');
      $filename = time() . '_' . $file->getClientOriginalName();
      $file->storeAs('bukti_pembayaran', $filename, 'public');

      // Here you would store the payment proof in your database
      // For simplicity, I'm not creating a new model for this
      // In a real application, you should have a separate table/model for payment proofs

      // Update order status to processing
      $pemesanan->status_222305 = 'paid';
      $pemesanan->save();
    }

    return redirect()
      ->route('users.pemesanan.index')
      ->with('success', 'Bukti pembayaran berhasil diunggah.');
  }
}
