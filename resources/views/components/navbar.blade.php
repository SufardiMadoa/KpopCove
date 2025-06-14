<header
    class="flex top-0 justify-between items-center py-4 px-6 md:px-16 lg:px-24 bg-gradient-to-r from-pink-100 via-white to-purple-100 z-50 w-full fixed font-sans shadow-md">
    <!-- Logo -->
    <div class="flex items-center space-x-2">
        <div class="text-2xl font-bold tracking-wider">
            <span class="text-pink-500">KPOP</span><span class="text-purple-600">COVE</span>
            <span class="text-xs font-normal text-gray-500 ml-1">케이팝코브</span>
        </div>
    </div>

    <!-- Desktop navigation menu -->
    <nav class="hidden md:flex items-center">
        <div class="flex space-x-3">
            <a href="{{ route('userHome.home') }}" class="relative group px-4 py-2 {{ request()->routeIs('userHome.home') ? 'text-pink-500 font-medium' : 'text-gray-700' }}">
                <span class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Beranda
                </span>
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-pink-500 to-purple-500 transform {{ request()->routeIs('/') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }} transition-transform origin-left duration-300"></span>
            </a>

            <a href="{{ route('user.album') }}" class="relative group px-4 py-2 {{ request()->routeIs('user.album') ? 'text-pink-500 font-medium' : 'text-gray-700' }}">
                <span class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Album
                </span>
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-pink-500 to-purple-500 transform {{ request()->routeIs('user.album') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }} transition-transform origin-left duration-300"></span>
            </a>

            <a href="{{ route('user.category') }}" class="relative group px-4 py-2 {{ request()->routeIs('user.category') ? 'text-pink-500 font-medium' : 'text-gray-700' }}">
                <span class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    Kategori
                </span>
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-pink-500 to-purple-500 transform {{ request()->routeIs('user.category') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }} transition-transform origin-left duration-300"></span>
            </a>

            <a href="{{ route('about') }}" class="relative group px-4 py-2 {{ request()->routeIs('about') ? 'text-pink-500 font-medium' : 'text-gray-700' }}">
                <span class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Tentang Kami
                </span>
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-pink-500 to-purple-500 transform {{ request()->routeIs('about') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }} transition-transform origin-left duration-300"></span>
            </a>

            <a href="{{ route('contact') }}" class="relative group px-4 py-2 {{ request()->routeIs('contact') ? 'text-pink-500 font-medium' : 'text-gray-700' }}">
                <span class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Kontak
                </span>
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-pink-500 to-purple-500 transform {{ request()->routeIs('contact') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }} transition-transform origin-left duration-300"></span>
            </a>
        </div>
    </nav>

    <!-- Right section -->
    <div class="flex items-center space-x-3">
        

        <!-- Cart icon with badge -->
        @auth
        <a href="/keranjang" class="relative p-2 rounded-full bg-purple-50 hover:bg-purple-100 text-purple-500 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            @if(Auth::check() && Auth::user()->cart && Auth::user()->cart->items_count > 0)
                <span class="absolute -top-1 -right-1 inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-pink-500 rounded-full border-2 border-white">
                    {{ Auth::user()->cart->items_count }}
                </span>
            @endif
        </a>

        <!-- User profile menu - Show only when logged in -->
        <div x-data="{ drawerOpen: false }" x-init="drawerOpen = false">
    <button @click="drawerOpen = true"
        class="flex items-center cursor-pointer space-x-2 border border-purple-200 rounded-full pr-3 pl-1 py-1 hover:bg-purple-50 transition-colors">
        <div class="h-8 w-8 rounded-full border-2 border-white bg-gradient-to-br from-pink-200 to-purple-200 flex items-center justify-center text-pink-600 font-medium">
            {{ Auth::check() ? strtoupper(substr(Auth::user()->nama_222305, 0, 2)) : 'AD' }}
        </div>
        <span class="text-sm font-medium text-gray-700 hidden sm:inline">{{ Auth::user()->name }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-purple-400" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <!-- Drawer Overlay -->
    <div x-show="drawerOpen" 
         x-cloak
         @click="drawerOpen = false" 
         class="fixed inset-0 bg-black bg-opacity-50 z-40"
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
    </div>

    <!-- Drawer Content -->
    <div x-show="drawerOpen" 
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="translate-x-full opacity-0" 
         x-transition:enter-end="translate-x-0 opacity-100"
         x-transition:leave="transition ease-in duration-300" 
         x-transition:leave-start="translate-x-0 opacity-100"
         x-transition:leave-end="translate-x-full opacity-0"
         class="fixed inset-y-0 right-0 z-50 min-h-full w-80 sm:w-96 bg-white shadow-xl transform">

        <!-- Sidebar header -->
        <div class="p-6 bg-gradient-to-r from-pink-500 to-purple-600 text-white">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold">내 계정</h2>
                <button @click="drawerOpen = false" class="p-1 rounded-full hover:bg-white hover:bg-opacity-20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex items-center space-x-4">
                
@php
    // Cek jika pengguna sudah login untuk menghindari error
    $user = Auth::user();
@endphp

@if ($user)
    {{-- Cek jika pengguna memiliki foto profil --}}
    @if ($user->profile_photo_path_222305)
        <div class="h-16 w-16 rounded-full bg-white p-1 border-2 border-pink-200 shadow-lg">
            <img class="w-full h-full rounded-full object-cover" 
                 src="{{ asset('storage/' . $user->profile_photo_path_222305) }}" 
                 alt="{{ $user->nama_222305 }}">
        </div>
    @else
        {{-- Jika tidak ada foto profil, buat avatar dengan inisial --}}
        @php
            $name = $user->nama_222305 ?? 'User';
            $words = explode(' ', trim($name));
            $initials = '';

            if (count($words) >= 2) {
                // Ambil huruf pertama dari dua kata pertama
                $initials = strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
            } elseif (count($words) > 0 && !empty($words[0])) {
                // Ambil dua huruf pertama jika hanya satu kata
                $initials = strtoupper(substr($words[0], 0, 2));
            } else {
                // Default jika nama tidak ada
                $initials = 'U';
            }

            // Daftar warna latar belakang
            $colors = ['bg-pink-500', 'bg-cyan-500', 'bg-emerald-500', 'bg-amber-500', 'bg-violet-500', 'bg-rose-500', 'bg-indigo-500', 'bg-teal-500'];
            
            // --- FIX: Mengubah string email menjadi angka untuk operasi modulo ---
            // Menggunakan panjang string email untuk mendapatkan indeks warna yang konsisten
            $emailString = $user->email_222305 ?? '';
            $colorIndex = strlen($emailString) % count($colors);
            $bgColor = $colors[$colorIndex];
        @endphp

        <div class="h-16 w-16 rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg {{ $bgColor }}">
            <span>{{ $initials }}</span>
        </div>
    @endif
@endif

                <div>
                    <h2 class="text-xl font-bold text-pink-700">{{ Auth::user()->nama_222305 }}</h2>
                    <p class="text-pink-700 text-sm">{{ Auth::user()->email_222305 }}</p>
                </div>
            </div>
        </div>

        <!-- Navigation menu -->
        <nav class="p-4">
            <p class="text-xs font-medium text-purple-400 uppercase tracking-wider mb-4">메뉴</p>

            <a href="keranjang"
                class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-pink-50 mb-1 {{ request()->routeIs('profile.show') ? 'bg-pink-50' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="font-medium text-gray-700">Keranjang Saya</span>
            </a>

            <a href="{{ route('users.pemesanan.index') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-pink-50 mb-1 {{ request()->routeIs('users.pemesanan.*') ? 'bg-pink-50' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <span class="font-medium text-gray-700">Pesanan Saya</span>
            </a>

            <div class="border-t border-gray-200 my-4"></div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-red-50 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span class="font-medium text-red-500">Logout</span>
                </button>
            </form>
        </nav>
    </div>
</div>
        @else
        <!-- Login/Register buttons when not logged in -->
        <div class="flex items-center space-x-2">
            <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-pink-500 hover:bg-pink-50 rounded-lg transition-colors border border-pink-200">
                <span class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    Login
                </span>
            </a>
            <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium text-slate-950 bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 rounded-lg transition-colors shadow-sm">
                <span class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    Register
                </span>
            </a>
        </div>
        @endauth
    </div>

    <!-- Mobile menu button - Only visible on mobile -->
    <div class="md:hidden">
        <button x-data="{ open: false }" @click="open = !open" class="p-2 rounded-full bg-pink-50 hover:bg-pink-100 text-pink-500 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>
</header>