<!-- Mobile Toggle Button -->
<button data-drawer-target="main-sidebar" data-drawer-toggle="main-sidebar" aria-controls="main-sidebar"
    type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-400 transition-all duration-300">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<!-- Sidebar -->
<aside id="main-sidebar" class="font-jost fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-white shadow-lg" aria-label="Sidebar">
    <nav role="navigation" aria-label="Main" class="h-full">
        <div class="h-full flex flex-col">
            <!-- Logo Section -->
            <div class="px-6 pt-8 pb-6 border-b border-gray-200">
                <div class="flex justify-center">
                    <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 font-sans">
                        KPop <span class="font-light">Cove</span>
                      </h1>
                </div>
            </div>
            
            <!-- Navigation Menu -->
            <div class="flex-1 px-3 py-4 overflow-y-auto">
                <ul class="space-y-1.5">
                    <!-- Dashboard -->
                    {{-- <li>
                        <a href="{{ route('admin.dashboard') }}" 
                           class="{{ request()->routeIs('admin.dashboard') ? 'bg-cyan-100 text-cyan-600' : 'text-gray-700 hover:bg-cyan-50 hover:text-cyan-600' }} group flex items-center px-4 py-3 rounded-lg transition-all duration-300">
                            <div class="flex-shrink-0 w-5 h-5 mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-cyan-600' : 'text-gray-500 group-hover:text-cyan-600' }} transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="14" width="7" height="7"></rect>
                                    <rect x="3" y="14" width="7" height="7"></rect>
                                </svg>
                            </div>
                            <span class="flex-1 font-medium">Dashboard</span>
                            <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-cyan-800 bg-cyan-100 rounded-full">
                                3
                            </span>
                        </a>
                    </li> --}}
                    
                    <!-- Album -->
                    <li>
                        <a href="{{ route('admin.album.index') }}" 
                           class="{{ request()->routeIs('admin.album.*') ? 'bg-cyan-100 text-cyan-600' : 'text-gray-700 hover:bg-cyan-50 hover:text-cyan-600' }} group flex items-center px-4 py-3 rounded-lg transition-all duration-300">
                            <div class="flex-shrink-0 w-5 h-5 mr-3 {{ request()->routeIs('admin.album.*') ? 'text-cyan-600' : 'text-gray-500 group-hover:text-cyan-600' }} transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                            </div>
                            <span class="flex-1 font-medium">Album</span>
                        </a>
                    </li>
                    
                    <!-- Kategori -->
                    <li>
                        <a href="{{ route('admin.kategori.index') }}" 
                           class="{{ request()->routeIs('admin.kategori.*') ? 'bg-cyan-100 text-cyan-600' : 'text-gray-700 hover:bg-cyan-50 hover:text-cyan-600' }} group flex items-center px-4 py-3 rounded-lg transition-all duration-300">
                            <div class="flex-shrink-0 w-5 h-5 mr-3 {{ request()->routeIs('admin.kategori.*') ? 'text-cyan-600' : 'text-gray-500 group-hover:text-cyan-600' }} transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 6h18"></path>
                                    <path d="M3 12h18"></path>
                                    <path d="M3 18h18"></path>
                                </svg>
                            </div>
                            <span class="flex-1 font-medium">Kategori</span>
                        </a>
                    </li>
                    
                    <!-- Transaksi -->
                    <li>
                        <a href="{{ route('admin.pemesanan.index') }}" 
                           class="{{ request()->routeIs('admin.pemesanan.*') ? 'bg-cyan-100 text-cyan-600' : 'text-gray-700 hover:bg-cyan-50 hover:text-cyan-600' }} group flex items-center px-4 py-3 rounded-lg transition-all duration-300">
                            <div class="flex-shrink-0 w-5 h-5 mr-3 {{ request()->routeIs('admin.pemesanan.*') ? 'text-cyan-600' : 'text-gray-500 group-hover:text-cyan-600' }} transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="5" width="20" height="14" rx="2"></rect>
                                    <line x1="2" y1="10" x2="22" y2="10"></line>
                                </svg>
                            </div>
                            <span class="flex-1 font-medium">Pemesanan</span>
                            <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">
                                5
                            </span>
                        </a>
                    </li>
                    
                    <!-- Laporan -->
                    {{-- <li>
                        <a href="#" 
                           class="{{ request()->routeIs('#') ? 'bg-cyan-100 text-cyan-600' : 'text-gray-700 hover:bg-cyan-50 hover:text-cyan-600' }} group flex items-center px-4 py-3 rounded-lg transition-all duration-300">
                            <div class="flex-shrink-0 w-5 h-5 mr-3 {{ request()->routeIs('admin.laporan.*') ? 'text-cyan-600' : 'text-gray-500 group-hover:text-cyan-600' }} transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                            </div>
                            <span class="flex-1 font-medium">Laporan</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
            
            <!-- User Profile Section -->
            <div class="px-4 py-4 mt-auto border-t border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full border-2 border-cyan-500 bg-cyan-100 flex items-center justify-center text-cyan-600 font-medium">
                        {{ Auth::check() ? strtoupper(substr(Auth::user()->nama_222305, 0, 2)) : 'AD' }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">
                            {{ Auth::user()->nama_222305 ?? 'Admin User' }}
                        </p>
                        <p class="text-xs text-gray-500 truncate">
                            {{ Auth::user()->email_222305 ?? 'admin@terrashop.com' }}
                        </p>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" class="inline-flex">
                        @csrf
                        <button type="submit" class="p-1 rounded-full text-gray-500 hover:bg-gray-100 hover:text-red-500 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</aside>

<!-- JS for Sidebar Toggle on Mobile (place this at the end of your body) -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.querySelector('[data-drawer-toggle="main-sidebar"]');
        const sidebar = document.getElementById('main-sidebar');
        
        if (toggleButton && sidebar) {
            toggleButton.addEventListener('click', function() {
                sidebar.classList.toggle('-translate-x-full');
            });
        }
    });
</script>