<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
    type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="default-sidebar" class="font-jost fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
<nav role="navigation" aria-label="Main">
    <div class="h-full px-3 py-4 overflow-y-auto"
    >


    <div class="text-center mb-4">
  <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 font-sans">
    KPop <span class="font-light">Cove</span>
  </h1>
</div>
        <ul class="space-y-2 font-medium mt-6 px-5">
            <x-dashboard.menulink path="/dashboard" title="Dashboard"><svg xmlns="http://www.w3.org/2000/svg"
                    class="group-hover:stroke-[var(--color-[#A2D2FF])] stroke-black" viewBox="-0.5 -0.5 16 16" fill="none"
                    stroke-linecap="round" stroke-linejoin="round" id="Layout-Grid-Remove--Streamline-Tabler"
                    height="20" width="20">
                    <desc>Layout Grid Remove Streamline Icon: https://streamlinehq.com</desc>
                    <path
                        d="M2.5 3.125a0.625 0.625 0 0 1 0.625 -0.625h2.5a0.625 0.625 0 0 1 0.625 0.625v2.5a0.625 0.625 0 0 1 -0.625 0.625H3.125a0.625 0.625 0 0 1 -0.625 -0.625V3.125z"
                        stroke-width="1"></path>
                    <path
                        d="M8.75 3.125a0.625 0.625 0 0 1 0.625 -0.625h2.5a0.625 0.625 0 0 1 0.625 0.625v2.5a0.625 0.625 0 0 1 -0.625 0.625h-2.5a0.625 0.625 0 0 1 -0.625 -0.625V3.125z"
                        stroke-width="1"></path>
                    <path
                        d="M2.5 9.375a0.625 0.625 0 0 1 0.625 -0.625h2.5a0.625 0.625 0 0 1 0.625 0.625v2.5a0.625 0.625 0 0 1 -0.625 0.625H3.125a0.625 0.625 0 0 1 -0.625 -0.625v-2.5z"
                        stroke-width="1"></path>
                    <path d="M8.75 10.625h3.75" stroke-width="1"></path>
                </svg></x-dashboard.menulink>
            <x-dashboard.menulink path="{{ route('admin.profile') }}" title="Profile">
            <svg class="group-hover:stroke-[var(--color-[#A2D2FF])]  stroke-black" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" height="20" width="20">
                <path d="M12 20h9" />
                <path d="M16.5 3.5a2.121 2.121 0 1 1 3 3L7 19l-4 1 1-4Z" />
            </svg>
            </x-dashboard.menulink>
            <x-dashboard.menulink path="{{ route('dashboard.products') }}" title="Produk">
                <svg class="group-hover:stroke-[var(--color-[#A2D2FF])]  stroke-black" xmlns="http://www.w3.org/2000/svg"
                    viewBox="-0.5 -0.5 16 16" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    id="List-Details--Streamline-Tabler" height="20" width="20">
                    <desc>List Details Streamline Icon: https://streamlinehq.com</desc>
                    <path d="M8.125 3.125h5" stroke-width="1"></path>
                    <path d="M8.125 5.625h3.125" stroke-width="1"></path>
                    <path d="M8.125 9.375h5" stroke-width="1"></path>
                    <path d="M8.125 11.875h3.125" stroke-width="1"></path>
                    <path
                        d="M1.875 3.125a0.625 0.625 0 0 1 0.625 -0.625h2.5a0.625 0.625 0 0 1 0.625 0.625v2.5a0.625 0.625 0 0 1 -0.625 0.625H2.5a0.625 0.625 0 0 1 -0.625 -0.625z"
                        stroke-width="1"></path>
                    <path
                        d="M1.875 9.375a0.625 0.625 0 0 1 0.625 -0.625h2.5a0.625 0.625 0 0 1 0.625 0.625v2.5a0.625 0.625 0 0 1 -0.625 0.625H2.5a0.625 0.625 0 0 1 -0.625 -0.625z"
                        stroke-width="1"></path>
                </svg>
            </x-dashboard.menulink>
            <x-dashboard.menulink path="{{ route('dashboard.kategori.index') }}" title="Kategori"><svg
                    class="group-hover:stroke-[var(--color-[#A2D2FF])]  stroke-black" xmlns="http://www.w3.org/2000/svg"
                    viewBox="-0.5 -0.5 16 16" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    id="Table-Column--Streamline-Tabler" height="20" width="20">
                    <desc>Table Column Streamline Icon: https://streamlinehq.com</desc>
                    <path
                        d="M1.875 3.125a1.25 1.25 0 0 1 1.25 -1.25h8.75a1.25 1.25 0 0 1 1.25 1.25v8.75a1.25 1.25 0 0 1 -1.25 1.25H3.125a1.25 1.25 0 0 1 -1.25 -1.25V3.125z"
                        stroke-width="1"></path>
                    <path d="M6.25 6.25h6.875" stroke-width="1"></path>
                    <path d="M6.25 1.875v11.25" stroke-width="1"></path>
                    <path d="M5.625 1.875 1.875 5.625" stroke-width="1"></path>
                    <path d="m6.25 4.375 -4.375 4.375" stroke-width="1"></path>
                    <path d="m6.25 7.5 -4.375 4.375" stroke-width="1"></path>
                    <path d="m6.25 10.625 -2.5 2.5" stroke-width="1"></path>
                </svg></x-dashboard.menulink>



            <x-dashboard.menulink path="{{ route('transaksi.showAll') }}" title="Transaksi">
                <svg class="group-hover:stroke-[var(--color-[#A2D2FF])]  stroke-black" xmlns="http://www.w3.org/2000/svg"
                    viewBox="-0.5 -0.5 16 16" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    id="Devices-Dollar--Streamline-Tabler" height="20" width="20">
                    <desc>Devices Dollar Streamline Icon: https://streamlinehq.com</desc>
                    <path
                        d="M8.125 11.875V5.625a0.625 0.625 0 0 1 0.625 -0.625h3.75a0.625 0.625 0 0 1 0.625 0.625v0.9375"
                        stroke-width="1"></path>
                    <path
                        d="M11.25 5V3.125a0.625 0.625 0 0 0 -0.625 -0.625H2.5a0.625 0.625 0 0 0 -0.625 0.625v7.5a0.625 0.625 0 0 0 0.625 0.625h5.625"
                        stroke-width="1"></path>
                    <path d="M10 5.625h1.25" stroke-width="1"></path>
                    <path d="M13.125 9.375h-1.5625a0.9375 0.9375 0 0 0 0 1.875h0.625a0.9375 0.9375 0 0 1 0 1.875H10.625"
                        stroke-width="1"></path>
                    <path d="M11.875 13.125v0.625m0 -5v0.625" stroke-width="1"></path>
                </svg>
            </x-dashboard.menulink>
            <x-dashboard.menulink path="{{ route('transaksi.showAllLaporan') }}" title="Laporan"><svg
                    class="group-hover:stroke-[var(--color-[#A2D2FF])]  stroke-black" xmlns="http://www.w3.org/2000/svg"
                    viewBox="-0.5 -0.5 16 16" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    id="Table-Column--Streamline-Tabler" height="20" width="20">
                    <desc>Table Column Streamline Icon: https://streamlinehq.com</desc>
                    <path
                        d="M1.875 3.125a1.25 1.25 0 0 1 1.25 -1.25h8.75a1.25 1.25 0 0 1 1.25 1.25v8.75a1.25 1.25 0 0 1 -1.25 1.25H3.125a1.25 1.25 0 0 1 -1.25 -1.25V3.125z"
                        stroke-width="1"></path>
                    <path d="M6.25 6.25h6.875" stroke-width="1"></path>
                    <path d="M6.25 1.875v11.25" stroke-width="1"></path>
                    <path d="M5.625 1.875 1.875 5.625" stroke-width="1"></path>
                    <path d="m6.25 4.375 -4.375 4.375" stroke-width="1"></path>
                    <path d="m6.25 7.5 -4.375 4.375" stroke-width="1"></path>
                    <path d="m6.25 10.625 -2.5 2.5" stroke-width="1"></path>
                </svg>
            </x-dashboard.menulink>
            
           





        </ul>

    </div>
    </nav>
</aside>
