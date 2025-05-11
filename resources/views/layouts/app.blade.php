<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Pakaian - @yield('title', 'Laravel')</title>
    @vite('resources/css/app.css')
    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />

    <!-- Tailwind + Flowbite + DataTables -->
    <link href="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/2.3.0/css/dataTables.tailwindcss.css" rel="stylesheet" />

    <!-- Custom Styles -->
    <style>
        /* Custom warna terang untuk select page length */
        select[data-dt-length] {
            background-color: #ffffff !important;
            color: #111827 !important;
            border: 1px solid #e5e7eb !important;
            padding: 0.5rem;
            border-radius: 0.375rem;
        }

        /* Custom warna terang untuk input search */
        [data-dt-search] input[type="search"] {
            background-color: #ffffff !important;
            color: #111827 !important;
            border: 1px solid #e5e7eb !important;
            padding: 0.5rem;
            border-radius: 0.375rem;
        }

        [data-dt-search] input[type="search"]::placeholder {
            color: #6b7280 !important;
        }

        /* Icon pencarian */
        .fa-search {
            color: #374151 !important;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-jost">

    <!-- Navbar -->
    @include('components.navbar')

    <!-- Main Content -->
    <main class="relative px-24 mt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Script includes -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.tailwindcss.js"></script>
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>

    <!-- DataTables Setup -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const table = new DataTable('#myTable', {
                layout: {
                    topStart: 'pageLength',
                    topEnd: 'search',
                    bottomStart: 'info',
                    bottomEnd: 'paging'
                },
                language: {
                    search: "", // Kosongkan label
                    lengthMenu: "Tampilkan _MENU_ entri",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    paginate: {
                        previous: "Sebelumnya",
                        next: "Berikutnya"
                    }
                }
            });

            // Ganti label search dengan ikon Font Awesome
            setTimeout(() => {
                const searchLabel = document.querySelector('label[for^="dt-search"]');
                const searchInput = document.querySelector('[data-dt-search] input[type="search"]');
                if (searchLabel && searchInput) {
                    searchLabel.innerHTML = `
                        <i class="fas fa-search text-gray-700 bg-gray-100 p-2 rounded border mr-2"></i>
                    `;
                    searchLabel.appendChild(searchInput);
                }
            }, 100);
        });
    </script>

    @yield('scripts')
    @livewireScripts
</body>
</html>
