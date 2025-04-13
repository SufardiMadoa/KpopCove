@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <section class="">
        <div class=" h-[500px] w-full overflow-hidden bg-linen flex items-center font-jost   ">
            <div class="flex gap-2 items-center justify-between w-full h-full ">
                <div class="translate-x-20">
                    <h1 class="text-6xl font-semibold">SUMMER 2025 ARRIVALS </h1>
                    <P class="mt-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto optio reiciendis
                        labore laborum laudantium nihil eum explicabo enim saepe iusto.</P>
                    <button class="border mt-10 border-slate-950 px-4 py-1">SHOP NOW</button>
                </div>
                <img src="{{ asset('images/banner.png') }}" alt=""
                    class="w-[130%] h-full object-cover object-[30%_0%]  ">
            </div>
        </div>
        <div class=" flex gap-4 py-4">
            <div class="w-1/2 h-40 bg-linen"></div>
            <div class="w-1/2 h-40 bg-linen"></div>
        </div>
    </section>
    <section class=" py-10">
        <h1 class="font-semibold text-xl text-center">NEW ARRIVALS</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-4">
            <!-- Product 1 -->
            <x-shop.card_product path="produk/black-hoodie" title="Black Hoodie" price="108.00" image="images/banner.png"
                class="custom-class" />
            <x-shop.card_product path="produk/black-hoodie" title="Black Hoodie" price="108.00" image="images/banner.png"
                class="custom-class" />
            <x-shop.card_product path="produk/black-hoodie" title="Black Hoodie" price="108.00" image="images/banner.png"
                class="custom-class" />
            <x-shop.card_product path="produk/black-hoodie" title="Black Hoodie" price="108.00" image="images/banner.png"
                class="custom-class" />



    </section>

    <section>


        <!-- Product Section -->
        <div class=" mx-auto py-10 ">
            <div class="relative w-full bg-linen h-96  flex items-center justify-between">
                <img src="{{ asset('images/banner.png') }}" alt=""
                    class="w-[70%] h-full object-cover object-[30%_0%]  -translate-x-10">
                <div class="pr-10">
                    <h1 class="text-3xl font-bold">ACTIVE WEAR</h1>
                    <p class="text-gray-700 mt-2">New collection now available online and in stores. Comes in a variety of
                        colors, fabrics, and styles.</p>
                    <a href="#" class="mt-4 inline-block bg-black text-white px-4 py-2">SHOP NOW →</a>
                </div>
            </div>

        </div>
    </section>

    <section>
        <div class=" mx-auto py-10 ">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold">CATEGORIES</h2>
                <a href="#" class="text-gray-500 hover:underline">VIEW ALL →</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Category 1 -->
                <div class="relative group bg-linen">
                    <img src="{{ asset('images/banner.png') }}" alt="Tops" class="w-full h-auto object-cover">
                    <div class="absolute mx-6 bottom-4 left-0 right-0 bg-white text-center py-2">
                        <span class="font-semibold text-gray-800">TOPS</span>
                    </div>
                </div>

                <!-- Category 2 -->
                <div class="relative group bg-linen">
                    <img src="{{ asset('images/banner.png') }}" alt="Shoes" class="w-full h-auto object-cover">
                    <div class="absolute mx-6 bottom-4 left-0 right-0 bg-white text-center py-2">
                        <span class="font-semibold text-gray-800">SHOES</span>
                    </div>
                </div>

                <!-- Category 3 -->
                <div class="relative group bg-linen">
                    <img src="{{ asset('images/banner.png') }}" alt="Accessories" class="w-full h-auto object-cover">
                    <div class="absolute mx-6 bottom-4 left-0 right-0 bg-white text-center py-2">
                        <span class="font-semibold text-gray-800">ACCESSORIES</span>
                    </div>
                </div>

                <!-- Category 4 -->
                <div class="relative group bg-linen">
                    <img src="{{ asset('images/banner.png') }}" alt="Sweatshirts" class="w-full h-auto object-cover">
                    <div class="absolute mx-6 bottom-4 left-0 right-0 bg-white text-center py-2">
                        <span class="font-semibold text-gray-800">SWEATSHIRTS</span>
                    </div>
                </div>
            </div>
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
