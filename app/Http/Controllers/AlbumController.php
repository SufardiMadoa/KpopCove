<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Foto;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
  /**
   * Display a listing of the album.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $albums = Album::with(['user', 'kategoris', 'fotos'])->get();
    return view('pages.admin.album.index', compact('albums'));
  }

  public function user()
  {
    $albums = Album::with(['user', 'kategoris', 'fotos'])->get();

    return view('pages.users.album', compact('albums'));
  }
  public function userHome()
  {
    $albums = Album::with(['user', 'kategoris', 'fotos'])->get();

    return view('pages.users.home', compact('albums'));
  }

  public function userShow($id)
  {
    // Ambil data album lengkap dengan relasi
    $album = Album::with(['user', 'kategoris', 'fotos'])->findOrFail($id);

    return view('pages.users.album-detail', compact('album'));
  }

  /**
   * Show the form for creating a new album.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $kategoris = Kategori::all();
    return view('pages.admin.album.create', compact('kategoris'));
  }

  /**
   * Store a newly created album in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'id_album_222305'  => 'required|string|max:255|unique:album_222305,id_album_222305',
      'judul_222305'     => 'required|string|max:255',
      'deskripsi_222305' => 'required|string',
      'harga_222305'     => 'required|numeric|min:0',
      'status_222305'    => 'required|in:tersedia,tidak tersedia',
      'cover_image'      => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
      'kategori_ids'     => 'required|array',
      'kategori_ids.*'   => 'exists:kategori_222305,id_kategori_222305',
    ]);

    // Handle file upload
    $path = null;
    if ($request->hasFile('cover_image')) {
      $image    = $request->file('cover_image');
      $filename = time() . '_' . $image->getClientOriginalName();
      $path     = $image->storeAs('album_covers', $filename, 'public');
    }

    // Create album
    $album = Album::create([
      'id_album_222305'  => $request->id_album_222305,
      'email_222305'     => Auth::id(),
      'judul_222305'     => $request->judul_222305,
      'deskripsi_222305' => $request->deskripsi_222305,
      'harga_222305'     => $request->harga_222305,
      'status_222305'    => $request->status_222305,
      'stok_222305'      => $request->stok_222305,
      'kategori_222305'  => $request->kategori_222305,
      'path_img_222305'  => $path,
    ]);

    // Attach categories
    foreach ($request->kategori_ids as $kategoriId) {
      DB::table('album_kategori_222305')->insert([
        'id_album_kategori_222305' => Str::uuid()->toString(),
        'id_album_222305'          => $album->id_album_222305,
        'id_kategori_222305'       => $kategoriId
      ]);
    }

    return redirect()->route('admin.album.index')->with('success', 'Album berhasil dibuat!');
  }

  /**
   * Display the specified album.
   *
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $album = Album::with(['user', 'kategoris', 'fotos'])->findOrFail($id);
    return view('pages.admin.album.show', compact('album'));
  }

  /**
   * Show the form for editing the specified album.
   *
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $album             = Album::with('kategoris')->findOrFail($id);
    $kategoris         = Kategori::all();
    $selectedKategoris = $album->kategoris->pluck('id_kategori_222305')->toArray();

    return view('pages.admin.album.edit', compact('album', 'kategoris', 'selectedKategoris'));
  }

  /**
   * Update the specified album in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'judul_222305'     => 'required|string|max:255',
      'deskripsi_222305' => 'required|string',
      'harga_222305'     => 'required|numeric|min:0',
      'status_222305'    => 'required|in:tersedia,tidak tersedia',
      'cover_image'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'kategori_ids'     => 'required|array',
      'kategori_ids.*'   => 'exists:kategori_222305,id_kategori_222305',
    ]);

    $album = Album::findOrFail($id);

    // Handle file upload if new image is provided
    if ($request->hasFile('cover_image')) {
      // Delete old image if exists
      if ($album->path_img_222305) {
        Storage::disk('public')->delete($album->path_img_222305);
      }

      // Store new image
      $image    = $request->file('cover_image');
      $filename = time() . '_' . $image->getClientOriginalName();
      $path     = $image->storeAs('album_covers', $filename, 'public');

      $album->path_img_222305 = $path;
    }

    // Update album details
    $album->judul_222305     = $request->judul_222305;
    $album->deskripsi_222305 = $request->deskripsi_222305;
    $album->harga_222305     = $request->harga_222305;
    $album->status_222305    = $request->status_222305;
    $album->stok_222305      = $request->stok_222305;
    $album->save();

    // Sync categories
    $album->syncKategorisWithCustomIds($request->kategori_ids);

    return redirect()
      ->route('admin.album.index', $album->id_album_222305)
      ->with('success', 'Album berhasil diperbarui!');
  }

  /**
   * Remove the specified album from storage.
   *
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $album = Album::findOrFail($id);

    // Delete album cover if exists
    if ($album->path_img_222305) {
      Storage::disk('public')->delete($album->path_img_222305);
    }

    // Delete related photos if needed (you may want to customize this)
    foreach ($album->fotos as $foto) {
      if ($foto->path_foto_222305) {
        Storage::disk('public')->delete($foto->path_foto_222305);
      }
      $foto->delete();
    }

    // Detach all categories
    $album->kategoris()->detach();

    // Delete album
    $album->delete();

    return redirect()
      ->route('album.index')
      ->with('success', 'Album berhasil dihapus!');
  }

  /**
   * List all albums for the public gallery.
   *
   * @return \Illuminate\Http\Response
   */
  public function gallery()
  {
    $albums = Album::where('status_222305', 'aktif')
      ->with(['user', 'kategoris', 'fotos'])
      ->get();

    return view('pages.admin.album.gallery', compact('albums'));
  }

  /**
   * Display albums by category.
   *
   * @param  string  $kategoriId
   * @return \Illuminate\Http\Response
   */
  public function byKategori($kategoriId)
  {
    $kategori = Kategori::findOrFail($kategoriId);
    $albums   = $kategori
      ->albums()
      ->where('status_222305', 'aktif')
      ->with(['user', 'fotos'])
      ->get();

    return view('pages.admin.album.by_kategori', compact('albums', 'kategori'));
  }

  /**
   * List albums created by the authenticated user.
   *
   * @return \Illuminate\Http\Response
   */
  public function myAlbums()
  {
    $albums = Album::where('email_222305', Auth::id())
      ->with(['kategoris', 'fotos'])
      ->get();

    return view('pages.admin.album.my_albums', compact('albums'));
  }

  /**
   * Add photos to an album.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function addPhotos(Request $request, $id)
  {
    $request->validate([
      'photos'   => 'required|array',
      'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $album = Album::findOrFail($id);

    // Check if user is authorized to add photos to this album
    if ($album->email_222305 != Auth::id()) {
      return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menambahkan foto ke album ini.');
    }

    foreach ($request->file('photos') as $photo) {
      $filename = time() . '_' . $photo->getClientOriginalName();
      $path     = $photo->storeAs('album_photos', $filename, 'public');

      Foto::create([
        'id_foto_222305'        => Str::uuid()->toString(),
        'id_album_222305'       => $album->id_album_222305,
        'judul_foto_222305'     => pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME),
        'deskripsi_foto_222305' => 'Foto untuk album ' . $album->judul_222305,
        'path_foto_222305'      => $path,
        'tanggal_unggah_222305' => now(),
      ]);
    }

    return redirect()
      ->route('album.show', $album->id_album_222305)
      ->with('success', 'Foto berhasil ditambahkan ke album!');
  }

  /**
   * Remove a photo from an album.
   *
   * @param  string  $albumId
   * @param  string  $photoId
   * @return \Illuminate\Http\Response
   */
  public function removePhoto($albumId, $photoId)
  {
    $album = Album::findOrFail($albumId);
    $photo = Foto::findOrFail($photoId);

    // Check if user is authorized to remove photos from this album
    if ($album->email_222305 != Auth::id()) {
      return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus foto dari album ini.');
    }

    // Check if photo belongs to the album
    if ($photo->id_album_222305 != $albumId) {
      return redirect()->back()->with('error', 'Foto tidak ditemukan dalam album ini.');
    }

    // Delete photo file
    if ($photo->path_foto_222305) {
      Storage::disk('public')->delete($photo->path_foto_222305);
    }

    // Delete photo record
    $photo->delete();

    return redirect()
      ->route('album.show', $albumId)
      ->with('success', 'Foto berhasil dihapus dari album!');
  }

  /**
   * Toggle album status (aktif/nonaktif).
   *
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function toggleStatus($id)
  {
    $album = Album::findOrFail($id);

    // Check if user is authorized to modify this album
    if ($album->email_222305 != Auth::id()) {
      return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengubah status album ini.');
    }

    // Toggle status
    $album->status_222305 = $album->status_222305 == 'aktif' ? 'nonaktif' : 'aktif';
    $album->save();

    return redirect()
      ->back()
      ->with('success', 'Status album berhasil diperbarui menjadi ' . $album->status_222305 . '!');
  }

  /**
   * Search albums by title, description, or category.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function search(Request $request)
  {
    $query      = $request->input('query');
    $kategoriId = $request->input('kategori_id');

    $albumsQuery = Album::query();

    // Filter by status (only show active albums)
    $albumsQuery->where('status_222305', 'aktif');

    // Search by title or description
    if ($query) {
      $albumsQuery->where(function ($q) use ($query) {
        $q
          ->where('judul_222305', 'like', "%$query%")
          ->orWhere('deskripsi_222305', 'like', "%$query%");
      });
    }

    // Filter by category
    if ($kategoriId) {
      $albumsQuery->whereHas('kategoris', function ($q) use ($kategoriId) {
        $q->where('id_kategori_222305', $kategoriId);
      });
    }

    $albums    = $albumsQuery->with(['user', 'kategoris', 'fotos'])->get();
    $kategoris = Kategori::all();

    return view('pages.admin.album.search', compact('albums', 'kategoris', 'query', 'kategoriId'));
  }
}
