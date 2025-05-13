@extends('layouts.app')

@section('title', 'List Produk')

@section('content')
    <section class="py-10 bg-blue-50 w-full">
          <h1 class="font-semibold text-xl text-center text-slate-800">LIST ALBUM</h1>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-4">
              <!-- Product 1 -->
               @foreach($albums as $album)
              <x-shop.card_product  path="/album/{{ $album->id_album_222305 }}" title="{{ $album->judul_222305 }}" price="{{ number_format($album->harga_222305, 0, ',', '.') }}" image="{{ asset('storage/' . $album->path_img_222305) }}"
                  class="custom-class" />
                  @endforeach
             
              </div>

    </section>  
@endsection
