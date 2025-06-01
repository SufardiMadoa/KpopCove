@extends('layouts.app')

@section('title', 'Order History')

@section('content')
<div class="py-20 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Order History</h1>
            <p class="text-gray-600 mt-2">Track and manage your album orders</p>
        </div>

        <!-- Orders List -->
        @if($pemesanans->isEmpty())
            <div class="bg-white rounded-lg shadow p-8 text-center">
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900">No orders yet</h3>
                <p class="mt-2 text-gray-500">Start shopping to create your first order</p>
                <div class="mt-6">
                    <a href="{{ route('user.album') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                        Browse Albums
                    </a>
                </div>
            </div>
        @else
            <div class="space-y-4">
                @foreach($pemesanans as $pemesanan)
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <h3 class="text-lg font-medium text-gray-900">Order #{{ $pemesanan->id_pemesanan_222305 }}</h3>
                                    <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($pemesanan->tanggal_pemesanan_222305)->format('d F Y') }}</p>
                                </div>
                                <div>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 capitalize">
                                            {{ $pemesanan->status_222305 }}
                                        </span>
                                </div>
                            </div>

                            <!-- Order Items -->
                            <div class="border-t border-gray-200 pt-4">
                                @foreach($pemesanan->itemPesanans as $item)
                                    <div class="flex items-center py-2">
                                        <div class="flex-shrink-0 w-16 h-16">
                                            <img src="{{ asset('storage/' . $item->album->path_img_222305) }}" alt="{{ $item->album->judul_222305 }}" class="w-full h-full object-cover rounded">
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <h4 class="text-sm font-medium text-gray-900">{{ $item->album->judul_222305 }}</h4>
                                            <p class="text-sm text-gray-500">Quantity: {{ $item->jumlah_222305 }}</p>
                                            <p class="text-sm font-medium text-gray-900">Rp {{ number_format($item->harga_satuan_222305, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Order Summary -->
                            <div class="border-t border-gray-200 mt-4 pt-4">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-sm text-gray-500">Payment Method</p>
                                        <p class="text-sm font-medium text-gray-900">{{ ucfirst($pemesanan->metode_pembayaran_222305) }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm text-gray-500">Total Amount</p>
                                        <p class="text-lg font-bold text-gray-900">Rp {{ number_format($pemesanan->total_harga_222305, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="border-t border-gray-200 mt-4 pt-4 flex justify-end space-x-4">
                                <a href="{{ route('users.pemesanan.show', $pemesanan->id_pemesanan_222305) }}" 
                                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                                    View Details
                                </a>
                                @if($pemesanan->status_222305 == 'belum dibayar')
                                    <form action="{{ route('users.pemesanan.cancel', $pemesanan->id_pemesanan_222305) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" 
                                                onclick="return confirm('Are you sure you want to cancel this order?')"
                                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                            Cancel Order
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
