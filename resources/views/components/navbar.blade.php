<header
    class="flex top-0 justify-between items-center py-4 px-24 bg-white z-50 bg-gradient-to-r from-cream to-gray-100 w-full fixed font-jost">
    {{-- logo --}}
    <div class="text-2xl text-slate-700">
        <h1 class="font-semibold font-jost text-slate-950">TERRA SHOP</h1>
    </div>



    {{-- menu --}}
    <nav class="space-x-5
            text-sm font-bold ">
        <a href="/"
            class="text-gray-900 hover:text-white {{ Request::is('/') ? 'bg-slate-900 text-white' : '' }} px-4 py-2 rounded"
            style="transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#20750b';"
            onmouseout="this.style.backgroundColor='';">Beranda</a>

        <a href="/shop"
            class="text-gray-900 hover:text-white {{ Request::is('shop') ? 'bg-slate-900 text-white' : '' }} px-4 py-2 rounded"
            style="transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#20750b';"
            onmouseout="this.style.backgroundColor='';">Toko</a>

        <a href="/kategori"
            class="text-gray-900 hover:text-white {{ Request::is('kategori') ? 'bg-slate-900 text-white' : '' }} px-4 py-2 rounded"
            style="transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#20750b';"
            onmouseout="this.style.backgroundColor='';">Kategori</a>

        <a href="/about"
            class="text-gray-900 hover:text-white {{ Request::is('about') ? 'bg-slate-900 text-white' : '' }} px-4 py-2 rounded"
            style="transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#20750b';"
            onmouseout="this.style.backgroundColor='';">Tentang Kami</a>

        <a href="/contact-us"
            class="text-gray-900 hover:text-white {{ Request::is('contact-us') ? 'bg-slate-900 text-white' : '' }} px-4 py-2 rounded"
            style="transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#20750b';"
            onmouseout="this.style.backgroundColor='';">Kontak</a>

    </nav>
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open"
            class="text-gray-900 hover:text-white px-3 py-2 rounded transition duration-300 hover:bg-green-700">
            🔍
        </button>

        <!-- Search Form -->
        <div x-show="open" x-transition class="absolute top-10 right-0 bg-white shadow-md p-2 rounded-md">
            <input type="text" placeholder="Cari..."
                class="border p-2 rounded-md focus:outline-none focus:ring focus:ring-green-500">
        </div>
    </div>


    {{-- auth --}}
    @if (Auth::check())
        {{-- Jika pengguna sudah login --}}
        <div class="flex gap-2">
            <a href="{{ route('cart.view') }}" class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <div class="indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>

            </a>

            <div class="drawer drawer-end z-50">
                <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content">
                    <!-- Page content here -->
                    <label for="my-drawer-4" class="drawer-button ">

                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                            <div class="w-10 rounded-full">
                                <img alt="Tailwind CSS Navbar component"
                                    src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('images/produk.png') }}"
                                    alt="Avatar" />
                            </div>
                        </div>
                    </label>
                </div>
                <div class="drawer-side ">
                    <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
                    <ul style="overflow: hidden" class="text-base-content min-h-full w-96 overflow-hidden">
                        <!-- Sidebar content here -->
                        <div class="flex p-4 flex-col items-center bg-white w-full h-screen ">
                            <!-- Profile Section -->
                            <div class="rounded-lg w-full max-w-md p-6 text-center bg-white shadow-md">
                                <div class="flex justify-center">
                                    <img class="w-32 h-32 rounded-full border-4 border-green-600 object-cover"
                                        src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('images/produk.png') }}"
                                        alt="Avatar">
                                </div>
                                <h2 class="mt-4 text-2xl font-semibold text-gray-800">{{ session('name') }}</h2>
                                <p class="text-gray-500 text-sm">{{ session('email') }}</p>
                            </div>

                            <div
                                class="cursor-pointer w-full max-w-md h-[60vh] bg-gray-100 rounded-t-3xl shadow-lg p-6">
                                <h3 class="text-gray-700 font-semibold mb-2">Preferences</h3>
                                <a href="{{ route('user.profile') }}"
                                    class="flex items-center justify-between py-3 border-b border-gray-200">
                                    <div class="flex items-center space-x-3">
                                        <svg class="group-hover:stroke-black stroke-black"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="black" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" height="20" width="20">
                                            <path d="M12 20h9" />
                                            <path d="M16.5 3.5a2.121 2.121 0 1 1 3 3L7 19l-4 1 1-4Z" />
                                        </svg>
                                        <p class="text-gray-700">Profile Saya</p>
                                    </div>
                                </a>

                                <a href="{{ route('pesanan') }}"
                                    class="flex items-center justify-between py-3 border-b border-gray-200">
                                    <div class="flex items-center space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" height="16" width="16">
                                            <path d="M6 6h15l-1.5 9H7.5L6 6z" />
                                            <circle cx="9" cy="20" r="1" />
                                            <circle cx="18" cy="20" r="1" />
                                            <path d="M6 6l-2 0" />
                                        </svg>
                                        <p class="text-gray-700">Pesanan Saya</p>
                                    </div>
                                </a>
                                <a href="{{ route('transaksi.index') }}"
                                    class="flex items-center justify-between py-3 border-b border-gray-200">
                                    <div class="flex items-center space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.5 -0.5 16 16"
                                            fill="none" stroke="#000000" stroke-linecap="round"
                                            stroke-linejoin="round" id="History--Streamline-Tabler" height="16"
                                            width="16">
                                            <desc>History Streamline Icon: https://streamlinehq.com</desc>
                                            <path d="m7.5 5 0 2.5 1.25 1.25" stroke-width="1"></path>
                                            <path
                                                d="M1.90625 6.875a5.625 5.625 0 1 1 0.3125 2.5m-0.3125 3.125v-3.125h3.125"
                                                stroke-width="1"></path>
                                        </svg>
                                        <p class="text-gray-700">Riwayat Transaksi</p>
                                    </div>
                                </a>
                                <a href={{ route('cart.view') }}
                                    class="cursor-pointer flex items-center justify-between py-3 border-b border-gray-200">
                                    <div class="flex items-center space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.5 -0.5 16 16"
                                            fill="none" stroke="#000000" stroke-linecap="round"
                                            stroke-linejoin="round" id="Shopping-Cart--Streamline-Tabler"
                                            height="16" width="16">
                                            <desc>Shopping Cart Streamline Icon: https://streamlinehq.com</desc>
                                            <path d="M2.5 11.875a1.25 1.25 0 1 0 2.5 0 1.25 1.25 0 1 0 -2.5 0"
                                                stroke-width="1"></path>
                                            <path d="M9.375 11.875a1.25 1.25 0 1 0 2.5 0 1.25 1.25 0 1 0 -2.5 0"
                                                stroke-width="1"></path>
                                            <path d="M10.625 10.625H3.75V1.875H2.5" stroke-width="1"></path>
                                            <path d="m3.75 3.125 8.75 0.625 -0.625 4.375H3.75" stroke-width="1">
                                            </path>
                                        </svg>
                                        <p class="text-gray-700">Keranjang</p>
                                    </div>

                                </a>

                                <div class="cursor-pointer flex items-center justify-between py-3">
                                    <div class="flex items-center space-x-3 text-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.5 -0.5 16 16"
                                            fill="none" stroke="#dc2626" stroke-linecap="round"
                                            stroke-linejoin="round" id="Logout-2--Streamline-Tabler" height="16"
                                            width="16">
                                            <desc>Logout 2 Streamline Icon: https://streamlinehq.com</desc>
                                            <path
                                                d="M6.25 5V3.75a1.25 1.25 0 0 1 1.25 -1.25h4.375a1.25 1.25 0 0 1 1.25 1.25v7.5a1.25 1.25 0 0 1 -1.25 1.25h-4.375a1.25 1.25 0 0 1 -1.25 -1.25v-1.25"
                                                stroke-width="1"></path>
                                            <path d="M9.375 7.5H1.875l1.875 -1.875" stroke-width="1"></path>
                                            <path d="m3.75 9.375 -1.875 -1.875" stroke-width="1"></path>
                                        </svg>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="w-full text-left ">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </ul>
                </div>
            </div>
        </div>
    @else
        {{-- Jika pengguna belum login --}}
        <div class="space-x-2">
            <a href="/login" class="text-gray-900 hover:text-black">Log In</a>
            <a href="/signup" class="bg-slate-900 text-white py-2 px-4 rounded-lg hover:bg-green-800">Sign Up</a>
        </div>
    @endif
</header>
