@extends('layouts.app')

@section('title', 'Daftar Pesanan')

@section('content')
    <div class="p-6 bg-gray-50 min-h-screen ">
        <h2 class="text-3xl font-bold mb-8 text-center">Daftar Pesanan Anda</h2>

        @php
            $transaksiList = [
                [
                    'id_transaksi' => 1,
                    'created_at' => '2024-03-15',
                    'status' => 'dikirim',
                    'product' => [
                        'nama' => 'Kemeja Flanel',
                        'deskripsi' => 'Kemeja flanel katun premium dengan motif kotak-kotak.',
                        'path_img' => 'images/kemeja-flanel.jpg',
                        'harga' => 150000,
                    ],
                    'jumlah' => 2,
                    'harga_total' => 300000,
                ],
                [
                    'id_transaksi' => 2,
                    'created_at' => '2024-03-12',
                    'status' => 'diproses',
                    'product' => [
                        'nama' => 'Jaket Hoodie',
                        'deskripsi' => 'Jaket hoodie berbahan fleece, nyaman digunakan.',
                        'path_img' => 'images/jaket-hoodie.jpg',
                        'harga' => 250000,
                    ],
                    'jumlah' => 1,
                    'harga_total' => 250000,
                ],
            ];
        @endphp

        @foreach ($transaksiList as $transaksi)
            <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <p class="text-sm text-gray-500">Tanggal Pesanan:
                            <span
                                class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($transaksi['created_at'])->format('M d, Y') }}</span>
                        </p>
                        <p class="text-sm text-gray-500">Status:
                            <span
                                class="font-semibold {{ $transaksi['status'] === 'dikirim' ? 'text-yellow-500' : 'text-blue-500' }}">
                                {{ ucfirst($transaksi['status']) }}
                            </span>
                        </p>
                    </div>
                </div>

                <div class="flex items-center py-4 border-b border-gray-300 last:border-none">
                    <img src="{{ asset('storage/' . $transaksi['product']['path_img']) }}"
                        alt="{{ $transaksi['product']['nama'] }}" class="w-20 h-20 rounded-lg mr-4">
                    <div class="flex-1">
                        <h4 class="text-lg font-semibold">{{ $transaksi['product']['nama'] }}</h4>
                        <p class="text-sm text-gray-500">{{ $transaksi['product']['deskripsi'] }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-semibold">Rp {{ number_format($transaksi['product']['harga'], 0, ',', '.') }}
                        </p>
                        <p class="text-sm text-gray-500">Qty: {{ $transaksi['jumlah'] }}</p>
                    </div>
                </div>

                <div class="mt-4 flex justify-between items-center">
                    <p class="text-lg font-semibold">Total Harga: Rp
                        {{ number_format($transaksi['harga_total'], 0, ',', '.') }}</p>

                    @if ($transaksi['status'] === 'dikirim')
                        <button type="button" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600"
                            onclick="konfirmasiPesananDiterima('{{ $transaksi['id_transaksi'] }}')">
                            Pesanan Diterima
                        </button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
