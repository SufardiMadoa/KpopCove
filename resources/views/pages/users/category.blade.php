  @extends('layouts.app')

@section('title', 'Semua Kategori')

@section('content')
<div class="bg-gray-50 py-16 font-jost">
    <div class="container mx-auto px-4">

        {{-- Header Halaman --}}
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-slate-900">Jelajahi Semua Kategori</h1>
            <p class="text-slate-600 mt-4 max-w-2xl mx-auto">
                Temukan grup, artis, atau genre favorit Anda dari koleksi kategori kami.
            </p>
        </div>

        {{-- Daftar Kategori --}}
        @if($kategoris->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($kategoris as $kategori)
                    <a href="{{ route('user.category.show', $kategori->id_kategori_222305) }}"
                       class="group block bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                        <div class="relative h-48 bg-gray-200">
                            {{-- Mini-grid untuk gambar album --}}
                            <div class="grid grid-cols-2 grid-rows-2 h-full">
                                @forelse($kategori->albums->take(4) as $index => $album)
                                    <div class="h-full w-full overflow-hidden">
                                        <img src="{{ asset('storage/' . $album->path_img_222305) }}"
                                             alt="{{ $album->judul_222305 }}"
                                             class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                                             onerror="this.style.display='none'">
                                    </div>
                                @empty
                                    {{-- Placeholder jika tidak ada album --}}
                                    <div class="col-span-2 row-span-2 flex items-center justify-center bg-gray-100">
                                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l-1-1m6-3l-2-2"></path></svg>
                                    </div>
                                @endforelse
                            </div>
                            {{-- Overlay Gradien --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                            {{-- Nama Kategori --}}
                            <h3 class="absolute bottom-4 left-4 text-xl font-bold text-white group-hover:text-cyan-300 transition-colors">
                                {{ $kategori->nama_kategori_222305 }}
                            </h3>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            {{-- Pesan jika tidak ada kategori --}}
            <div class="text-center bg-white rounded-lg shadow-md p-12">
                <h3 class="text-xl font-semibold text-gray-700">Tidak Ada Kategori</h3>
                <p class="text-gray-500 mt-2">Saat ini belum ada kategori yang tersedia.</p>
            </div>
        @endif
    </div>
</div>
@endsection
