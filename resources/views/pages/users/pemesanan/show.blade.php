@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
<div class="py-20 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4">
        <!-- Header with Back Button -->
        <div class="mb-8 flex items-center">
            <a href="{{ route('users.pemesanan.index') }}" class="mr-4 text-gray-600 hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Order Details</h1>
                <p class="text-gray-600 mt-1">Order #{{ $pemesanan->id_pemesanan_222305 }}</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Order Status Banner -->
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-gray-500">Order Status</p>
                       
                           <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 capitalize">
                            {{ $pemesanan->status_222305 }}
                            </span>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500">Order Date</p>
                        <p class="text-sm font-medium text-gray-900">
                            {{ \Carbon\Carbon::parse($pemesanan->tanggal_pemesanan_222305)->format('d F Y') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="px-6 py-4">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Order Items</h3>
                <div class="space-y-4">
                    @foreach($pemesanan->itemPesanans as $item)
                        <div class="flex items-center border-b border-gray-200 pb-4 last:border-0 last:pb-0">
                            <div class="flex-shrink-0 w-24 h-24">
                                <img src="{{ asset('storage/' . $item->album->path_img_222305) }}" 
                                     alt="{{ $item->album->judul_222305 }}" 
                                     class="w-full h-full object-cover rounded">
                            </div>
                            <div class="ml-6 flex-1">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-lg font-medium text-gray-900">{{ $item->album->judul_222305 }}</h4>
                                        <p class="text-sm text-gray-500 mt-1">Quantity: {{ $item->jumlah_222305 }}</p>
                                    </div>
                                    <p class="text-lg font-medium text-gray-900">
                                        Rp {{ number_format($item->harga_satuan_222305, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Payment Details -->
            <div class="px-6 py-4 bg-gray-50">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Payment Details</h3>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Payment Method</span>
                        <span class="font-medium text-gray-900">{{ ucfirst($pemesanan->metode_pembayaran_222305) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Subtotal</span>
                        <span class="font-medium text-gray-900">Rp {{ number_format($pemesanan->total_harga_222305, 0, ',', '.') }}</span>
                    </div>
                    <div class="border-t border-gray-200 pt-2 mt-2">
                        <div class="flex justify-between">
                            <span class="text-lg font-medium text-gray-900">Total</span>
                            <span class="text-lg font-bold text-gray-900">Rp {{ number_format($pemesanan->total_harga_222305, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            @if($pemesanan->status_222305 == 'belum dibayar')
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                    <div class="flex justify-end space-x-4">
                        <form action="{{ route('users.pemesanan.cancel', $pemesanan->id_pemesanan_222305) }}" 
                              method="POST" 
                              class="inline-block">
                            @csrf
                            <button type="submit"
                                    onclick="return confirm('Are you sure you want to cancel this order?')"
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Cancel Order
                            </button>
                        </form>
                        <button type="button"
                                onclick="document.getElementById('payment-modal').style.display='block'"
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                            Upload Payment Proof
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Payment Proof Modal -->
    <div id="payment-modal" class="fixed inset-0 bg-gray-500 bg-opacity-75 hidden" style="z-index: 1000;">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-medium text-gray-900">Upload Payment Proof</h3>
                        <button type="button" 
                                onclick="document.getElementById('payment-modal').style.display='none'"
                                class="text-gray-400 hover:text-gray-500">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <form action="{{ route('users.pemesanan.confirm-payment', $pemesanan->id_pemesanan_222305) }}" 
                      method="POST" 
                      enctype="multipart/form-data"
                      class="px-6 py-4">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Payment Proof Image
                            </label>
                            <div class="mt-1">
                                <input type="file" 
                                       name="bukti_pembayaran" 
                                       accept="image/*"
                                       required
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500">
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                                Upload a clear image of your payment proof (JPEG, PNG, max 2MB)
                            </p>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button"
                                onclick="document.getElementById('payment-modal').style.display='none'"
                                class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                            Cancel
                        </button>
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
