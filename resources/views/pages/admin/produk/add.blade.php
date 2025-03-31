@extends('layouts.dashboard-layout')

@section('content')
    <div class="container mx-auto pt-24 ">

        <form class="bg-white p-6 rounded-lg shadow-md" action="{{ route('products.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <h1 class="text-3xl font-semibold text-gray-800 mb-6">Tambah Produk</h1>

            @csrf
            <div class="mb-6">
                <label for="nama" class="block text-lg font-medium text-gray-700 mb-2">Nama Produk</label>
                <input type="text" name="nama"
                    class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-6">
                <label for="deskripsi" class="block text-lg font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi"
                    class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="4"></textarea>
            </div>

            <div class="mb-6">
                <label for="harga" class="block text-lg font-medium text-gray-700 mb-2">Harga</label>
                <input type="number" name="harga"
                    class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-6">
                <label for="jumlah" class="block text-lg font-medium text-gray-700 mb-2">Jumlah Produk</label>
                <input type="number" name="jumlah" id="jumlah"
                    class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-6">
                <label for="kategori_id" class="block text-lg font-medium text-gray-700 mb-2">Kategori
                    Produk</label>
                <select name="kategori_id" class="border p-2 w-full">
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="path_img" class="block text-lg font-medium text-gray-700 mb-2">Gambar Produk</label>
                <input type="file" name="path_img"
                    class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit"
                class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Simpan
                Produk</button>
        </form>
    </div>
@endsection
