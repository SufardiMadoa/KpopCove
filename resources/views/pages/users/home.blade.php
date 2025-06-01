@extends('layouts.app')

@section('title', 'Home | Kpop Cove')

@section('content')
<!-- Hero Section with Clean Korean-Inspired Design -->
<section class="bg-gray-50 font-jost">
    <div class="container mx-auto py-16 px-4">
        <div class="flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="md:w-1/2 text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-medium text-gray-800 leading-tight">NEW RELEASES 2025</h1>
                <p class="mt-4 text-gray-600 max-w-lg">Discover the latest K-pop albums from your favorite artists. Limited editions, exclusive photobooks, and special gifts with purchase!</p>
                <button class="mt-8 bg-cyan-500 text-white px-8 py-3 font-medium hover:bg-cyan-600 transition-colors">SHOP NOW</button>
            </div>
            <div class="md:w-1/2">
                <div class="bg-white p-2 shadow-md">
                    <img src="https://img.freepik.com/free-vector/retro-advertising-sale-banner-design-template_23-2149639577.jpg?t=st=1746535587~exp=1746539187~hmac=7dad6bb2d0b73a0f52c48ce49c345b6a2a6f98baf0e3ac7a9e9e2f85c6de6eb1&w=1800" alt="New K-pop Albums" class="w-full h-auto">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Group Categories with Korean Aesthetic -->
<section class="bg-white py-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="border border-gray-200 p-8 text-center hover:border-cyan-500 transition-colors">
                <h3 class="text-xl font-bold text-gray-800">GIRL GROUPS</h3>
                <p class="text-gray-600 mt-2">BLACKPINK, TWICE, NewJeans, aespa & more</p>
                <button class="mt-4 text-cyan-500 font-medium hover:text-cyan-600 transition-colors">Explore →</button>
            </div>
            <div class="border border-gray-200 p-8 text-center hover:border-cyan-500 transition-colors">
                <h3 class="text-xl font-bold text-gray-800">BOY GROUPS</h3>
                <p class="text-gray-600 mt-2">BTS, Stray Kids, SEVENTEEN, EXO & more</p>
                <button class="mt-4 text-cyan-500 font-medium hover:text-cyan-600 transition-colors">Explore →</button>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section - Clean Grid Layout -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-medium text-center text-gray-800 mb-8">ALBUM FAVORIT</h2>

        <div class="flex justify-center">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($albums as $album)
                <a href="/album/{{ $album->id_album_222305 }}">
                    <div class="bg-white group w-64">
                        <div class="aspect-square overflow-hidden">
                            <img src="{{ asset('storage/' . $album->path_img_222305) }}" alt="{{ $album->judul_222305 }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="p-4">
                            <h3 class="font-medium text-gray-800">
                                {{ $album->judul_222305 }}
                                @if ($album->kategoris->isNotEmpty())
                                - <span class="text-gray-600">
                                    {{ $album->kategoris->pluck('nama_kategori_222305')->join(', ') }}
                                </span>
                                @endif
                            </h3>
                            <p class="text-cyan-500 mt-2">Rp {{ number_format($album->harga_222305, 0, ',', '.') }}</p>
                            <button class="w-full mt-3 border border-gray-800 text-gray-800 py-2 hover:bg-gray-800 hover:text-white transition-colors">Add to Cart</button>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>


<!-- Featured Album Section - Simple Banner Style -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="bg-gray-50 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 p-8 md:p-16">
                <h2 class="text-xl font-medium text-gray-800">FEATURED ALBUM</h2>
                <h3 class="text-2xl font-bold text-cyan-500 mt-2">NewJeans - Get Up</h3>
                <p class="text-gray-600 mt-4">Limited restock of the hit EP with exclusive photocard sets and posters. Includes fan-favorite tracks "Super Shy" and "ETA".</p>
                <button class="mt-6 bg-gray-800 text-white px-6 py-2 hover:bg-gray-700 transition-colors">SHOP NOW →</button>
            </div>
            <div class="md:w-1/2">
                <img src="https://img.freepik.com/free-psd/music-band-template-design_23-2151659152.jpg?t=st=1746536437~exp=1746540037~hmac=bbd8bf9a0fc03ff625780d62f04a03c52dd6f1a01fe19c8d8391ae4eefb701e7&w=900" alt="NewJeans - Get Up" class="w-full h-auto">
            </div>
        </div>
    </div>
</section>
@endsection