@extends('layouts.app')

@section('title', 'Cart')

@section('content')
    <div class=" rounded-md mt-20">
        <div class="flex shadow-md">
            <div class="w-[65%] bg-white py-10">
                <div class="flex justify-between border-b pb-8 px-10">
                    <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                    <h2 class="font-semibold text-2xl">3 Items</h2>
                </div>

                <div class="flex mt-10 mb-5">
                    <h3 class="font-semibold px-20 text-gray-900 text-xs uppercase w-2/5">Product Details</h3>
                    <h3 class="font-semibold text-center text-gray-900 text-xs uppercase w-1/5">Quantity</h3>
                    <h3 class="font-semibold text-center text-gray-900 text-xs uppercase w-1/5">Price</h3>
                    <h3 class="font-semibold text-center text-gray-900 text-xs uppercase w-1/5">Total</h3>
                </div>

                <div class="flex flex-col gap-3">
                    @php
                        $cartItems = [
                            [
                                'id' => 1,
                                'nama' => 'Product A',
                                'harga' => 50000,
                                'quantity' => 2,
                                'path_img' => 'images/product-a.jpg',
                            ],
                            [
                                'id' => 2,
                                'nama' => 'Product B',
                                'harga' => 75000,
                                'quantity' => 1,
                                'path_img' => 'images/product-b.jpg',
                            ],
                            [
                                'id' => 3,
                                'nama' => 'Product C',
                                'harga' => 60000,
                                'quantity' => 3,
                                'path_img' => 'images/product-c.jpg',
                            ],
                        ];
                        $totalPrice = 0;
                    @endphp
                    @foreach ($cartItems as $item)
                        @php
                            $itemTotal = $item['harga'] * $item['quantity'];
                            $totalPrice += $itemTotal;
                        @endphp
                        <div class="flex items-center hover:bg-gray-100 px-6 py-5">
                            <div class="flex w-2/5">
                                <div class="w-20">
                                    <img class="h-24" src="{{ asset($item['path_img']) }}" alt="{{ $item['nama'] }}">
                                </div>
                                <div class="flex flex-col justify-between ml-4 flex-grow">
                                    <span class="font-bold text-sm text-slate-950">{{ $item['nama'] }}</span>
                                    <button class="font-bold text-sm text-start rounded text-red-500">Remove</button>
                                </div>
                            </div>
                            <div class="flex justify-center w-1/5 items-center gap-2">
                                <button class="text-gray-900 text-xl">-</button>
                                <span class="text-center w-8">{{ $item['quantity'] }}</span>
                                <button class="text-gray-900 text-xl">+</button>
                            </div>
                            <span class="text-center w-1/5 font-semibold text-sm">Rp
                                {{ number_format($item['harga'], 2) }}</span>
                            <span class="text-center w-1/5 font-semibold text-sm">Rp
                                {{ number_format($itemTotal, 2) }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div id="summary" class="w-[35%] px-8 py-10 bg-white">
                <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
                <div class="flex justify-between mt-10 mb-5">
                    <span class="font-semibold text-sm uppercase">Items {{ count($cartItems) }}</span>
                </div>

                <div class="border-t mt-8">
                    <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                        <span>Total cost</span>
                        <span>Rp {{ number_format($totalPrice, 2) }}</span>
                    </div>
                    <button
                        class="bg-green-500 font-semibold hover:bg-green-700 py-3 text-sm text-white uppercase w-full">Checkout</button>
                </div>
            </div>
        </div>
    </div>
@endsection
