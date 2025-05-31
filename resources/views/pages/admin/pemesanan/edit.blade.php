@extends('layouts.dashboard-layout')
@section('content')
<div class="bg-white shadow-lg rounded-lg p-6 mx-auto max-w-3xl">
    <!-- Header with back button -->
    <div class="flex items-center mb-6">
        <a href="{{ route('admin.pemesanan.show', $pemesanan->id_pemesanan_222305) }}" class="mr-4 text-cyan-600 hover:text-cyan-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <h1 class="text-3xl font-bold text-gray-800">Ubah Status Pemesanan</h1>
    </div>

    <!-- Alert messages -->
    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    @if ($errors->any())
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
        <p class="font-medium">Oups! Ada beberapa masalah:</p>
        <ul class="mt-3 list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Order Summary Card -->
    <div class="bg-white rounded-lg shadow-sm mb-6 p-6 border border-gray-100">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Pemesanan</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-3">
                <div class="flex">
                    <span class="font-medium text-gray-500 w-1/3">ID Pemesanan:</span>
                    <span class="text-gray-900">{{ $pemesanan->id_pemesanan_222305 }}</span>
                </div>
                <div class="flex">
                    <span class="font-medium text-gray-500 w-1/3">Pelanggan:</span>
                    <span class="text-gray-900">{{ $pemesanan->user->nama_222305 }}</span>
                </div>
                <div class="flex">
                    <span class="font-medium text-gray-500 w-1/3">Tanggal:</span>
                    <span class="text-gray-900">{{ \Carbon\Carbon::parse($pemesanan->tanggal_pemesanan_222305)->format('d M Y, H:i') }}</span>
                </div>
            </div>
            <div class="space-y-3">
                <div class="flex">
                    <span class="font-medium text-gray-500 w-1/3">Total:</span>
                    <span class="text-gray-900">Rp {{ number_format($pemesanan->total_harga_222305, 0, ',', '.') }}</span>
                </div>
                <div class="flex">
                    <span class="font-medium text-gray-500 w-1/3">Metode Pembayaran:</span>
                    <span class="text-gray-900 capitalize">{{ $pemesanan->metode_pembayaran_222305 }}</span>
                </div>
                <div class="flex">
                    <span class="font-medium text-gray-500 w-1/3">Status Saat Ini:</span>
                    <span>
                        @switch($pemesanan->status_pembayaran_222305)
                            @case('pending')
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                                @break
                            @case('dibayar')
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Dibayar
                                </span>
                                @break
                            @case('selesai')
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Selesai
                                </span>
                                @break
                            @case('dibatalkan')
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Dibatalkan
                                </span>
                                @break
                            @default
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    {{ $pemesanan->status_pembayaran_222305 }}
                                </span>
                        @endswitch
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Update Form -->
    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Update Status Pemesanan</h2>
        
        <form action="{{ route('admin.pemesanan.update', $pemesanan->id_pemesanan_222305) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label for="status_pembayaran_222305" class="block text-sm font-medium text-gray-700 mb-2">Status Pembayaran</label>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="relative">
                        <input type="radio" id="status_pending" name="status_pembayaran_222305" value="pending" class="hidden peer" {{ $pemesanan->status_pembayaran_222305 == 'pending' ? 'checked' : '' }}>
                        <label for="status_pending" class="flex flex-col items-center justify-center p-4 text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer peer-checked:border-cyan-600 peer-checked:bg-cyan-50 hover:bg-gray-50">
                            <div class="w-full text-lg font-semibold text-center">Pending</div>
                            <div class="w-full text-sm text-center">Menunggu pembayaran</div>
                        </label>
                    </div>
                    
                    <div class="relative">
                        <input type="radio" id="status_dibayar" name="status_pembayaran_222305" value="dibayar" class="hidden peer" {{ $pemesanan->status_pembayaran_222305 == 'dibayar' ? 'checked' : '' }}>
                        <label for="status_dibayar" class="flex flex-col items-center justify-center p-4 text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer peer-checked:border-cyan-600 peer-checked:bg-cyan-50 hover:bg-gray-50">
                            <div class="w-full text-lg font-semibold text-center">Dibayar</div>
                            <div class="w-full text-sm text-center">Pembayaran diterima</div>
                        </label>
                    </div>
                    
                    <div class="relative">
                        <input type="radio" id="status_selesai" name="status_pembayaran_222305" value="selesai" class="hidden peer" {{ $pemesanan->status_pembayaran_222305 == 'selesai' ? 'checked' : '' }}>
                        <label for="status_selesai" class="flex flex-col items-center justify-center p-4 text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer peer-checked:border-cyan-600 peer-checked:bg-cyan-50 hover:bg-gray-50">
                            <div class="w-full text-lg font-semibold text-center">Selesai</div>
                            <div class="w-full text-sm text-center">Transaksi selesai</div>
                        </label>
                    </div>
                    
                    <div class="relative">
                        <input type="radio" id="status_dibatalkan" name="status_pembayaran_222305" value="dibatalkan" class="hidden peer" {{ $pemesanan->status_pembayaran_222305 == 'dibatalkan' ? 'checked' : '' }}>
                        <label for="status_dibatalkan" class="flex flex-col items-center justify-center p-4 text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer peer-checked:border-cyan-600 peer-checked:bg-cyan-50 hover:bg-gray-50">
                            <div class="w-full text-lg font-semibold text-center">Dibatalkan</div>
                            <div class="w-full text-sm text-center">Pesanan dibatalkan</div>
                        </label>
                    </div>
                </div>
            </div>
            
            <!-- Status update notes (optional) -->
            <div class="mb-6">
                <label for="catatan" class="block text-sm font-medium text-gray-700 mb-2">Catatan (Opsional)</label>
                <textarea id="catatan" name="catatan" rows="3" class="shadow-sm focus:ring-cyan-500 focus:border-cyan-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Tambahkan catatan tentang perubahan status (opsional)"></textarea>
            </div>

            <!-- Action buttons -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.pemesanan.show', $pemesanan->id_pemesanan_222305) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection