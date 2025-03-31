@extends('layouts.dashboard-layout')

@section('content')
    <div class="container mx-auto mt-8 pt-20">
        <h1 class="text-2xl font-semibold mb-6">Edit Kategori</h1>

        <form action="{{ route('dashboard.category_products.update', $category->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                <input type="text" name="nama" id="nama" value="{{ $category->nama }}"
                    class="mt-1 p-2 border border-gray-300 rounded w-full">
            </div>



            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 p-2 border border-gray-300 rounded w-full">{{ $category->deskripsi }}</textarea>
            </div>



            <div class="mb-4">
                <label for="path_img" class="block text-sm font-medium text-gray-700">Gambar Kategori</label>
                <input type="file" name="path_img" id="path_img" class="mt-1 p-2 border border-gray-300 rounded w-full">

                @if ($category->path_img)
                    <div class="mt-2">
                        <img src="{{ Str::startsWith($category->path_img, 'http') ? $category->path_img : asset('storage/' . $category->path_img) }}"
                            alt="Gambar Kategori" class="h-32 w-32 object-cover border mt-2">
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Gambar saat ini</p>
                @endif
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Perubahan</button>
            <a href="{{ route('dashboard.kategori.index') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Batal</a>
        </form>
    </div>
@endsection
