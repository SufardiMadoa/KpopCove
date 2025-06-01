@extends('layouts.dashboard-layout')


@section('content')
<div class="bg-white shadow-lg rounded-lg p-6 mx-auto ">
    <!-- Header with back button -->
    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center">
            <a href="{{ route('admin.pemesanan.index') }}" class="mr-4 text-cyan-600 hover:text-cyan-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Detail Pemesanan</h1>
        </div>
        <div>
            <a href="{{ route('admin.pemesanan.edit', $pemesanan->id_pemesanan_222305) }}" class="inline-flex items-center px-4 py-2 bg-cyan-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
                Ubah Status
            </a>
        </div>
    </div>

    <!-- Order Information -->
    <div class="bg-white rounded-lg shadow-sm mb-6 p-6 border border-gray-100">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Pemesanan</h2>
                <div class="grid grid-cols-1 gap-4">
                    <div class="flex">
                        <span class="font-medium text-gray-500 w-1/3">ID Pemesanan:</span>
                        <span class="text-gray-900">{{ $pemesanan->id_pemesanan_222305 }}</span>
                    </div>
                    <div class="flex">
                        <span class="font-medium text-gray-500 w-1/3">Tanggal:</span>
                        <span class="text-gray-900">{{ \Carbon\Carbon::parse($pemesanan->tanggal_pemesanan_222305)->format('d M Y, H:i') }}</span>
                    </div>
                    <div class="flex">
                        <span class="font-medium text-gray-500 w-1/3">Status:</span>
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
                    <div class="flex">
                        <span class="font-medium text-gray-500 w-1/3">Metode Pembayaran:</span>
                        <span class="text-gray-900 capitalize">{{ $pemesanan->metode_pembayaran_222305 }}</span>
                    </div>
                    <div class="flex">
                        <span class="font-medium text-gray-500 w-1/3">Bukti Pembayaran:</span>
                        <span>
                            @if($pemesanan->bukti_pembayaran_222305)
                                <img src="{{ asset('storage/bukti_pembayaran/' . $pemesanan->bukti_pembayaran_222305) }}" alt="Bukti Pembayaran" class="max-w-xs rounded-md shadow-sm">
                            @else
                                <span class="text-gray-500">Belum ada bukti pembayaran</span>
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Pelanggan</h2>
                <div class="grid grid-cols-1 gap-4">
                    <div class="flex">
                        <span class="font-medium text-gray-500 w-1/3">Nama:</span>
                        <span class="text-gray-900">{{ $pemesanan->user->nama_222305 }}</span>
                    </div>
                    <div class="flex">
                        <span class="font-medium text-gray-500 w-1/3">Email:</span>
                        <span class="text-gray-900">{{ $pemesanan->user->email_222305 }}</span>
                    </div>
                    <div class="flex">
                        <span class="font-medium text-gray-500 w-1/3">Telepon:</span>
                        <span class="text-gray-900">{{ $pemesanan->user->no_telepon_222305 ?? '-' }}</span>
                    </div>
                    <div class="flex">
                        <span class="font-medium text-gray-500 w-1/3">Alamat:</span>
                        <span class="text-gray-900">{{ $pemesanan->user->alamat_222305 ?? '-' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Items -->
    <div class="bg-white rounded-lg shadow-sm mb-6 p-6 border border-gray-100">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Item Pemesanan</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($pemesanan->itemPesanans as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                @if ($item->album->gambar_222305)
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-md object-cover" src="{{ asset('storage/' . $item->produk->gambar_222305) }}" alt="{{ $item->produk->nama_produk_222305 }}">
                                </div>
                                @endif
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $item->nama_222305 }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ Str::limit($item->album->deskripsi_222305, 50) }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            Rp {{ number_format($item->album->harga_222305, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $item->jumlah_222305 }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            Rp {{ number_format($item->subtotal_222305, 0, ',', '.') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-50">
                    <tr>
                        <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-right">
                            Total:
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            Rp {{ number_format($pemesanan->total_harga_222305, 0, ',', '.') }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Actions -->
    <div class="flex justify-between items-center">
        <a href="{{ route('admin.pemesanan.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
            Kembali
        </a>
        <div class="flex space-x-3">
            <form action="{{ route('admin.pemesanan.destroy', $pemesanan->id_pemesanan_222305) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pemesanan ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v10M9 7h1m-1 4h10m-5-4v10" />
                    </svg>
                    Hapus
                </button>
            </form>
            <a href="{{ route('admin.pemesanan.edit', $pemesanan->id_pemesanan_222305) }}" class="inline-flex items-center px-4 py-2 bg-cyan-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
                Ubah Status
            </a>
        </div>
    </div>
</div>
@endsection