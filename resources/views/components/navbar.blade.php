<header
    class="flex top-0 justify-between items-center py-3 px-24 bg-white z-50 w-full fixed font-sans shadow-md border-b border-slate-100">
    <!-- Logo -->
    <div class="flex items-center space-x-2">
        <div class="text-2xl font-bold">
            <span class="text-cyan-600">KPOP</span><span class="text-slate-800">COVE</span>
        </div>
    </div>

    <!-- Desktop navigation menu -->
    <nav class="hidden md:flex items-center">
        <div class="flex space-x-1">
            <a href="/" class="relative group px-4 py-2 {{ request()->routeIs('home') ? 'text-cyan-600 font-medium' : 'text-slate-700' }}">
                Beranda
                <span
                    class="absolute bottom-0 left-0 w-full h-0.5 bg-cyan-600 transform {{ request()->routeIs('/') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }} transition-transform"></span>
            </a>

            <a href="{{ route('user.album') }}" class="relative group px-4 py-2 {{ request()->routeIs('user.album') ? 'text-cyan-600 font-medium' : 'text-slate-700' }}">
                Album
                <span
                    class="absolute bottom-0 left-0 w-full h-0.5 bg-cyan-600 transform {{ request()->routeIs('user.album') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }} transition-transform"></span>
            </a>

            <a href="#" class="relative group px-4 py-2 {{ request()->routeIs('category.index') ? 'text-cyan-600 font-medium' : 'text-slate-700' }}">
                Kategori
                <span
                    class="absolute bottom-0 left-0 w-full h-0.5 bg-cyan-600 transform {{ request()->routeIs('category.index') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }} transition-transform"></span>
            </a>

            <a href="#" class="relative group px-4 py-2 {{ request()->routeIs('about') ? 'text-cyan-600 font-medium' : 'text-slate-700' }}">
                Tentang Kami
                <span
                    class="absolute bottom-0 left-0 w-full h-0.5 bg-cyan-600 transform {{ request()->routeIs('about') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }} transition-transform"></span>
            </a>

            <a href="#" class="relative group px-4 py-2 {{ request()->routeIs('contact') ? 'text-cyan-600 font-medium' : 'text-slate-700' }}">
                Kontak
                <span
                    class="absolute bottom-0 left-0 w-full h-0.5 bg-cyan-600 transform {{ request()->routeIs('contact') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }} transition-transform"></span>
            </a>
        </div>
    </nav>

    <!-- Right section -->
    <div class="flex items-center space-x-4">
        <!-- Search button with dropdown -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="p-2 rounded-full hover:bg-cyan-50 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-slate-600">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </button>

            <!-- Search Form -->
            <div x-show="open" x-transition class="absolute top-12 right-0 bg-white shadow-lg rounded-lg p-4 w-72">
                <div class="flex items-center bg-slate-100 rounded-lg px-3 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="text" placeholder="Cari produk Kpop..."
                        class="bg-transparent border-none w-full focus:outline-none text-sm text-slate-700">
                </div>
                <div class="mt-2 text-xs text-slate-500">
                    <p>Pencarian populer: Album, Lightstick, Photocard</p>
                </div>
            </div>
        </div>

        <!-- Cart icon with badge -->
      

        <!-- User profile menu - Show only when logged in -->
        @auth
          <a href="#" class="relative p-2 rounded-full hover:bg-cyan-50 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            @if(Auth::check() && Auth::user()->cart && Auth::user()->cart->items_count > 0)
                <span class="absolute top-0 right-0 inline-flex items-center justify-center w-4 h-4 text-xs font-bold text-white bg-cyan-600 rounded-full">
                    {{ Auth::user()->cart->items_count }}
                </span>
            @endif
        </a>
        <div x-data="{ drawerOpen: false }">
            <button @click="drawerOpen = true"
                class="flex items-center cursor-pointer space-x-2 border border-slate-200 rounded-full pr-3 pl-1 py-1 hover:bg-cyan-50 transition-colors">
                <div class="h-8 w-8 rounded-full overflow-hidden bg-slate-300">
                    @if(Auth::user()->profile_photo_path)
                        <img alt="{{ Auth::user()->name }}" class="h-full w-full object-cover" src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}">
                    @else
                        <img alt="{{ Auth::user()->name }}" class="h-full w-full object-cover" src="{{ asset('images/default-avatar.jpg') }}">
                    @endif
                </div>
                <span class="text-sm font-medium text-slate-700 hidden sm:inline">{{ Auth::user()->name }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Drawer Overlay -->
            <div x-show="drawerOpen" @click="drawerOpen = false" class="fixed inset-0 bg-black bg-opacity-50 z-40">
            </div>

            <!-- Drawer Content -->
            <div x-show="drawerOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
                class="fixed inset-y-0 right-0 z-50 min-h-full w-80 sm:w-96 bg-white shadow-xl transform">

                <!-- Sidebar header -->
                <div class="p-6 bg-cyan-600 text-white">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-bold">Account</h2>
                        <button @click="drawerOpen = false" class="p-1 rounded-full hover:bg-cyan-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="h-16 w-16 rounded-full bg-white p-1">
                            @if(Auth::user()->profile_photo_path)
                                <img class="w-full h-full rounded-full object-cover" src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="{{ Auth::user()->name }}">
                            @else
                                <img class="w-full h-full rounded-full object-cover" src="{{ asset('images/default-avatar.jpg') }}" alt="{{ Auth::user()->name }}">
                            @endif
                        </div>
                        <div>
                            <h2 class="text-xl font-bold">{{ Auth::user()->name }}</h2>
                            <p class="text-cyan-200 text-sm">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation menu -->
                <nav class="p-4">
                    <p class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-4">Menu</p>

                    <a href="#"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-cyan-50 mb-1 {{ request()->routeIs('profile.show') ? 'bg-cyan-50' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="font-medium text-slate-700">Profile Saya</span>
                    </a>

                    <a href="{{ route('orders.index') }}"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-cyan-50 mb-1 {{ request()->routeIs('orders.index') ? 'bg-cyan-50' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <span class="font-medium text-slate-700">Pesanan Saya</span>
                    </a>

                    <div class="border-t border-slate-200 my-4"></div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-red-50 w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span class="font-medium text-red-600">Logout</span>
                        </button>
                    </form>
                </nav>
            </div>
        </div>
        @else
        <!-- Login/Register buttons when not logged in -->
        <div class="flex items-center space-x-2">
            <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-cyan-600 hover:bg-cyan-50 rounded-lg transition-colors">Login</a>
            <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 rounded-lg transition-colors">Register</a>
        </div>
        @endauth

       
    </div>
</header>