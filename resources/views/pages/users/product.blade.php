@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="w-full mt-20 px-32">
        <div class="bg-white p-4 rounded-lg shadow-xl gap-6 ">
            <div class="flex">
                <!-- Product Image -->
                <div class="w-1/2 flex justify-center relative h-[80vh] overflow-hidden rounded-lg shadow-md bg-green-900">
                    <img src="{{ Str::startsWith($product->path_img, 'http') ? $product->path_img : asset('storage/' . $product->path_img) }}"
                        alt="Product Image" class="object-contain max-w-full max-h-[70vh] transform hover:scale-110 transition duration-300 ease-in-out">
                </div>

                <!-- Product Details -->
                <div class="w-1/2 flex flex-col p-4 justify-between px-8 space-y-6">
                    <div class="text-start">
                        <h1 class="text-5xl font-extrabold text-gray-800">{{ $product->nama }}</h1>
                        <p class="text-lg text-gray-500 font-medium mt-2">Kategori Produk</p>
                        <div class="h-1 w-1/3 bg-gray-800 mt-4 rounded"></div>
                    </div>

                    <!-- Product Specs -->
                    <div class="space-y-6">
                        <div>
                            <p class="text-2xl font-semibold text-gray-700">Deskripsi</p>
                            <p class="text-lg text-gray-600 mt-2">{{ $product->deskripsi }}</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <label for="qty" class="text-lg font-semibold text-gray-700">Kuantitas:</label>
                            <input id="qty" type="number" value="1" min="1"
                                class="border-2 border-gray-300 p-2 text-center w-20 text-lg font-semibold rounded-lg focus:ring-2 focus:ring-gray-500 focus:outline-none" />
                        </div>
                        <div>
                            <p class="text-2xl font-semibold text-gray-700">Stok</p>
                            <p class="text-lg font-bold text-gray-900">{{ $product->jumlah }} Barang</p>
                        </div>
                    </div>

                    <!-- Price -->
                    <div>
                        <p class="text-4xl font-extrabold text-gray-900">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                        <div class="mt-4 flex justify-between items-center gap-4">
                            <!-- Checkout Button -->
                            <button id="co" onclick="showPaymentModal()"
                                class="bg-green-700 text-white py-3 px-6 rounded-lg hover:bg-green-600 transform transition hover:scale-105 shadow-lg w-full">
                                Checkout Sekarang
                            </button>

                            <!-- Add to Cart Button -->
                            <button id="add-to-cart"
                             class="flex items-center justify-center bg-green-700 text-white hover:bg-green-600 rounded-lg transform transition hover:scale-105 shadow-lg px-4 py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 48 48" id="Shopping-Cart-Add--Streamline-Plump-Remix" height="31" width="31"><desc>Shopping Cart Add Streamline Icon: https://streamlinehq.com</desc><g id="shopping-cart-add--shopping-cart-checkout-add-plus-new"><path id="Union" fill="#ffffff" fill-rule="evenodd" d="M4.92356 4.69673c-0.11378 0.10057 -0.163 0.21151 -0.16701 0.33758 -0.00424 0.13357 -0.00655 0.26655 -0.00655 0.39754 0 0.131 0.00231 0.26397 0.00655 0.39754 0.00401 0.12608 0.05323 0.23702 0.16701 0.33759 0.12389 0.1095 0.32053 0.19673 0.55981 0.19673h3.14195c0.88923 0 1.67168 0.58712 1.92028 1.4409 0.9674 3.32249 1.797 6.76879 2.6202 10.18829l0.1168 0.4852c0.8662 3.5962 1.7338 7.1625 2.7708 10.6301 0.3694 1.2354 1.3721 2.0776 2.5701 2.2076 2.094 0.2274 5.2772 0.4574 9.5862 0.4574 4.4039 0 7.5246 -0.2403 9.5068 -0.4711 1.0687 -0.1245 1.9368 -0.8389 2.2717 -1.8779 1.2942 -4.0156 2.4606 -9.3945 3.2375 -14.0854 0.172 -1.0391 -0.6387 -2.0432 -1.8161 -2.0432H15.9695c-0.9088 0 -1.7034 -0.6127 -1.9344 -1.4917L12.682 6.65508c-0.3331 -1.2673 -1.4824 -2.15506 -2.80159 -2.15507L5.48338 4.5c-0.23929 0 -0.43593 0.08723 -0.55982 0.19673Zm-4.164985 0.21044C0.843716 2.22999 3.14101 0.499993 5.48339 0.5l4.39703 0.000014C13.0124 0.500024 15.7544 2.60856 16.5506 5.63837l0.9612 3.6572h23.8978c3.5271 0 6.3574 3.10353 5.7623 6.69673 -0.7942 4.7953 -1.9993 10.3854 -3.3766 14.6589 -0.8097 2.5123 -2.9721 4.3161 -5.6161 4.624 -2.1446 0.2498 -5.4202 0.498 -9.9695 0.498 -4.4516 0 -7.779 -0.2377 -10.0179 -0.4807 -2.8843 -0.3132 -5.1658 -2.3465 -5.9707 -5.0382 -1.0725 -3.5863 -1.9635 -7.2533 -2.82729 -10.8396l-0.10934 -0.4542c-0.70691 -2.9362 -1.39932 -5.8122 -2.17046 -8.5968H5.48337C3.141 10.3637 0.843717 8.63371 0.758575 5.95654 0.753118 5.78497 0.75 5.6094 0.75 5.43185c0 -0.17754 0.003118 -0.35312 0.008575 -0.52468ZM13.375 42.5c0 -2.7614 2.2386 -5 5 -5s5 2.2386 5 5 -2.2386 5 -5 5 -5 -2.2386 -5 -5ZM33 42.5c0 -2.7614 2.2386 -5 5 -5s5 2.2386 5 5 -2.2386 5 -5 5 -5 -2.2386 -5 -5ZM28 16c1.1046 0 2 0.8954 2 2v2.5h2.5c1.1046 0 2 0.8954 2 2s-0.8954 2 -2 2H30V27c0 1.1046 -0.8954 2 -2 2s-2 -0.8954 -2 -2v-2.5h-2.5c-1.1046 0 -2 -0.8954 -2 -2s0.8954 -2 2 -2H26V18c0 -1.1046 0.8954 -2 2 -2Z" clip-rule="evenodd" stroke-width="1"></path></g>
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
            class="fixed z-50 inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center overflow-auto">
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
        const quantity  = parseInt(document.getElementById('qty').value);

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
    
