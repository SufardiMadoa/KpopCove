@extends('layouts.app')

@section('title', 'Product List')

@section('content')
    <div class="relative h-full px-32 mt-14 min-h-screen">
        <div class="flex justify-center items-center">
            <div class="h-0.5 bg-black w-full mt-10"></div>
            <h2 class="text-2xl font-semibold mt-10 text-center w-[800px]">LIST PRODUCTS</h2>
            <div class="h-0.5 bg-black w-full mt-10"></div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-5">
            @if (!empty($products) && count($products) > 0)
                @foreach ($products as $product)
                    <x-shop.card-product :path="route('product.show', $product->id)" :title="$product->nama" :id_product="$product->id" :price="number_format($product->harga, 0, ',', '.') . ' IDR'" :image="Str::startsWith($product->path_img, 'http')
                        ? $product->path_img
                        : asset('storage/' . $product->path_img)"
                         />
                @endforeach
            @else
                <p class="text-center col-span-full">No products available.</p>
            @endif
        </div>

        
        <!-- Pagination -->
        <div class="flex justify-center mt-10">
            {{ $products->appends(['size' => request('size')])->links('vendor.pagination.tailwind') }}
        </div>
    </div>
@endsection
