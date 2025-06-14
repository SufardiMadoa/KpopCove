<?php

namespace App\Http\Controllers;

use App\Models\Album;  // Assuming you have an Album model
use App\Models\ItemKeranjang;
use App\Models\Kategori;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class KeranjangController extends Controller
{
  /**
   * Display the contents of the user's cart.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    // Jika request meminta JSON (dari JavaScript/AJAX)
    if ($request->wantsJson()) {
      $email     = Auth::user()->email_222305;
      $keranjang = Keranjang::where('email_222305', $email)
        ->with('itemKeranjangs.album')
        ->first();

      if (!$keranjang) {
        return response()->json(['message' => 'Your cart is empty.', 'item_keranjangs' => []]);
      }
      return response()->json($keranjang);
    }

    // Jika tidak, tampilkan halaman Blade biasa
    return view('pages.users.keranjang');
  }

  /**
   * Add an item to the cart or update its quantity if it already exists.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'id_album_222305' => 'required|string|exists:album_222305,id_album_222305',  // Assuming album table is 'album_222305'
      'jumlah_222305'   => 'required|integer|min:1',
    ]);

    // Get the authenticated user's email
    $email = Auth::user()->email_222305;

    // Find or create a cart for the user
    $keranjang = Keranjang::firstOrCreate(
      ['email_222305' => $email],
      ['id_keranjang_222305' => 'CART-' . Str::uuid()]  // Generate a unique ID for new carts
    );

    // Find the album to get its price
    $album = Album::find($request->id_album_222305);
    if (!$album) {
      return response()->json(['message' => 'Album not found.'], 404);
    }

    // Check if the item already exists in the cart
    $itemKeranjang = $keranjang
      ->itemKeranjangs()
      ->where('id_album_222305', $request->id_album_222305)
      ->first();

    if ($itemKeranjang) {
      // If item exists, update the quantity and total price
      $itemKeranjang->jumlah_222305 += $request->jumlah_222305;
      $itemKeranjang->save();
    } else {
      // If item does not exist, create a new cart item
      $itemKeranjang = ItemKeranjang::create([
        'id_item_keranjang_222305' => 'ITEM-' . Str::uuid(),
        'id_keranjang_222305'      => $keranjang->id_keranjang_222305,
        'id_album_222305'          => $request->id_album_222305,
        'jumlah_222305'            => $request->jumlah_222305,
        'harga_222305'             => $album->harga_222305,  // Assuming 'harga_222305' is a field in your Album model
      ]);
    }

    return response()->json(['message' => 'Item added to cart successfully!', 'item' => $itemKeranjang], 201);
  }

  /**
   * Update the quantity of a specific item in the cart.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  string  $id_item_keranjang
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id_item_keranjang)
  {
    $request->validate([
      'jumlah_222305' => 'required|integer|min:1',
    ]);

    // Find the specific cart item
    $itemKeranjang = ItemKeranjang::find($id_item_keranjang);

    if (!$itemKeranjang) {
      return response()->json(['message' => 'Item not found in cart.'], 404);
    }

    // Ensure the item belongs to the authenticated user's cart
    $email = Auth::user()->email_222305;
    if ($itemKeranjang->keranjang->email_222305 !== $email) {
      return response()->json(['message' => 'Unauthorized'], 403);
    }

    // Update the quantity and total price
    $itemKeranjang->jumlah_222305 = $request->jumlah_222305;
    $itemKeranjang->save();

    return response()->json(['message' => 'Cart item updated successfully!', 'item' => $itemKeranjang]);
  }

  /**
   * Remove an item from the cart.
   *
   * @param  string  $id_item_keranjang
   * @return \Illuminate\Http\Response
   */
  public function destroy($id_item_keranjang)
  {
    // Find the specific cart item
    $itemKeranjang = ItemKeranjang::find($id_item_keranjang);

    if (!$itemKeranjang) {
      return response()->json(['message' => 'Item not found in cart.'], 404);
    }

    // Ensure the item belongs to the authenticated user's cart
    $email = Auth::user()->email_222305;
    if ($itemKeranjang->keranjang->email_222305 !== $email) {
      return response()->json(['message' => 'Unauthorized'], 403);
    }

    // Delete the item
    $itemKeranjang->delete();

    // Optional: Check if the cart is now empty and delete the cart itself
    $keranjang = $itemKeranjang->keranjang;
    if ($keranjang->itemKeranjangs()->count() === 0) {
      $keranjang->delete();
      return response()->json(['message' => 'Item removed and cart is now empty.']);
    }

    return response()->json(['message' => 'Item removed from cart successfully.']);
  }
}
