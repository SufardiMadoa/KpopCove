@extends('layouts.dashboard-layout')

@section('content')
    <!-- Dashboard Header -->
    <div class="rounded-xl pt-20 w-full ">
        <div class="flex justify-between items-center mb-4 p-4 text-slate-950 rounded-t-xl bg-[#F5F5F5] ">
            <h1 class="text-2xl font-bold">Kelola Semua Data Album</h1>
            <a href="{{ route('products.create') }}">
                <button
                    class="btn bg-white text-slate-900 hover:bg-gray-200 font-semibold px-4 py-2 rounded-lg shadow-md">Tambah
                    Album</button>
            </a>
        </div>
        <div class="overflow-x-auto px-4">
            <!-- Input Pencarian -->
            <div class="mb-4 flex gap-2">
                <input type="text" id="search" placeholder="Cari produk..."
                    class="border-2 border-gray-300 p-2 rounded-lg w-full" onkeyup="searchProducts()">
                <div class="flex items-center justify-center">
                    <svg id="Horizontal-Sliders-Lines--Streamline-Atlas" xmlns="http://www.w3.org/2000/svg"
                        viewBox="-0.5 -0.5 16 16" height="24" width="24">
                        <desc>Horizontal Sliders Lines Streamline Icon: https://streamlinehq.com</desc>
                        <defs></defs>
                        <path d="m4.50625 2.1125 10.181249999999999 -0.00625" fill="none" stroke="#000000"
                            stroke-miterlimit="10" stroke-width="1"></path>
                        <path d="m0.3125 2.1125 2.39375 0" fill="none" stroke="#000000" stroke-miterlimit="10"
                            stroke-width="1"></path>
                        <path d="m12.293750000000001 7.5 2.39375 0" fill="none" stroke="#000000" stroke-miterlimit="10"
                            stroke-width="1"></path>
                        <path d="m0.3125 7.5 10.181249999999999 0" fill="none" stroke="#000000" stroke-miterlimit="10"
                            stroke-width="1"></path>
                        <path d="m8.7 12.893749999999999 5.9875 -0.00625" fill="none" stroke="#000000"
                            stroke-miterlimit="10" stroke-width="1"></path>
                        <path d="m0.3125 12.893749999999999 6.5874999999999995 0" fill="none" stroke="#000000"
                            stroke-miterlimit="10" stroke-width="1"></path>
                        <path d="m2.70625 0.3125 0 3.59375" fill="none" stroke="#000000" stroke-miterlimit="10"
                            stroke-width="1"></path>
                        <path d="m10.493749999999999 5.699999999999999 0 3.59375" fill="none" stroke="#000000"
                            stroke-miterlimit="10" stroke-width="1"></path>
                        <path d="m6.8999999999999995 11.09375 0 3.59375" fill="none" stroke="#000000"
                            stroke-miterlimit="10" stroke-width="1"></path>
                    </svg>
                </div>
            </div>

            <table class="table-auto w-full border-collapse rounded-xl overflow-hidden shadow-lg">
                <thead class="bg-[#CDB4DB] text-white text-lg">
                    <tr>
                        <th class="py-4 px-6 text-left">No</th>
                        <th class="py-4 px-6 text-left">Judul Album</th>
                        <th class="py-4 px-6 text-left">Deskripsi</th>
                        <th class="py-4 px-6 text-left">Harga</th>
                        <th class="py-4 px-6 text-left">Stok</th>
                        <th class="py-4 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody id="product-table" class="text-gray-700">
                    @foreach ($products as $index => $product)
                        <tr class="odd:bg-gray-50 even:bg-gray-100 hover:bg-slate-200 transition">
                            <td class="py-4 px-6">{{ $index + 1 }}</td>
                            <td class="py-4 px-6 font-semibold">{{ $product->nama }}</td>
                            <td class="py-4 px-6">{{ Str::words($product->deskripsi, 5, '...') }}</td>
                            <td class="py-4 px-6">{{ number_format($product->harga, 0, ',', '.') }}</td>
                            <td class="py-4 px-6">{{ $product->jumlah }}</td>
                            <td class="py-4 px-6 text-center">
                                
<div class="flex justify-center space-x-2">
    <a href="{{ route('products.edit', $product->id) }}"
        class="btn btn-warning p-2 rounded-lg" title="Edit">
        <i class="fas fa-edit"></i>
    </a>
    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
        onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-error p-2 rounded-lg" title="Hapus">
            <i class="fas fa-trash"></i>
        </button>
    </form>
</div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Confirmation Dialog for Delete -->
    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus barang ini?');
        }

        // Fungsi untuk mencari produk
        function searchProducts() {
            const input = document.getElementById('search');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('product-table');
            const rows = table.getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let match = false;

                for (let j = 0; j < cells.length; j++) {
                    if (cells[j]) {
                        const cellValue = cells[j].textContent || cells[j].innerText;
                        if (cellValue.toLowerCase().indexOf(filter) > -1) {
                            match = true;
                            break;
                        }
                    }
                }

                rows[i].style.display = match ? '' : 'none';
            }
        }
    </script>
@endsection
