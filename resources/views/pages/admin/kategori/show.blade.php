@extends('layouts.dashboard-layout')

@section('content')
    <div class="rounded-xl mt-20 w-full">
        <div class="bg-linen text-slate-950 p-4 rounded-t-xl flex justify-between items-center">
            <h1 class="text-2xl font-bold">Detail Kategori</h1>
            <a href="{{ route('admin.kategori.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Kembali
            </a>
        </div>
        <div class="bg-white p-6 rounded-b-xl shadow">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h2 class="text-xl font-bold mb-4">Informasi Kategori</h2>
                    <div class="border p-4 rounded-lg">
                        <div class="mb-4">
                            <span class="font-semibold">ID Kategori:</span>
                            <p class="text-gray-700">{{ $kategori->id_kategori_222305 }}</p>
                        </div>
                        <div class="mb-4">
                            <span class="font-semibold">Nama Kategori:</span>
                            <p class="text-gray-700">{{ $kategori->nama_kategori_222305 }}</p>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold mb-4">Album Terkait</h2>
                    <div class="border p-4 rounded-lg">
                        @if($kategori->albums->count() > 0)
                            <ul class="list-disc pl-5">
                                @foreach($kategori->albums as $album)
                                    <li class="mb-2">
                                        {{ $album->id_album_222305 }} - {{ $album->nama_album_222305 ?? 'Tanpa Nama' }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500">Tidak ada album terkait untuk kategori ini.</p>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="flex justify-between mt-6">
                <a href="{{ route('admin.kategori.edit', $kategori->id_kategori_222305) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Edit Kategori
                </a>
                <form action="{{ route('admin.kategori.destroy', $kategori->id_kategori_222305) }}" method="POST"
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Hapus Kategori
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection