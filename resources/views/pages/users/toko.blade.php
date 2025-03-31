@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section class="py-10">
        <h1 class="font-semibold text-xl text-center">LIST PRODUK</h1>



        <!-- Product List -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
            <!-- Product 1 -->
            <x-shop.card_product path="produk/black-hoodie" title="Black Hoodie" price="108.00" image="images/banner.png"
                class="custom-class" />
            <x-shop.card_product path="produk/black-hoodie" title="Black Hoodie" price="108.00" image="images/banner.png"
                class="custom-class" />
            <x-shop.card_product path="produk/black-hoodie" title="Black Hoodie" price="108.00" image="images/banner.png"
                class="custom-class" />
            <x-shop.card_product path="produk/black-hoodie" title="Black Hoodie" price="108.00" image="images/banner.png"
                class="custom-class" />
        </div>
    </section>
@endsection


@section('scripts')
    <style>
        /* Animasi Fade-in untuk Kartu Produk */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.5s ease-out forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animasi Modal */
        .modal[open] {
            opacity: 1 !important;
            transform: scale(1) !important;
        }
    </style>
    <script>
        function toggleModal(modalId, show = true) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden', !show);
        }

        function isUserLoggedIn() {
            return {{ auth()->check() ? 'true' : 'false' }};
        }


        document.querySelectorAll('#add-to-cart').forEach(button => {
            button.addEventListener('click', async function() {
                if (!isUserLoggedIn()) {
                    window.location.href = "{{ route('login') }}";
                    return;
                }

                const productId = this.dataset.productId; // Ambil ID produk dari data-attribute tombol
                const qty = 1; // Set default quantity

                if (isNaN(qty) || qty < 1) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Quantity harus minimal 1.'
                    });
                    return;
                }

                try {
                    const response = await fetch(`{{ route('cart.add', ':id') }}`.replace(':id',
                        productId), {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            quantity: qty
                        })
                    });

                    if (!response.ok) {
                        throw new Error('Terjadi kesalahan saat menambahkan ke keranjang.');
                    }

                    const data = await response.json();
                    console.log('Response:', data);

                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Produk berhasil ditambahkan ke keranjang.',
                        timer: 2000,
                        showConfirmButton: false
                    });

                } catch (error) {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Gagal menambahkan ke keranjang. Silakan coba lagi.'
                    });
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('.swiper-container', {
                slidesPerView: 1, // Menampilkan satu slide per kali
                loop: true, // Slider akan kembali ke awal setelah slide terakhir
                autoplay: {
                    delay: 3000, // Interval antar slide (ms)
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination', // Elemen pagination
                    clickable: true, // Membuat pagination interaktif
                },
                speed: 600, // Kecepatan transisi slide (ms)
                effect: 'fade', // Tambahkan efek transisi jika ingin
                fadeEffect: {
                    crossFade: true, // Memperhalus efek transisi fade
                },
            });
        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const scrollToTopButton = document.getElementById("scrollToTopButton");

            window.addEventListener("scroll", () => {
                if (window.scrollY > 00) {
                    scrollToTopButton.classList.remove("hidden");
                } else {
                    scrollToTopButton.classList.add("hidden");
                }
            });

            scrollToTopButton.addEventListener("click", () => {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth",
                });
            });
        });
    </script>

    <!-- JavaScript untuk Animasi Modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('my_modal_3');
            if (modal) {
                modal.addEventListener('click', (event) => {
                    if (event.target === modal) {
                        modal.close();
                    }
                });
            }
        });

        // Tambahkan delay ke setiap kartu produk untuk animasi berurutan
        document.querySelectorAll('.fade-in').forEach((el, index) => {
            el.style.animationDelay = `${index * 0.2}s`;
        });
    </script>
@endsection
