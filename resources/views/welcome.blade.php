@extends('layouts.app')

@section('title', 'Home | Kpop Cove')

@section('content')

    <section class="">
        <div class="h-[500px] w-full overflow-hidden bg-slate-50 flex items-center font-jost">
            <div class="flex gap-2 items-center justify-between w-full h-full">
                <div class="translate-x-20">
                    <h1 class="text-6xl font-semibold text-slate-800">NEW RELEASES 2025</h1>
                    <P class="mt-2 text-slate-600">Discover the latest K-pop albums from your favorite artists. Limited editions, exclusive photobooks, and special gifts with purchase!</P>
                    <button class="border mt-10 border-cyan-500 bg-cyan-500 text-white hover:bg-cyan-600 transition px-6 py-2">SHOP NOW</button>
                </div>
                <img src="https://img.freepik.com/free-vector/retro-advertising-sale-banner-design-template_23-2149639577.jpg?t=st=1746535587~exp=1746539187~hmac=7dad6bb2d0b73a0f52c48ce49c345b6a2a6f98baf0e3ac7a9e9e2f85c6de6eb1&w=1800" alt="New K-pop Albums Banner"
                    class="w-[130%] h-full object-cover object-[30%_0%]">
            </div>
        </div>
        <div class="flex gap-4 py-4">
            <div class="w-1/2 h-40 bg-slate-100 flex items-center justify-center">
                <div class="text-center">
                    <h3 class="text-xl font-bold text-slate-800">GIRL GROUPS</h3>
                    <p class="text-slate-600 mt-1">BLACKPINK, TWICE, NewJeans, aespa & more</p>
                    <button class="mt-2 text-cyan-500 hover:underline">Explore →</button>
                </div>
            </div>
            <div class="w-1/2 h-40 bg-slate-100 flex items-center justify-center">
                <div class="text-center">
                    <h3 class="text-xl font-bold text-slate-800">BOY GROUPS</h3>
                    <p class="text-slate-600 mt-1">BTS, Stray Kids, SEVENTEEN, EXO & more</p>
                    <button class="mt-2 text-cyan-500 hover:underline">Explore →</button>
                </div>
            </div>
        </div>
    </section>
    <section class="py-10">
        <h1 class="font-semibold text-xl text-center text-slate-800">ALBUM FAVORIT</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-4">
            <!-- Product 1 -->
            <x-shop.card_product path="/album/detail" title="Stray Kids - ROCK-STAR " price="Rp 200.000" image="https://img.freepik.com/free-psd/music-band-template-design_23-2151659152.jpg?t=st=1746536437~exp=1746540037~hmac=bbd8bf9a0fc03ff625780d62f04a03c52dd6f1a01fe19c8d8391ae4eefb701e7&w=900"
                class="custom-class" />
            <x-shop.card_product path="/album/detail" title="aespa - Drama" price="Rp 150.000" image="https://img.freepik.com/free-psd/korean-restaurant-flyer-template-design_23-2151934251.jpg?t=st=1746536479~exp=1746540079~hmac=22db791c92e523673ee624ff0b11c848c1e54c19f50267c6270d3ded24f8f59d&w=900"
                class="custom-class" />
            <x-shop.card_product path="/album/detail" title="BTS - Proof" price="Rp 100.000" image="https://img.freepik.com/free-psd/korean-restaurant-flyer-template-design_23-2151934251.jpg?t=st=1746536479~exp=1746540079~hmac=22db791c92e523673ee624ff0b11c848c1e54c19f50267c6270d3ded24f8f59d&w=900"
                class="custom-class" />
            <x-shop.card_product path="/album/detail" title="IVE - I'VE CHOICE" price="Rp 123.000" image="https://img.freepik.com/free-psd/gradient-sweet-16-poster-template_23-2149541065.jpg?t=st=1746536520~exp=1746540120~hmac=33866e536365b7abfa5bd98791057fb958a9ce21d4c5c9ca55a35a833d2c1830&w=900"
                class="custom-class" />
            </div>
    </section>

    <section>
        <!-- Featured Product Section -->
        <div class="mx-auto py-10">
            <div class="relative w-full bg-slate-100 h-96 flex items-center justify-between">
                <img src="{{ asset('images/albums/newjeans-feature.png') }}" alt="NewJeans Album Feature"
                    class="w-[70%] h-full object-cover object-[30%_0%] -translate-x-10">
                <div class="pr-10">
                    <h1 class="text-3xl font-bold text-slate-800">FEATURED ALBUM</h1>
                    <h2 class="text-xl font-semibold text-cyan-500 mt-2">NewJeans - Get Up</h2>
                    <p class="text-slate-600 mt-2">Limited restock of the hit EP with exclusive photocard sets and posters. Includes fan-favorite tracks "Super Shy" and "ETA".</p>
                    <a href="#" class="mt-4 inline-block bg-cyan-500 hover:bg-cyan-600 transition text-white px-4 py-2">SHOP NOW →</a>
                </div>
            </div>

        </div>
    </section>

    <section>
        <div class="mx-auto py-10">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-slate-800">CATEGORIES</h2>
                <a href="#" class="text-cyan-500 hover:underline">VIEW ALL →</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Category 1 -->
                <div class="relative group bg-slate-100">
                    <img src="{{ asset('images/categories/albums.png') }}" alt="Albums" class="w-full h-auto object-cover">
                    <div class="absolute mx-6 bottom-4 left-0 right-0 bg-white text-center py-2">
                        <span class="font-semibold text-slate-800">ALBUMS</span>
                    </div>
                </div>

                <!-- Category 2 -->
                <div class="relative group bg-slate-100">
                    <img src="{{ asset('images/categories/lightsticks.png') }}" alt="Lightsticks" class="w-full h-auto object-cover">
                    <div class="absolute mx-6 bottom-4 left-0 right-0 bg-white text-center py-2">
                        <span class="font-semibold text-slate-800">LIGHTSTICKS</span>
                    </div>
                </div>

                <!-- Category 3 -->
                <div class="relative group bg-slate-100">
                    <img src="{{ asset('images/categories/photocards.png') }}" alt="Photocards" class="w-full h-auto object-cover">
                    <div class="absolute mx-6 bottom-4 left-0 right-0 bg-white text-center py-2">
                        <span class="font-semibold text-slate-800">PHOTOCARDS</span>
                    </div>
                </div>

                <!-- Category 4 -->
                <div class="relative group bg-slate-100">
                    <img src="{{ asset('images/categories/merch.png') }}" alt="Merchandise" class="w-full h-auto object-cover">
                    <div class="absolute mx-6 bottom-4 left-0 right-0 bg-white text-center py-2">
                        <span class="font-semibold text-slate-800">MERCHANDISE</span>
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
                    const response = await fetch(`#`.replace(':id',
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
                        text: 'Album berhasil ditambahkan ke keranjang.',
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
                if (window.scrollY > 300) {
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