<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;  // Mengimpor model CategoryProduct
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoryProductController extends Controller
{
    public function index()
    {
        $categories = CategoryProduct::all();
        return view('pages.users.category', compact('categories'));
    }

    public function kategori_dashboard()
    {
        $categories = CategoryProduct::all();
        return view('pages.admin.kategori.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.admin.kategori.add');
    }

    public function store(Request $request)
    {
        $fileName = null;
        if ($request->hasFile('path_img')) {
            $image    = $request->file('path_img');
            $fileName = $image->store('images', 'public');
        }

        try {
            CategoryProduct::create([
                'nama'      => $request->input('nama'),
                'deskripsi' => $request->input('deskripsi'),
                'path_img'  => $fileName
            ]);
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan kategori:', ['error' => $e->getMessage()]);
            abort(500, 'Gagal menyimpan kategori.');
        }

        // Redirect jika berhasil
        return redirect()->route('dashboard.kategori.index')->with('success', 'Kategori berhasil disimpan!');
    }

    public function show($id)
    {
        $category = CategoryProduct::with('products')->findOrFail($id);

        return view('productbycategory', compact('category'));
    }

    public function edit($id)
    {
        $category = CategoryProduct::findOrFail($id);
        return view('pages.admin.kategori.update', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = CategoryProduct::findOrFail($id);

        if ($request->hasFile('path_img')) {
            if ($category->path_img && !filter_var($category->path_img, FILTER_VALIDATE_URL)) {
                if (Storage::exists('public/' . $category->path_img)) {
                    Storage::delete('public/' . $category->path_img);
                }
            }

            $path               = $request->file('path_img')->store('images', 'public');
            $category->path_img = $path;
        }
        try {
            $category->nama      = $request->input('nama');
            $category->deskripsi = $request->input('deskripsi');
            $category->save();
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan kategori:', ['error' => $e->getMessage()]);
            abort(500, 'Gagal menyimpan kategori.');
        }

        // Redirect jika berhasil
        return redirect()->route('dashboard.kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $category = CategoryProduct::findOrFail($id);
        $category->delete();

        return redirect()->route('dashboard.kategori.index')->with('success', 'Category product deleted successfully.');
    }
}