</script>
@endsection
    
@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="w-full mt-20 px-32">
        <div class="bg-white p-4 rounded-lg shadow-xl gap-6 ">
            <div class="flex">
                <!-- Product Image -->
                <div class="w-1/2 flex justify-center relative h-[80vh] overflow-hidden rounded-lg shadow-md bg-green-900">
                    <img src="{{ Str::startsWith($product->path_img, 'http') ? $product->path_img : asset('storage/' . $product->path_img) }}"
                        alt="Product Image" class="object-contain max-w-full max-h-[70vh] transform hover:scale-110 transition duration-300 ease-in-out">
                </div>

                <!-- Product Details -->
                <div class="w-1/2 flex flex-col p-4 justify-between px-8 space-y-6">
                    <div class="text-start">
                        <h1 class="text-5xl font-extrabold text-gray-800">{{ $product->nama }}</h1>
                        <p class="text-lg text-gray-500 font-medium mt-2">Kategori Produk</p>
                        <div class="h-1 w-1/3 bg-gray-800 mt-4 rounded"></div>
                    </div>

                    <!-- Product Specs -->
                    <div class="space-y-6">
                        <div>
                            <p class="text-2xl font-semibold text-gray-700">Deskripsi</p>
                            <p class="text-lg text-gray-600 mt-2">{{ $product->deskripsi }}</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <label for="qty" class="text-lg font-semibold text-gray-700">Kuantitas:</label>
                            <input id="qty" type="number" value="1" min="1"
                                class="border-2 border-gray-300 p-2 text-center w-20 text-lg font-semibold rounded-lg focus:ring-2 focus:ring-gray-500 focus:outline-none" />
                        </div>
                        <div>
                            <p class="text-2xl font-semibold text-gray-700">Stok</p>
                            <p class="text-lg font-bold text-gray-900">{{ $product->jumlah }} Barang</p>
                        </div>
                    </div>

                    <!-- Price -->
                    <div>
                        <p class="text-4xl font-extrabold text-gray-900">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                        <div class="mt-4 flex justify-between items-center gap-4">
                            <!-- Checkout Button -->
                            <button id="co" onclick="showPaymentModal()"
                                class="bg-green-500 text-white py-3 px-6 rounded-lg hover:bg-green-700 transform transition hover:scale-105 shadow-lg w-full">
                                Checkout Sekarang
                            </button>

                            <!-- Add to Cart Button -->
                            <button id="add-to-cart"
                             class="flex items-center justify-center bg-green-500 text-white hover:bg-green-700 rounded-lg transform transition hover:scale-105 shadow-lg px-4 py-2">
                            <img src="{{ asset('images/carts.png') }}" alt="cart icon" class="h-12 mr-2">
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
            class="fixed z-50 inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center overflow-auto">
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
        const quantity = document.getElementById('qty').value;

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
    
</script>
@endsection
    
