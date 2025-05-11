@extends('layouts.dashboard-layout')

@section('content')
    <!-- Dashboard Header -->
    <div class="rounded-xl w-full">
        <div class="flex justify-between items-center mb-4 p-4 text-slate-950 rounded-t-xl">
            <h1 class="text-2xl font-bold">Kelola Semua Kategori</h1>
            <a href="{{ route('admin.kategori.create') }}">
                <button
                    class="btn  bg-cyan-600 text-white hover:bg-gray-200 font-semibold px-4 py-2 rounded-lg shadow-md">Tambah
                    Kategori</button>
            </a>
        </div>
        <div class="overflow-x-auto px-4 my-3 mb-9">
            @if (session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif

      <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-cyan-600">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">ID Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nama Kategori</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($kategoris as $index => $kategori)
                        <tr class="border-b"
                            style="background-color: #ffffff; border-bottom: 1px solid #d1d5db; text-gray-500;">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $kategori->id_kategori_222305 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $kategori->nama_kategori_222305 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex gap-3 justify-center">
                                    <!-- Detail Button -->
                                    <a href="{{ route('admin.kategori.show', $kategori->id_kategori_222305) }}" class="tooltip text-indigo-600 hover:text-indigo-900"
                                        data-tip="Detail">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    
                                    <!-- Edit Button -->
                                    <a href="{{ route('admin.kategori.edit', $kategori->id_kategori_222305) }}" class="tooltip text-yellow-600 hover:text-yellow-900"
                                        data-tip="Edit">
                                         <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.kategori.destroy', $kategori->id_kategori_222305) }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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
    </div>
    <script>
   
document.getElementById('searchKategori').addEventListener('input', function () {
  const query = this.value;
  console.log(query);  // Melihat query yang dimasukkan
  fetch(`/kategori/search?q=${query}`)
    .then(response => response.json())
    .then(data => {
      const resultsEl = document.getElementById('results');
      resultsEl.innerHTML = '';
      data.forEach(kat => {
        const p = document.createElement('p');
        p.textContent = kat.nama_kategori_222305;
        resultsEl.appendChild(p);
      });
    });
});


    </script>
@endsection

@section('scripts')
    <script>
        // Fungsi untuk konfirmasi hapus
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus kategori ini?');
        }

    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


@endsection