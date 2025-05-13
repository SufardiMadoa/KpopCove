<?php

namespace App\Providers;

use App\Http\Livewire\SearchKategori;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        //    Livewire::component('search-kategori', SearchKategori::class);
    }
}
