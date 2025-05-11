<?php
// app/Http/Livewire/SearchKategori.php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kategori;

class SearchKategori extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap'; // jika pakai Bootstrap

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $kategoris = Kategori::where('nama_kategori_222305', 'like', '%' . $this->search . '%')
            ->orderBy('id_kategori_222305', 'desc')
            ->paginate(10);

        return view('livewire.search-kategori', [
            'kategoris' => $kategoris,
        ]);
    }
}
