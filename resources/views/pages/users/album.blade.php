@extends('layouts.app')

@section('title', 'List Produk')

@section('content')
    <section class="py-10 bg-blue-50">
          <h1 class="font-semibold text-xl text-center text-slate-800">LIST ALBUM</h1>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-4">
              <!-- Product 1 -->
              <x-shop.card_product path="/album/detail" title="Stray Kids - ROCK-STAR " price="Rp 200.000" image="https://img.freepik.com/free-psd/music-band-template-design_23-2151659152.jpg?t=st=1746536437~exp=1746540037~hmac=bbd8bf9a0fc03ff625780d62f04a03c52dd6f1a01fe19c8d8391ae4eefb701e7&w=900"
                  class="custom-class" />
              <x-shop.card_product path="/album/detail" title="aespa - Drama" price="Rp 150.000" image="https://img.freepik.com/free-psd/korean-restaurant-flyer-template-design_23-2151934251.jpg?t=st=1746536479~exp=1746540079~hmac=22db791c92e523673ee624ff0b11c848c1e54c19f50267c6270d3ded24f8f59d&w=900"
                  class="custom-class" />
              <x-shop.card_product path="/album/detail" title="BTS - Proof" price="Rp 100.000" image="https://img.freepik.com/free-psd/korean-restaurant-flyer-template-design_23-2151934251.jpg?t=st=1746536479~exp=1746540079~hmac=22db791c92e523673ee624ff0b11c848c1e54c19f50267c6270d3ded24f8f59d&w=900"
                  class="custom-class" />
              <x-shop.card_product path="/album/detail" title="IVE - I'VE CHOICE" price="Rp 123.000" image="https://img.freepik.com/free-psd/gradient-sweet-16-poster-template_23-2149541065.jpg?t=st=1746536520~exp=1746540120~hmac=33866e536365b7abfa5bd98791057fb958a9ce21d4c5c9ca55a35a833d2c1830&w=900"
                  class="custom-class" />
              </div>
    </section>  
@endsection
