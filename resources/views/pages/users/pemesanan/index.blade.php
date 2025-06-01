@extends('layouts.app')

@section('title', 'Order History')

@section('content')
<div class="py-20 bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="mb-10">
            <h1 class="text-4xl font-semibold text-gray-800">Order History</h1>
            <p class="text-gray-600 mt-1">Track and manage your album orders</p>
        </div>

        <!-- Status Tabs -->
        @php
            $statuses = ['semua', 'pending', 'dibayar', 'dikemas', 'dikirim', 'selesai', 'dibatalkan'];
            $currentStatus = request()->get('status', 'semua');
        @endphp

        <div class="mb-8 border-b border-gray-200">
            <nav class="-mb-px flex space-x-4 overflow-x-auto scrollbar-hide" aria-label="Tabs">
                @foreach($statuses as $status)
                    <a href="{{ route('users.pemesanan.index', ['status' => $status !== 'semua' ? $status : null]) }}"
                       class="whitespace-nowrap px-3 py-2 border-b-2 text-sm font-medium capitalize transition-all duration-200
                            {{ $currentStatus === $status 
                                ? 'border-cyan-500 text-cyan-600'
                                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                        {{ $status }}
                    </a>
                @endforeach
            </nav>
        </div>

        <!-- Order Content -->
        @if($pemesanans->isEmpty())
            <div class="bg-white rounded-xl shadow-md p-10 text-center">
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-medium text-gray-800">No orders yet</h3>
                <p class="mt-2 text-gray-500">Start shopping to create your first order</p>
                <div class="mt-6">
                    <a href="{{ route('user.album') }}"
                       class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-cyan-600 rounded-lg hover:bg-cyan-700 transition">
                        Browse Albums
                    </a>
                </div>
            </div>
        @else
            <div class="space-y-6">
                @foreach($pemesanans as $pemesanan)
                    <div class="bg-white rounded-xl shadow p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Order #{{ $pemesanan->id_pemesanan_222305 }}</h3>
                                <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($pemesanan->tanggal_pemesanan_222305)->format('d F Y') }}</p>
                            </div>
                            <div>
                                @switch($pemesanan->status_222305)
                                    @case('pending')
                                        <span class="badge rounded-lg p-1 bg-yellow-100 text-yellow-800">Pending</span>
                                        @break
                                    @case('dibayar')
                                        <span class="badge rounded-lg p-1 bg-blue-100 text-blue-800">Dibayar</span>
                                        @break
                                    @case('dikemas')
                                        <span class="badge rounded-lg p-1 bg-cyan-100 text-cyan-800">Dikemas</span>
                                        @break
                                    @case('dikirim')
                                        <span class="badge rounded-lg p-1 bg-fuchsia-100 text-fuchsia-800">Dikirim</span>
                                        @break
                                    @case('selesai')
                                        <span class="badge rounded-lg p-1 bg-green-100 text-green-800">Selesai</span>
                                        @break
                                    @case('dibatalkan')
                                        <span class="badge rounded-lg p-1 bg-red-100 text-red-800">Dibatalkan</span>
                                        @break
                                    @default
                                        <span class="badge rounded-lg p-1 bg-gray-100 text-gray-800">{{ $pemesanan->status_pembayaran_222305 }}</span>
                                @endswitch
                            </div>
                        </div>

                        <!-- Items -->
                        <div class="divide-y divide-gray-100">
                            @foreach($pemesanan->itemPesanans as $item)
                                <div class="flex items-center gap-4 py-4">
                                    <img src="{{ asset('storage/' . $item->album->path_img_222305) }}"
                                         alt="{{ $item->album->judul_222305 }}"
                                         class="w-16 h-16 object-cover rounded-md border" />
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-800">{{ $item->album->judul_222305 }}</h4>
                                        <p class="text-sm text-gray-500">Quantity: {{ $item->jumlah_222305 }}</p>
                                        <p class="text-sm font-semibold text-gray-900">Rp {{ number_format($item->harga_satuan_222305, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Summary -->
                        <div class="mt-6 border-t pt-4 flex justify-between text-sm">
                            <div>
                                <p class="text-gray-500">Payment Method</p>
                                <p class="font-medium text-gray-900">{{ ucfirst($pemesanan->metode_pembayaran_222305) }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-gray-500">Total Amount</p>
                                <p class="text-lg font-bold text-gray-900">Rp {{ number_format($pemesanan->total_harga_222305, 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <!-- Action -->
                        <div class="mt-6 flex justify-end space-x-3">
                            <a href="{{ route('users.pemesanan.show', $pemesanan->id_pemesanan_222305) }}"
                               class="px-4 py-2 text-sm rounded-md border bg-white text-gray-700 hover:bg-gray-50 shadow">
                                View Details
                            </a>

                            @if($pemesanan->status_222305 == 'belum dibayar')
                                <form action="{{ route('users.pemesanan.cancel', $pemesanan->id_pemesanan_222305) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                            onclick="return confirm('Are you sure you want to cancel this order?')"
                                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 shadow">
                                        Cancel Order
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
