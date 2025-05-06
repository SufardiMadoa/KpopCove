<header
    class="flex top-0 justify-between items-center py-3 px-24 bg-white z-50 w-full fixed font-sans shadow-md border-b border-slate-100">
    <!-- Logo -->
    <div class="flex items-center space-x-2">
        <div class="text-2xl font-bold">
            <span class="text-cyan-600">KPOP</span><span class="text-slate-800">COVE</span>
        </div>
    </div>

    <!-- Desktop navigation menu -->
    <nav class="hidden md:flex items-center ">
        <div class="flex space-x-1">
            <a href="/" class="relative group px-4 py-2 text-cyan-600 font-medium">
                Beranda
                <span
                    class="absolute bottom-0 left-0 w-full h-0.5 bg-cyan-600 transform scale-x-100 transition-transform"></span>
            </a>

            <a href="/album" class="relative group px-4 py-2 text-slate-700">
                Album
                <span
                    class="absolute bottom-0 left-0 w-full h-0.5 bg-cyan-600 transform scale-x-0 group-hover:scale-x-100 transition-transform"></span>
            </a>

            <a href="/album/detail" class="relative group px-4 py-2 text-slate-700">
                Kategori
                <span
                    class="absolute bottom-0 left-0 w-full h-0.5 bg-cyan-600 transform scale-x-0 group-hover:scale-x-100 transition-transform"></span>
            </a>

            <a href="#" class="relative group px-4 py-2 text-slate-700">
                Tentang Kami
                <span
                    class="absolute bottom-0 left-0 w-full h-0.5 bg-cyan-600 transform scale-x-0 group-hover:scale-x-100 transition-transform"></span>
            </a>

            <a href="#" class="relative group px-4 py-2 text-slate-700">
                Kontak
                <span
                    class="absolute bottom-0 left-0 w-full h-0.5 bg-cyan-600 transform scale-x-0 group-hover:scale-x-100 transition-transform"></span>
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
        <a href="#" class="relative p-2 rounded-full hover:bg-cyan-50 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span
                class="absolute top-0 right-0 inline-flex items-center justify-center w-4 h-4 text-xs font-bold text-white bg-cyan-600 rounded-full">3</span>
        </a>

        <!-- User profile menu -->
        <div x-data="{ drawerOpen: false }">
            <button @click="drawerOpen = true"
                class="flex items-center cursor-pointer space-x-2 border border-slate-200 rounded-full pr-3 pl-1 py-1 hover:bg-cyan-50 transition-colors">
                <div class="h-8 w-8 rounded-full overflow-hidden bg-slate-300">
                    <img alt="User Avatar" class="h-full w-full object-cover" src="https://i.pravatar.cc/300">
                </div>
                <span class="text-sm font-medium text-slate-700 hidden sm:inline">User Name</span>
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
                            <img class="w-full h-full rounded-full object-cover" src="https://i.pravatar.cc/300"
                                alt="Avatar">
                        </div>
                        <div>
                            <h2 class="text-xl font-bold">User Name</h2>
                            <p class="text-cyan-200 text-sm">user@example.com</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation menu -->
                <nav class="p-4">
                    <p class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-4">Menu</p>

                    <a href="#"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-cyan-50 mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="font-medium text-slate-700">Profile Saya</span>
                    </a>

                    <a href="#"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-cyan-50 mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <span class="font-medium text-slate-700">Pesanan Saya</span>
                    </a>

                    <div class="border-t border-slate-200 my-4"></div>

                    <button class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-red-50 w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span class="font-medium text-red-600">Logout</span>
                    </button>
                </nav>
            </div>
        </div>

        <!-- Mobile menu button -->
        <div x-data="{ mobileMenuOpen: false }">
            <button @click="mobileMenuOpen = true"
                class="md:hidden p-2 rounded-lg hover:bg-cyan-50 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Mobile menu drawer -->
            <div x-show="mobileMenuOpen" @click="mobileMenuOpen = false"
                class="fixed inset-0 bg-slate-900 bg-opacity-50 z-40"></div>

            <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
                class="fixed inset-y-0 right-0 max-w-xs w-full bg-white shadow-xl z-50 transform">

                <div class="flex justify-between items-center p-4 border-b">
                    <div class="text-xl font-bold">
                        <span class="text-cyan-600">KPOP</span><span class="text-slate-800">COVE</span>
                    </div>
                    <button @click="mobileMenuOpen = false" class="p-2 rounded-full hover:bg-cyan-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <nav class="p-4">
                    <a href="#" class="block py-3 px-4 text-cyan-600 border-b border-slate-100">Beranda</a>
                    <a href="#"
                        class="block py-3 px-4 text-slate-700 border-b border-slate-100 hover:text-cyan-600">Album</a>
                    <a href="#"
                        class="block py-3 px-4 text-slate-700 border-b border-slate-100 hover:text-cyan-600">Kategori</a>
                    <a href="#"
                        class="block py-3 px-4 text-slate-700 border-b border-slate-100 hover:text-cyan-600">Tentang
                        Kami</a>
                    <a href="#"
                        class="block py-3 px-4 text-slate-700 border-b border-slate-100 hover:text-cyan-600">Kontak</a>
                </nav>

            </div>
        </div>
    </div>
</header>