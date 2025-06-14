@extends('layouts.app')

@section('title', 'K-pop Album Details')

@section('content')
    <div x-data="productPage()" class="py-20 bg-gray-50 font-jost">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="md:flex">
                    <!-- Product Images -->
                    <div class="md:w-1/2">
                        <div class="relative">
                            <img :src="product.image" :alt="product.name" class="w-full h-[500px] object-cover">
                            <span
                                class="absolute top-4 left-4 bg-cyan-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                Limited Edition
                            </span>
                        </div>

                        
                    </div>

                    <!-- Product Details -->
                    <div class="md:w-1/2 p-8">
                        <div class="flex items-center space-x-2 mb-2">
                            @foreach ($album->kategoris as $kategori)
                                <span
                                    class="bg-cyan-100 text-cyan-800 text-xs px-2 py-1 rounded-full">{{ $kategori->nama_kategori ?? '-' }}</span>
                            @endforeach

                            <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded-full">Limited
                                Edition</span>
                        </div>

                        <h1 class="text-3xl font-bold text-slate-900 mb-2" x-text="product.name"></h1>

                        <div class="flex items-center mb-4">
                            <div class="flex text-cyan-500">
                                <template x-for="i in 5">
                                    <span x-html="i <= product.rating ? '★' : '☆'"></span>
                                </template>
                            </div>
                        </div>

                        <p class="text-3xl font-bold text-cyan-700 mb-4" x-text="formatRupiah(product.price)"></p>

                        <div class="border-t border-b border-gray-200 py-4 mb-6">
                            <p class="text-slate-600" x-text="product.description"></p>
                        </div>

                        <div class="mb-6">
                            <div class="flex flex-wrap mb-4">
                                <span class="mr-3 text-slate-700 font-medium">Album Includes:</span>
                                <div class="flex flex-wrap gap-2">
                                    <span class="px-2 py-1 bg-gray-100 text-gray-800 text-sm rounded">Photobook</span>
                                    <span class="px-2 py-1 bg-gray-100 text-gray-800 text-sm rounded">Photocard Set</span>
                                    <span class="px-2 py-1 bg-gray-100 text-gray-800 text-sm rounded">Poster</span>
                                    <span class="px-2 py-1 bg-gray-100 text-gray-800 text-sm rounded">Sticker Sheet</span>
                                </div>
                            </div>

                            <div class="flex items-center mb-4">
                                <span class="mr-3 text-slate-700 font-medium">Quantity:</span>
                                <div class="flex items-center border border-gray-300 rounded">
                                    <button @click="decrementQuantity" class="px-3 py-1 text-cyan-700 hover:bg-gray-100">
                                        -
                                    </button>
                                    <span class="px-4 py-1 border-l border-r border-gray-300" x-text="quantity"></span>
                                    <button @click="incrementQuantity" class="px-3 py-1 text-cyan-700 hover:bg-gray-100">
                                        +
                                    </button>
                                </div>
                                <span class="ml-4 text-slate-600">Available: <span x-text="product.stock"></span> pcs</span>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('users.pemesanan.store') }}"
                            class="flex flex-wrap md:flex-nowrap gap-4">
                            @csrf
                            <input type="hidden" name="album_id" value="{{ $album->id_222305 }}">
                            <input type="hidden" name="quantity" x-model="quantity">
                            <button type="button" @click="addToCart"
                                class="w-full md:w-1/2 bg-white border-2 border-cyan-700 text-cyan-700 hover:bg-cyan-50 py-3 rounded-md font-medium transition duration-300">
                                Add to Cart
                            </button>
                            <button type="button" @click="openCheckoutModal"
                                class="w-full md:w-1/2 bg-cyan-700 hover:bg-cyan-800 text-white py-3 rounded-md font-medium transition duration-300">
                                Buy Now
                            </button>
                        </form>

                        <div class="mt-6 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            <span class="ml-2 text-slate-600">Secure Payment Guaranteed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Checkout Modal -->
        <div x-show="isCheckoutModalOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
            style="display: none;">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 overflow-auto max-h-[90vh]">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold">Checkout</h2>
                    <button @click="closeCheckoutModal" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form method="POST" action="{{ route('users.pemesanan.store') }}" enctype="multipart/form-data"
                    @submit.prevent="submitOrder">
                    @csrf
                    <input type="hidden" name="album_id" :value="product.id">
                    <input type="hidden" name="quantity" :value="quantity">

                    <!-- Step 1: Customer Information -->
                    <div x-show="checkoutStep === 1">
                        <h3 class="text-lg font-semibold mb-4">Customer Information</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="name" x-model="customerInfo.name"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500"
                                    required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Phone</label>
                                <input type="tel" name="phone" x-model="customerInfo.phone"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500"
                                    required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" x-model="customerInfo.email"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500"
                                    required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Shipping Address</label>
                                <textarea name="address" x-model="customerInfo.address" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500" required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Payment Method -->
                    <div x-show="checkoutStep === 2">
                        <h3 class="text-lg font-semibold mb-4">Payment Method</h3>
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between mt-2 text-lg font-bold">
                                    <span>Total:</span>
                                    <span x-text="formatRupiah(product.price * quantity)"></span>
                                </div>
                                <label class="block text-sm font-medium text-gray-700 p-2">Select Payment Method</label>
                                <select name="metode_pembayaran_222305" x-model="paymentMethod"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 focus:border-cyan-500 focus:ring-cyan-500"
                                    required>
                                    <option  value="">Choose a payment method</option>
                                    <option  value="qris">QRIS</option>
                                    <option  value="transfer">Bank Transfer</option>
                                    <option  value="cod">Cash on Delivery</option>
                                    <option  value="e-wallet">E-Wallet (DANA)</option>
                                </select>
                            </div>

                            <!-- Payment Method Details -->
                            <div x-show="paymentMethod === 'qris'" class="mt-4 p-4 bg-gray-50 rounded-lg">
                                <h4 class="font-medium text-gray-900 mb-2">QRIS Payment</h4>
                                <img src="{{ asset('images/qris.png') }}" alt="QRIS Code"
                                    class="w-48 mx-auto mb-2">
                                <p class="text-sm text-gray-600 text-center">Scan QR code to pay</p>
                            </div>

                            <div x-show="paymentMethod === 'transfer'" class="mt-4 p-4 bg-gray-50 rounded-lg">
                                <h4 class="font-medium text-gray-900 mb-2">Bank Transfer (BRI)</h4>
                                <p class="text-gray-600">Account Number: <span
                                        class="font-medium">1234-5678-9012-3456</span></p>
                                <p class="text-gray-600">Account Name: <span class="font-medium">KPOP COVE</span></p>
                                <p class="text-sm text-gray-500 mt-2">Please transfer the exact amount and upload the proof
                                    of payment below</p>
                            </div>

                            <div x-show="paymentMethod === 'e-wallet'" class="mt-4 p-4 bg-gray-50 rounded-lg">
                                <h4 class="font-medium text-gray-900 mb-2">DANA E-Wallet</h4>
                                <p class="text-gray-600">DANA Number: <span class="font-medium">0812-3456-7890</span></p>
                                <p class="text-gray-600">Account Name: <span class="font-medium">KPOP COVE</span></p>
                                <p class="text-sm text-gray-500 mt-2">Please transfer the exact amount and upload the proof
                                    of payment below</p>
                            </div>

                            <div x-show="paymentMethod === 'cod'" class="mt-4 p-4 bg-gray-50 rounded-lg">
                                <h4 class="font-medium text-gray-900 mb-2">Cash on Delivery</h4>
                                <p class="text-gray-600">Pay when you receive your order</p>
                                <p class="text-sm text-gray-500 mt-2">Note: COD is only available for selected areas</p>
                            </div>

                            <!-- Payment Proof Upload -->
                            <div x-show="paymentMethod && paymentMethod !== 'cod'" class="mt-4">
                                <label class="block text-sm font-medium text-gray-700">Payment Proof</label>
                                <input type="file" name="bukti_pembayaran" @change="handleFileUpload"
                                    accept="image/*" class="mt-1 block w-full" :required="paymentMethod !== 'cod'">
                                <p class="mt-1 text-sm text-gray-500">Upload your payment proof (JPEG, PNG, max 2MB)</p>

                                <!-- Image Preview -->
                                <div x-show="imagePreview" class="mt-3">
                                    <img :src="imagePreview" alt="Payment Proof Preview"
                                        class="max-w-xs rounded-lg shadow-sm">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Order Summary -->
                    <div x-show="checkoutStep === 3">
                        <h3 class="text-lg font-semibold mb-4">Order Summary</h3>
                        <div class="space-y-4">
                            <div class="border-t border-b border-gray-200 py-4">
                                <div class="flex justify-between">
                                    <span class="font-medium">Product:</span>
                                    <span x-text="product.name"></span>
                                </div>
                                <div class="flex justify-between mt-2">
                                    <span class="font-medium">Quantity:</span>
                                    <span x-text="quantity"></span>
                                </div>
                                <div class="flex justify-between mt-2">
                                    <span class="font-medium">Price per item:</span>
                                    <span x-text="formatRupiah(product.price)"></span>
                                </div>
                                <div class="flex justify-between mt-2 text-lg font-bold">
                                    <span>Total:</span>
                                    <span x-text="formatRupiah(product.price * quantity)"></span>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <p><strong>Shipping to:</strong></p>
                                <p x-text="customerInfo.name"></p>
                                <p x-text="customerInfo.phone"></p>
                                <p x-text="customerInfo.email"></p>
                                <p x-text="customerInfo.address"></p>
                            </div>
                            <div>
                                <p><strong class="p-2">Payment Method:</strong> <span x-text="paymentMethod"></span></p>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="mt-6 flex justify-between">
                        <button type="button" @click="checkoutStep > 1 ? checkoutStep-- : closeCheckoutModal()"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                            <span x-text="checkoutStep === 1 ? 'Cancel' : 'Back'"></span>
                        </button>

                        <button type="button" x-show="checkoutStep < 3" @click="goToStep(checkoutStep + 1)"
                            class="px-4 py-2 bg-cyan-600 text-white rounded-md hover:bg-cyan-700">
                            Next
                        </button>

                        <button type="submit" x-show="checkoutStep === 3"
                            class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                            Place Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

      <script>
        function productPage() {
            return {
                    product: {
                        id: '{{ $album->id_album_222305 }}',
                        name: '{{ $album->judul_222305 }}',
                        price: {{ $album->harga_222305 }},
                        rating: 5,
                        stock: {{ $album->stok_222305 }},
                        description: '{{ $album->deskripsi_222305 }}',
                        image: '{{ asset('storage/' . $album->path_img_222305) }}',
                        thumbnails: [
                            '{{ asset('storage/' . $album->path_img_222305) }}',
                            'https://img.freepik.com/free-psd/korean-restaurant-flyer-template-design_23-2151934251.jpg?t=st=1746536479~exp=1746540079~hmac=22db791c92e523673ee624ff0b11c848c1e54c19f50267c6270d3ded24f8f59d&w=900'
                        ]
                    },
                quantity: 1,
                activeTab: 'description',
                isCheckoutModalOpen: false,
                checkoutStep: 1,
                paymentMethod: '',
                paymentProof: '',
                imagePreview: '',
                showCartNotification: false,
                customerInfo: {
                    name: '',
                    phone: '',
                    email: '',
                    address: ''
                },

                getCsrfToken() {
                    const tokenElement = document.querySelector('meta[name="csrf-token"]');
                    if (!tokenElement) {
                        console.error('CSRF token not found: Please add <meta name="csrf-token" content="{{ csrf_token() }}"> to your layout file.');
                        Swal.fire({
                            title: "Configuration Error",
                            text: "CSRF token is missing. The form cannot be submitted.",
                            icon: "error"
                        });
                        return null;
                    }
                    return tokenElement.getAttribute('content');
                },
                

                // Handle thumbnail image selection
                setMainImage(img) {
                    this.product.image = img;
                },

                // Quantity manipulation functions
                incrementQuantity() {
                    if (this.quantity < this.product.stock) {
                        this.quantity++;
                    }
                },

                decrementQuantity() {
                    if (this.quantity > 1) {
                        this.quantity--;
                    }
                },

                async addToCart() {
                    const csrfToken = this.getCsrfToken();
                    if (!csrfToken) return; // Stop execution if token is not found

                    try {
                        const response = await fetch('/keranjang', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify({
                                id_album_222305: this.product.id,
                                jumlah_222305: this.quantity
                            })
                        });
                        const result = await response.json();
                        if (!response.ok) throw new Error(result.message || 'Failed to add item.');
                        
                        Swal.fire({ title: "Success!", text: result.message, icon: "success", timer: 2000, showConfirmButton: false });
                    } catch (error) {
                        Swal.fire({ title: "Error!", text: error.message, icon: "error" });
                    }
                },

                // Checkout modal functions
                openCheckoutModal() {
                    this.isCheckoutModalOpen = true;
                    this.checkoutStep = 1;
                    document.body.style.overflow = 'hidden'; // Prevent background scrolling
                },

                closeCheckoutModal() {
                    this.isCheckoutModalOpen = false;
                    document.body.style.overflow = ''; // Restore scrolling
                },

                // Navigate between checkout steps
                goToStep(step) {
                    if (step === 2) {
                        // Validate customer information before proceeding
                        if (!this.customerInfo.name || !this.customerInfo.phone ||
                            !this.customerInfo.email || !this.customerInfo.address) {
                            alert('Please complete all shipping information');
                            return;
                        }
                    }

                    if (step === 3) {
                        // Validate payment method
                        if (!this.paymentMethod) {
                            alert('Please select a payment method');
                            return;
                        }

                        // Only require payment proof for transfer and e-wallet
                        if ((this.paymentMethod === 'transfer' || this.paymentMethod === 'e-wallet') && !this
                            .paymentProof) {
                            alert('Please upload payment proof');
                            return;
                        }
                    }

                    this.checkoutStep = step;
                },

                // Handle file upload for payment proof
                handleFileUpload(event) {
                    const file = event.target.files[0];
                    if (file) {
                        if (!file.type.match('image.*')) {
                            alert('Please select an image file (JPEG or PNG)');
                            event.target.value = '';
                            return;
                        }

                        this.paymentProof = file.name;

                        // Create image preview
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.imagePreview = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    } else {
                        this.imagePreview = '';
                    }
                },

                // Complete checkout process
                async submitOrder(e) {
                    try {
                        e.preventDefault();
                        const form = e.target;
                        const formData = new FormData(form);

                        // Add additional data
                        formData.append('total_harga_222305', {{ $album->harga_222305 }} * this.quantity);

                        const response = await fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'Accept': 'application/json'
                            }
                        });

                        const result = await response.json();

                        if (response.ok) {
                           Swal.fire({
  title: "Pembayaran anda berhasil",
  icon: "success",
  draggable: true,
  
});
                            this.closeCheckoutModal();
                            if (result.redirect) {
                                window.location.href = result.redirect;
                            }
                        } else {
                            if (result.errors) {
                                const errorMessages = Object.values(result.errors).flat().join('\n');
                                throw new Error(errorMessages);
                            }
                            throw new Error(result.message || 'Failed to place order');
                        }
                    } catch (error) {
                        alert('Error: ' + error.message);
                        console.error('Order submission error:', error);
                    }
                },

                // Reset form data
                resetForm() {
                    this.quantity = 1;
                    this.paymentMethod = '';
                    this.paymentProof = '';
                    this.imagePreview = '';
                    this.customerInfo = {
                        name: '',
                        phone: '',
                        email: '',
                        address: ''
                    };
                },

                // Helper function to format currency as Rupiah
                formatRupiah(amount) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    }).format(amount);
                }
            };
        }
    </script>
@endsection
  

