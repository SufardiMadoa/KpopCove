<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;

class CartController extends Controller
{
    // Fungsi untuk menambahkan item ke dalam cart
    public function addToCart(Request $request, $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $userId = session('user_id');

        $cart = Cart::firstOrCreate(['user_id' => $userId]);

        $cartItem = $cart->items()->where('product_id', $productId)->first();

        if ($cartItem) {
            $cartItem->quantity += $request->input('quantity', 1);
            $cartItem->save();
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity'   => $request->input('quantity', 1),
                'price'      => $product->harga
            ]);
        }

        return response()->json(['message' => 'Product added to cart successfully'], 200);
    }

    public function showCart()
    {
        $userId = session('user_id');

        $cart = Cart::where('user_id', $userId)->with('cartItems.product')->first();
        if (!$cart) {
            return view('pages.users.cart', ['cartItems' => collect()]);
        }

        return view('pages.users.cart', ['cartItems' => $cart->cartItems]);
    }

    // Fungsi untuk melihat isi cart
    public function viewCart()
    {
        $userId = session('user_id');
        $cart   = Cart::where('user_id', $userId)->with('items.product')->first();

        if (!$cart) {
            return response()->json(['message' => 'Cart is empty'], 200);
        }

        return response()->json([
            'cart_id' => $cart->id,
            'items'   => $cart->items->map(function ($item) {
                return [
                    'product_id'   => $item->product_id,
                    'product_name' => $item->product->name,
                    'quantity'     => $item->quantity,
                    'price'        => $item->price,
                ];
            })
        ], 200);
    }

    public function removeFromCart(Request $request, $productId)
    {
        // Ambil ID user dari sesi
        $cartItem = CartItem::where('product_id', $productId)->first();
        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['message' => 'Product removed from cart successfully']);
        } else {
            return response()->json(['message' => 'Product not found in cart'], 404);
        }
    }

    public function updateQuantity(Request $request, $itemId)
    {
        $item = CartItem::find($itemId);

        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        $newQuantity = $request->input('quantity');

        // Update quantity
        $item->quantity = $newQuantity;
        $item->save();

        return response()->json(['success' => true]);
    }
}
