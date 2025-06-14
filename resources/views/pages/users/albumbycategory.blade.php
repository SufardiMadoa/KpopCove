@extends('layouts.app')

{{-- Judul halaman akan dinamis sesuai nama kategori --}}
@section('title', 'Kategori: ' . $kategori->nama_kategori_222305)

@section('content')
<div class="bg-gray-50 py-16 font-jost">
    <div class="container mx-auto px-4">
        
        {{-- Header Halaman Kategori --}}
        <div class="text-center mb-12">
            <p class="text-cyan-600 font-semibold">Browsing Kategori</p>
            <h1 class="text-4xl font-bold text-slate-900 mt-2">{{ $kategori->nama_kategori_222305 }}</h1>
            <p class="text-slate-600 mt-4 max-w-2xl mx-auto">
                Temukan koleksi album K-Pop terbaik dari kategori '{{ $kategori->nama_kategori_222305 }}'.
            </p>
        </div>

        {{-- Daftar Album --}}
        @if($albums->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($albums as $album)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                        <a href="{{ route('user.album-detail', $album->id_album_222305) }}" class="block">
                            <div class="relative">
                                <img src="{{ asset('storage/' . $album->path_img_222305) }}" alt="{{ $album->judul_222305 }}" 
                                     class="w-full h-64 object-cover"
                                     onerror="this.onerror=null;this.src='https://placehold.co/400x600/e2e8f0/475569?text=Image+Not+Found';">
                                
                                @if($album->stok_222305 < 10 && $album->stok_222305 > 0)
                                    <span class="absolute top-3 right-3 bg-yellow-500 text-white text-xs font-bold px-2 py-1 rounded-full">Stok Terbatas</span>
                                @elseif($album->stok_222305 == 0)
                                    <span class="absolute top-3 right-3 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full">Habis</span>
                                @endif
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-slate-800 truncate" title="{{ $album->judul_222305 }}">
                                    {{ $album->judul_222305 }}
                                </h3>
                                <p class="text-slate-500 text-sm mt-1">
                                    {{ $album->artist->nama_artist_222305 ?? 'N/A' }}
                                </p>
                                <p class="text-xl font-bold text-cyan-700 mt-4">
                                    {{ 'Rp ' . number_format($album->harga_222305, 0, ',', '.') }}
                                </p>
                            </div>
                        </a>
                        <div class="px-5 pb-5">
                            <a href="{{ route('user.album-detail', $album->id_album_222305) }}" 
                               class="w-full block text-center bg-cyan-600 text-white py-2 rounded-md font-medium hover:bg-cyan-700 transition">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Link Paginasi --}}
            <div class="mt-12">
                {{ $albums->links() }}
            </div>
        @else
            {{-- Pesan jika tidak ada album --}}
            <div class="text-center bg-white rounded-lg shadow-md p-12">
                <h3 class="text-xl font-semibold text-gray-700">Belum Ada Album</h3>
                <p class="text-gray-500 mt-2">Saat ini tidak ada album yang tersedia di kategori ini.</p>
            </div>
        @endif
    </div>
</div>
@endsection
