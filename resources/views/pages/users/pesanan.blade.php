@extends('layouts.app')
@section('content')
    <div class="p-6 bg-gray-50 min-h-screen ">
        <h2 class="text-3xl font-bold mb-8 text-center">Daftar Pesanan Anda</h2>
        <!-- Looping untuk menampilkan transaksi -->
        @foreach ($transaksiList as $transaksi)
            <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <p class="text-sm text-gray-500">Tanggal Pesanan:
                            <span
                                class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($transaksi->created_at)->format('M d, Y') }}</span>
                        </p>
                        <p class="text-sm text-gray-500">Status:
                            <span
                                class="font-semibold {{ $transaksi->status === 'dikirim' ? 'text-yellow-500' : 'text-blue-500' }}">
                                {{ ucfirst($transaksi->status) }}
                            </span>
                        </p>
                    </div>
                </div>

                <!-- Bagian Produk -->
                <div class="flex items-center py-4 border-b border-gray-300 last:border-none">
                    <img src="{{ asset('storage/' . $transaksi->product->path_img) }}" alt="{{ $transaksi->product->nama }}"
                        class="w-20 h-20 object-cover rounded-lg mr-4">
                    <div class="flex-1">
                        <h4 class="text-lg font-semibold">{{ $transaksi->product->nama }}</h4>
                        <p class="text-sm text-gray-500 pr-20">{{ $transaksi->product->deskripsi }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-semibold">Rp {{ number_format($transaksi->product->harga, 2) }}</p>
                        <p class="text-sm text-gray-500">Qty: {{ $transaksi->jumlah }}</p>
                    </div>
                </div>

                <!-- Total Harga -->
                <div class="mt-4 flex justify-between items-center">
                    <p class="text-lg font-semibold">Total Harga: Rp {{ number_format($transaksi->harga_total, 2) }}</p>

                    <!-- Tombol Pesanan Diterima -->
                    @if ($transaksi->status === 'dikirim')
                        <button type="button" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600"
                            onclick="konfirmasiPesananDiterima('{{ $transaksi->id_transaksi }}')">
                            Pesanan Diterima
                        </button>
                    @endif

                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('scripts')
    <script>
        console.log("Konfirmasi Pesanan Diterima dipanggil");

        function konfirmasiPesananDiterima(transaksiId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak dapat membatalkan tindakan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Pesanan Diterima!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirimkan form secara programatis
                    let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `{{ url('pesanan') }}/${transaksiId}`;
                    form.innerHTML = `
                    @csrf
                    @extends('layouts.app')
                `;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }

        // Tampilkan pesan sukses jika ada
        @if (session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
@endsection
