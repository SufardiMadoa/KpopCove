<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
  /**
   * Display a listing of the kategori.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $kategoris = Kategori::all();
    return view('pages.admin.kategori.index', compact('kategoris'));
  }

  /**
   * Show the form for creating a new kategori.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.admin.kategori.create');
  }

  /**
   * Store a newly created kategori in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'id_kategori_222305'   => 'required|string|max:255|unique:kategori_222305,id_kategori_222305',
      'nama_kategori_222305' => 'required|string|max:255',
    ]);

    Kategori::create([
      'id_kategori_222305'   => $request->id_kategori_222305,
      'nama_kategori_222305' => $request->nama_kategori_222305,
    ]);

    return redirect()
      ->route('admin.kategori.index')
      ->with('success', 'Kategori berhasil ditambahkan.');
  }

  /**
   * Display the specified kategori.
   *
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $kategori = Kategori::with('albums')->findOrFail($id);
    return view('pages.admin.kategori.show', compact('kategori'));
  }

  /**
   * Show the form for editing the specified kategori.
   *
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $kategori = Kategori::findOrFail($id);
    return view('pages.admin.kategori.edit', compact('kategori'));
  }

  /**
   * Update the specified kategori in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'nama_kategori_222305' => 'required|string|max:255',
    ]);

    $kategori = Kategori::findOrFail($id);
    $kategori->update([
      'nama_kategori_222305' => $request->nama_kategori_222305,
    ]);

    return redirect()
      ->route('admin.kategori.index')
      ->with('success', 'Kategori berhasil diperbarui.');
  }

  /**
   * Remove the specified kategori from storage.
   *
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $kategori = Kategori::findOrFail($id);
    $kategori->delete();

    return redirect()
      ->route('admin.kategori.index')
      ->with('success', 'Kategori berhasil dihapus.');
  }

  public function search(Request $request)
  {
    $query     = $request->get('q');
    $kategoris = Kategori::where('nama_kategori_222305', 'like', '%' . $query . '%')->get();
    return response()->json($kategoris);
  }

  public function userShow($id_kategori)
  {
    // Cari kategori berdasarkan ID bersama dengan album-album di dalamnya
    $kategori = Kategori::with('albums')->findOrFail($id_kategori);

    // Ambil semua album yang terkait dengan kategori ini
    $albums = $kategori->albums()->paginate(12);  // Paginate untuk membatasi jumlah album per halaman

    // Kirim data ke view
    return view('pages.users.albumbycategory', compact('kategori', 'albums'));
  }

  public function indexUser()
  {
    // Ambil semua kategori, dan muat relasi 'albums' untuk setiap kategori.
    // Kita hanya butuh beberapa gambar album sebagai preview.
    $kategoris = Kategori::with(['albums' => function ($query) {
      // Ambil hingga 4 album untuk setiap kategori sebagai preview gambar
      $query->limit(4);
    }])->orderBy('nama_kategori_222305', 'asc')->get();

    return view('pages.users.category', compact('kategoris'));
  }
}
