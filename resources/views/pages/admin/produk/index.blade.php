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
         



            <table id="myTable" class="w-full text-sm text-left text-gray-500">
    <thead class="text-xs text-gray-700 uppercase bg-gray-100">
        <tr>
            <th class="px-4 py-3">Nama Produk</th>
            <th class="px-4 py-3">Harga</th>
            <th class="px-4 py-3">Stok</th>
            <th class="px-4 py-3">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr class="bg-white border-b">
                <td class="px-4 py-3">{{ $product->nama }}</td>
                <td class="py-4 px-6">{{ number_format($product->harga, 0, ',', '.') }}</td>
                <td class="py-4 px-6">{{ $product->jumlah }}</td>
                <td class="py-4 px-6 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-warning p-2 rounded-lg">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-error p-2 rounded-lg">Hapus</button>
                                    </form>
                                </div>
                            </td>
            </tr>
        @endforeach
    </tbody>
</table>
    </div>
@endsection

@section('scripts')
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

        // Inisialisasi DataTables
        document.addEventListener("DOMContentLoaded", function () {
            new DataTable('#myTable', {
                searchable: true,
                fixedHeight: true,
                
            });
        });
    </script>
@endsection