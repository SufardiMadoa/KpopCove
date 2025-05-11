<!-- resources/views/livewire/search-kategori.blade.php -->

<div>
    <div class="mb-3">
        <input type="text" wire:model.debounce.300ms="search" class="form-control" placeholder="Cari kategori...">
    </div>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategoris as $kategori)
                <tr>
                    <td>{{ $kategori->id_kategori_222305 }}</td>
                    <td>{{ $kategori->nama_kategori_222305 }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('kategori.show', $kategori->id_kategori_222305) }}" class="btn btn-info btn-sm me-1">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                            <a href="{{ route('kategori.edit', $kategori->id_kategori_222305) }}" class="btn btn-warning btn-sm me-1">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('kategori.destroy', $kategori->id_kategori_222305) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">Tidak ada kategori ditemukan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="d-flex justify-content-center">
            {{ $kategoris->links() }}
        </div>
    </div>
</div>
