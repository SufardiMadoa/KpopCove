@extends('layouts.dashboard-layout')

@section('content')
    <div class="rounded-xl mt-20 w-full">
        <div class="bg-linen text-slate-950 p-4 rounded-t-xl">
            <h1 class="text-2xl font-bold">Edit Kategori</h1>
        </div>
        <div class="bg-white p-6 rounded-b-xl shadow">
            <form action="{{ route('admin.kategori.update', $kategori->id_kategori_222305) }}" method="POST">
                @csrf
                @method('PUT')
                
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="mb-4">
                    <label for="id_kategori_222305" class="block text-gray-700 font-bold mb-2">ID Kategori</label>
                    <input type="text" id="id_kategori_222305" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-100" 
                        value="{{ $kategori->id_kategori_222305 }}" disabled>
                </div>
                
                <div class="mb-4">
                    <label for="nama_kategori_222305" class="block text-gray-700 font-bold mb-2">Nama Kategori</label>
                    <input type="text" name="nama_kategori_222305" id="nama_kategori_222305" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" 
                        value="{{ old('nama_kategori_222305', $kategori->nama_kategori_222305) }}" required>
                </div>
                
                <div class="flex justify-between mt-6">
                    <a href="{{ route('admin.kategori.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Kembali
                    </a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection