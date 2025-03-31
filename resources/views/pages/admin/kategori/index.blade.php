@extends('layouts.dashboard-layout')

@section('content')
    <!-- Dashboard Header -->
    <div class="rounded-xl pt-20 w-full ">
        <div class="flex justify-between items-center mb-4 p-4 text-slate-950 rounded-t-xl bg-linen ">
            <h1 class="text-2xl font-bold">Kelola Semua Kategori</h1>
            <a href="{{ route('dashboard.category_products.create') }}">
                <button
                    class="btn bg-white text-slate-900 hover:bg-gray-200 font-semibold px-4 py-2 rounded-lg shadow-md">Tambah
                    Kategori</button>
            </a>
        </div>
        <div class="overflow-x-auto px-4">
            <!-- Input Pencarian -->


            <table class="table-auto w-full border-collapse rounded-xl overflow-hidden shadow-lg">
                <thead class="bg-gray-200 text-gray-800 text-lg">
                    <tr>
                        <th class="py-4 px-6 text-left">No</th>
                        <th class="py-4 px-6 text-left">Nama</th>
                        <th class="py-4 px-6 text-left">Deskripsi</th>
                        <th class="py-4 px-6 text-left">Cover</th>
                        <th class="py-4 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                        <tr class="border-b"
                            style="background-color: #ffffff; border-bottom: 1px solid #d1d5db; color: black;">
                            <th>{{ $index + 1 }}</th>
                            <td>{{ $category->nama }}</td>
                            <td>{{ Str::words($category->deskripsi, 5, '...') }}</td>
                            <td>
                                @if ($category->path_img)
                                    <img src="{{ Str::startsWith($category->path_img, 'http') ? $category->path_img : asset('storage/' . $category->path_img) }}"
                                        alt="Category Image" class="w-20 h-20 object-cover rounded-full">
                                @else
                                    <span class="text-sm text-gray-500">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex gap-3">
                                    <!-- Edit Button -->
                                    <a href="{{ route('dashboard.category_products.edit', $category->id) }}" class="tooltip"
                                        data-tip="Edit">
                                        <button class="btn btn-warning p-2 rounded-lg">
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 48 48" id="Pencil-Circle--Streamline-Plump" height="48"
                                                width="48">
                                                <desc>Pencil Circle Streamline Icon: https://streamlinehq.com</desc>
                                                <g id="pencil-circle--change-circle-edit-modify-pencil-write-writing">
                                                    <path id="Rectangle 1098" fill="#f5dd3a"
                                                        d="M44.42 14.557c1.546 -1.546 2.146 -3.798 0.937 -5.62 -0.655 -0.986 -1.574 -2.156 -2.856 -3.438 -1.282 -1.282 -2.452 -2.201 -3.438 -2.856 -1.822 -1.21 -4.074 -0.61 -5.62 0.937L16.198 20.825c-0.578 0.578 -0.974 1.312 -1.053 2.126 -0.133 1.381 -0.256 3.962 0.024 7.967a2.063 2.063 0 0 0 1.913 1.913c4.005 0.28 6.586 0.157 7.967 0.024 0.814 -0.079 1.548 -0.475 2.126 -1.053L44.42 14.557Z"
                                                        stroke-width="1"></path>
                                                    <path id="Subtract" fill="#ffffff"
                                                        d="M28.555 4.225 14.077 18.703c-0.983 0.983 -1.761 2.338 -1.918 3.96 -0.15 1.561 -0.273 4.309 0.018 8.464a5.063 5.063 0 0 0 4.695 4.696c4.156 0.29 6.904 0.169 8.465 0.018 1.622 -0.157 2.977 -0.935 3.96 -1.918l14.478 -14.479A21.53 21.53 0 0 1 44.5 25c0 11.874 -9.626 21.5 -21.5 21.5S1.5 36.874 1.5 25 11.126 3.5 23 3.5c1.921 0 3.783 0.252 5.555 0.725Z"
                                                        stroke-width="1"></path>
                                                    <path id="Intersect" fill="#ffffff"
                                                        d="M43.775 15.202c-1.083 -1.72 -2.655 -3.79 -4.92 -6.056 -2.267 -2.266 -4.337 -3.838 -6.057 -4.92l-3.649 3.647c1.517 0.84 3.67 2.308 6.17 4.808s3.967 4.653 4.807 6.17l3.649 -3.649Z"
                                                        stroke-width="1"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('dashboard.category_products.destroy', $category->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-error p-2 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white"
                                                viewBox="0 0 14 14">
                                                <path fill="#ffffff"
                                                    d="M5.76256 2.01256C6.09075 1.68437 6.53587 1.5 7 1.5c0.46413 0 0.90925 0.18437 1.23744 0.51256 0.20736 0.20737 0.35731 0.46141 0.43961 0.73744h-3.3541c0.0823 -0.27603 0.23225 -0.53007 0.43961 -0.73744ZM3.78868 2.75c0.10537 -0.67679 0.42285 -1.30773 0.91322 -1.798097C5.3114 0.34241 6.13805 0 7 0c0.86195 0 1.6886 0.34241 2.2981 0.951903 0.49037 0.490367 0.8079 1.121307 0.9132 1.798097H13c0.4142 0 0.75 0.33579 0.75 0.75 0 0.41422 -0.3358 0.75 -0.75 0.75h-1v8.25c0 0.3978 -0.158 0.7794 -0.4393 1.0607S10.8978 14 10.5 14h-7c-0.39783 0 -0.77936 -0.158 -1.06066 -0.4393C2.15804 13.2794 2 12.8978 2 12.5V4.25H1c-0.414214 0 -0.75 -0.33578 -0.75 -0.75 0 -0.41421 0.335786 -0.75 0.75 -0.75h2.78868ZM5 5.87646c0.34518 0 0.625 0.27983 0.625 0.625V10.503c0 0.3451 -0.27982 0.625 -0.625 0.625s-0.625 -0.2799 -0.625 -0.625V6.50146c0 -0.34517 0.27982 -0.625 0.625 -0.625Zm4.625 0.625c0 -0.34517 -0.27982 -0.625 -0.625 -0.625s-0.625 0.27983 -0.625 0.625V10.503c0 0.3451 0.27982 0.625 0.625 0.625s0.625 -0.2799 0.625 -0.625V6.50146Z">
                                                </path>
                                            </svg>
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
