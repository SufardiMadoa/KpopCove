@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="w-full mt-20 font-jost">
        <div class="bg-white p-4 rounded-lg shadow-xl gap-6 ">
            <div class="flex">
                <!-- Product Image -->
                <div class="w-1/2 flex justify-center relative h-[80vh] overflow-hidden border-2 shadow-md ">
                    <img src="{{ Str::startsWith($product->path_img, 'http') ? $product->path_img : asset('storage/' . $product->path_img) }}"
                        alt="Product Image"
                        class="object-cover h-full transform hover:scale-110 transition duration-300 ease-in-out">
                </div>

                <!-- Product Details -->
                <div class="w-1/2 flex flex-col p-4 justify-between px-8 space-y-6">
                    <div class="text-start">
                        <h1 class="text-5xl font-extrabold text-gray-800">{{ $product->nama }}</h1>
                        <p class="text-lg text-gray-500 font-medium mt-2">{{ $product->category->nama }}</p>
                        <div class="h-1 w-1/3 bg-gray-800 mt-4 rounded"></div>
                    </div>

                    <!-- Product Specs -->
                    <div class="space-y-6">
                        <div>
                            <p class="text-2xl font-semibold text-gray-700">Deskripsi</p>
                            <p class="text-lg text-gray-600 mt-2">{{ $product->deskripsi }}</p>
                        </div>
                        <div class="flex gap-4 justify-between">
                            <div class="flex items-center  border-gray-300 overflow-hidden w-max">
                                <button type="button" id="decrement"
                                    class="px-4 py-2 text-gray-700 text-lg font-bold bg-gray-200 hover:bg-gray-300 border-2 ">-</button>
                                <input id="qty" value="1" min="1"
                                    class="w-12 text-center text-lg font-semibold border-0 focus:ring-0 focus:outline-none ">
                                <button type="button" id="increment"
                                    class="px-3 py-2 border-2 text-gray-700 text-lg font-bold bg-gray-200 hover:bg-gray-300 border">+</button>
                            </div>

                            <div>
                                <div class="flex space-x-2">
                                    <button type="button" class="size-btn p-3 bg-black text-white border"
                                        data-size="S">S</button>
                                    <button type="button" class="size-btn p-3 bg-white text-gray-700 border"
                                        data-size="M">M</button>
                                    <button type="button" class="size-btn p-3 bg-white text-gray-700 border"
                                        data-size="L">L</button>
                                    <button type="button" class="size-btn p-3 bg-white text-gray-700 border"
                                        data-size="L">XL</button>
                                </div>
                            </div>
                        </div>

                        <div>
                            <p class="text-2xl font-semibold text-gray-700">Stok</p>
                            <p class="text-lg font-bold text-gray-900">{{ $product->jumlah }} Barang</p>
                        </div>
                    </div>

                    <!-- Price -->
                    <div>
                        <p class="text-4xl font-extrabold text-gray-900">Rp
                            {{ number_format($product->harga, 0, ',', '.') }}</p>
                        <div class="mt-4 flex justify-between items-center gap-4">
                            <!-- Checkout Button -->
                            <button id="co" onclick="showPaymentModal()"
                                class="  py-3 px-6  hover:bg-linen transform transition hover:scale-105 shadow-lg w-full text-slate-950 border-2 border-slate-950">
                                Checkout Sekarang →
                            </button>

                            <!-- Add to Cart Button -->
                            <button id="add-to-cart"
                                class="flex items-center justify-center  text-white border-2 hover:bg-linen  border-slate-950 transform transition hover:scale-105 shadow-lg px-4 py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#000000"
                                    id="Shopping-Cart-Thin--Streamline-Phosphor-Thin" height="31" width="31">
                                    <desc>Shopping Cart Thin Streamline Icon: https://streamlinehq.com</desc>
                                    <path
                                        d="M15.7688625 3.28358125c-0.057225 -0.06870625 -0.14199375 -0.1084625 -0.23140625 -0.10854375H3.12604375L2.6225375 0.40723125c-0.02618125 -0.143075 -0.15078125 -0.2470625 -0.29623125 -0.24723125H0.46225625c-0.23209375 0 -0.37715625 0.25125625 -0.26110625 0.45225625 0.05385625 0.0932875 0.15339375 0.15075 0.26110625 0.15075h1.61229375l0.50426875 2.7738375 1.46304375 8.04865c0.06745 0.367825 0.26920625 0.69745625 0.566075 0.9248625 -1.170525 0.75443125 -1.0854 2.4930875 0.15321875 3.12956875 1.23861875 0.6364875 2.701775 -0.30655625 2.63368125 -1.697475 -0.0203125 -0.41484375 -0.18275 -0.8100625 -0.46004375 -1.11928125h4.54215625c-0.9283875 1.03796875 -0.38499375 2.69171875 0.9781125 2.9767375 1.36310625 0.285025 2.52359375 -1.01244375 2.08888125 -2.3354375 -0.244125 -0.74294375 -0.938 -1.24491875 -1.720025 -1.2443125H5.5252625c-0.436875 -0.0002125 -0.8111625 -0.31264375 -0.8894375 -0.74245l-0.3015 -1.66958125h9.10014375c0.72858125 0.0001125 1.35298125 -0.52085625 1.48339375 -1.237675L15.8344375 3.5308125c0.0159125 -0.08805625 -0.0081125 -0.1786375 -0.065575 -0.24723125ZM6.79384375 14.02918125c0 0.92839375 -1.0050125 1.5086375 -1.809025 1.0444375 -0.8040125 -0.46419375 -0.8040125 -1.62468125 0 -2.088875 0.18331875 -0.10584375 0.391325 -0.16156875 0.60300625 -0.16158125 0.6660875 -0.000025 1.20601875 0.53993125 1.20601875 1.20601875Zm7.23609375 0c0 0.92839375 -1.0050125 1.5086375 -1.809025 1.0444375 -0.8040125 -0.46419375 -0.8040125 -1.62468125 0 -2.088875 0.18335625 -0.1058625 0.3912875 -0.1615875 0.60300625 -0.16158125 0.66604375 0.00003125 1.20601875 0.539975 1.20601875 1.20601875Zm0.29471875 -5.56651875c-0.078325 0.4300875 -0.45303125 0.74260625 -0.8901875 0.74245625H4.2220125L3.23534375 3.77805h11.9410625Z"
                                        stroke-width="0.0625"></path>
                                </svg>
                            </button>



                        </div>
                        <dialog id="my_modal_3" class="modal">
                            <div class="modal-box">
                                <form method="dialog">
                                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                </form>
                                <h3 class="text-lg font-bold">Keranjang Info</h3>
                                <p class="py-4">Produk Berhasil Ditambahkan</p>
                            </div>
                        </dialog>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Modal -->
        <div id="payment-modal"
            class="fixed z-50 inset-0  bg-opacity-50 hidden flex items-center justify-center overflow-auto">
            <div class="bg-white rounded-lg shadow-xl w-1/3 p-6 relative">
                <button onclick="closePaymentModal()"
                    class="absolute top-4 right-4 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-full w-8 h-8 flex items-center justify-center font-bold">&times;</button>
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Pembayaran QRIS</h2>
                <p class="text-gray-700 mb-4">Silakan scan kode QR di bawah ini untuk menyelesaikan pembayaran:</p>
                <div class="bg-gray-100 p-4 rounded-lg text-gray-800 mb-6">
                    <strong>QRIS Pembayaran:</strong>
                    <div class="flex justify-center">
                        <img src="{{ asset('images/frame.png') }}" alt="QRIS" class="w-48 h-48">
                    </div>
                    <p class="mt-2">Pastikan untuk memasukkan jumlah yang sesuai dengan total yang tertera.</p>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Barang yang Dibeli:</h3>
                <ul class="list-disc list-inside text-gray-700 mb-4">
                    <li>{{ $product->nama }}</li>
                </ul>
                <div class="flex justify-between text-lg font-bold text-gray-900 mb-6">
                    <span>Total:</span>
                    <span>Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                </div>
                <form id="upload-receipt-form" enctype="multipart/form-data" class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Unggah Bukti Pembayaran:</label>
                    <input type="file" name="receipt" id="receipt"
                        class="border-2 border-gray-300 p-2 w-full rounded-lg focus:ring-2 focus:ring-gray-500 focus:outline-none"
                        accept="image/*" required onchange="previewReceipt()">
                </form>
                <div id="receipt-preview" class="hidden mb-6">
                    <h3 class="font-semibold text-gray-700 mb-2">Pratinjau Bukti Pembayaran:</h3>
                    <img id="receipt-image" src="" alt="Bukti Pembayaran" class="w-full rounded-lg shadow-lg">
                </div>
                <div class="flex justify-end space-x-4">
                    <button onclick="closePaymentModal()"
                        class="bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600">Tutup</button>
                    <button onclick="submitPaymentProof()"
                        class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">Kirim</button>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script>
        // Toggle Modal
        function toggleModal(modalId, show = true) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden', !show);
        }

        function showPaymentModal() {
            if (!isUserLoggedIn()) {
                // Jika pengguna belum login, arahkan ke halaman login
                window.location.href = "{{ route('login') }}";
                return; // Hentikan eksekusi fungsi
            }
            document.getElementById('payment-modal').classList.remove('hidden');
        }

        function closePaymentModal() {
            document.getElementById('payment-modal').classList.add('hidden');
        }


        function isUserLoggedIn() {
            return {{ auth()->check() ? 'true' : 'false' }};
        }

        // Add to Cart
        document.getElementById('add-to-cart').addEventListener('click', function() {
            if (!isUserLoggedIn()) {
                window.location.href = "{{ route('login') }}";
                return;
            }

            const qty = parseInt(document.getElementById('qty').value);
            const productId = {{ $product->id }};

            if (isNaN(qty) || qty < 1) {
                alert('Quantity harus minimal 1.');
                return;
            }
            console.log(qty)

            fetch(`{{ route('cart.add', ':id') }}`.replace(':id', productId), {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        quantity: qty
                    })
                })
                .then(response => response.json())
                .then(() => document.getElementById('my_modal_3').showModal())
                .catch(console.error);
        });


        // Receipt Preview
        function previewReceipt() {
            const receiptInput = document.getElementById('receipt');
            const receiptPreview = document.getElementById('receipt-preview');
            const receiptImage = document.getElementById('receipt-image');

            if (receiptInput.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    receiptImage.src = e.target.result;
                    receiptPreview.classList.remove('hidden');
                };
                reader.readAsDataURL(receiptInput.files[0]);
            } else {
                receiptPreview.classList.add('hidden');
            }
        }

        // Submit Payment Proof
        async function submitPaymentProof() {
            if (!isUserLoggedIn()) {
                // Jika pengguna belum login, arahkan ke halaman login
                window.location.href = "{{ route('login') }}";
                return; // Hentikan eksekusi fungsi
            }

            const formData = new FormData(document.getElementById('upload-receipt-form'));
            const productId = {{ $product->id }};
            const quantity = parseInt(document.getElementById('qty').value);

            formData.append('product_id', productId);
            formData.append('quantity', quantity);

            try {
                const response = await fetch(`{{ route('checkout.single', ':productId') }}`.replace(':productId',
                    productId), {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData,
                });

                if (response.ok) {
                    alert('Payment proof submitted successfully!');
                    toggleModal('payment-modal', false);
                    window.location.reload();
                } else {
                    const errorData = await response.json();
                    alert(`Failed to submit payment proof: ${errorData.message}`);
                    window.location.reload();
                }
            } catch (error) {
                console.error(error);
                alert('Error submitting payment proof.');
            }
        }

        document.getElementById('increment').addEventListener('click', function() {
            let qty = document.getElementById('qty');
            qty.value = parseInt(qty.value) + 1;
        });

        document.getElementById('decrement').addEventListener('click', function() {
            let qty = document.getElementById('qty');
            if (qty.value > 1) {
                qty.value = parseInt(qty.value) - 1;
            }
        });

        const sizeButtons = document.querySelectorAll('.size-btn');

        sizeButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Reset semua tombol ke keadaan awal
                sizeButtons.forEach(btn => {
                    btn.classList.remove('bg-black', 'text-white');
                    btn.classList.add('bg-white', 'text-gray-700', 'border-gray-500');
                });

                // Tambahkan kelas untuk tombol yang diklik
                button.classList.remove('bg-white', 'text-gray-700', 'border-gray-500');
                button.classList.add('bg-black', 'text-white');
            });
        });
    </script>
@endsection
