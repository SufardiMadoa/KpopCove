<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Debug untuk melihat request parameter

        $products = Product::paginate(15);

        if ($request->has('page')) {
            return view('list_product', compact('products'));
        }

        $productsLaris = Product::skip(10)->take(10)->get();
        return view('pages.users.toko', compact('products', 'productsLaris'));
    }

    public function paginate(Request $request)
    {
        $size     = $request->query('size', 12);  // Default 15 produk per halaman
        $products = Product::paginate($size);

        return view('list_product', compact('products'));
    }

    public function Best4Product(Request $request)
    {
        $products = Product::limit(4)->get();
        return view('pages.users.home', compact('products'));
    }

    public function showProduct()
    {
        $products = Product::with('category')->get();

        return view('pages.admin.produk.index', [
            'title'    => 'Daftar Produk',
            'products' => $products
        ]);
    }

    public function create()
    {
        $categories = CategoryProduct::all();

        return view('pages.admin.produk.add', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi input yang masuk
        $request->validate([
            'nama'        => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'harga'       => 'required|numeric',
            'jumlah'      => 'required|integer',
            'kategori_id' => 'required|integer',
            'path_img'    => 'required|image|mimes:jpeg,png,jpg,gif',  // Validasi file gambar
        ]);

        // Menangani pengunggahan gambar
        if ($request->hasFile('path_img')) {
            $image     = $request->file('path_img');
            $imagePath = $image->store('product_images', 'public');  // Menyimpan gambar di folder 'public/product_images'
        }

        // Menyimpan data produk ke database
        Product::create([
            'nama'        => $request->input('nama'),
            'deskripsi'   => $request->input('deskripsi'),
            'harga'       => $request->input('harga'),
            'jumlah'      => $request->input('jumlah'),
            'kategori_id' => $request->input('kategori_id'),
            'path_img'    => $imagePath ?? null,  // Menyimpan path gambar
        ]);

        return redirect()->route('dashboard.products');
    }

    public function edit($id)
    {
        $product    = Product::findOrFail($id);
        $categories = CategoryProduct::all();

        return view('pages.admin.produk.update', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Debug data input dan ID produk

        $product = Product::findOrFail($id);

        if ($request->hasFile('path_img')) {
            if ($product->path_img && Storage::exists('public/' . $product->path_img)) {
                Storage::delete('public/' . $product->path_img);
            }

            $path              = $request->file('path_img')->store('images', 'public');
            $product->path_img = $path;
        }

        $product->nama        = $request->input('nama');
        $product->deskripsi   = $request->input('deskripsi');
        $product->harga       = $request->input('harga');
        $product->kategori_id = $request->input('kategori_id');
        $product->jumlah      = $request->input('jumlah');

        try {
            $product->save();
        } catch (\Exception $e) {
        }

        return redirect()->route('dashboard.products')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('dashboard.products')->with('success', 'Product deleted successfully.');
    }
}
