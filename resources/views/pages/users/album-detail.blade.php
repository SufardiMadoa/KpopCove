@extends('layouts.app')

@section('title', 'K-pop Album Details')

@section('content')
    <div x-data="productPage()" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="md:flex">
                    <!-- Product Images -->
                    <div class="md:w-1/2">
                        <div class="relative">
                            <img :src="product.image" :alt="product.name" class="w-full h-96 object-cover">
                            <span
                                class="absolute top-4 left-4 bg-cyan-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                Limited Edition
                            </span>
                        </div>

                        <!-- Thumbnail Images -->
                        <div class="grid grid-cols-4 gap-2 p-4">
                            <template x-for="(img, index) in product.thumbnails" :key="index">
                                <div @click="setMainImage(img)" class="cursor-pointer border-2 rounded overflow-hidden"
                                    :class="{
                                        'border-cyan-600': product.image === img,
                                        'border-gray-200': product.image !==
                                            img
                                    }">
                                    <img :src="img" class="w-full h-20 object-cover">
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="md:w-1/2 p-8">
                        <div class="flex items-center space-x-2 mb-2">
                             @foreach ($album->kategoris as $kategori)
            <span class="bg-cyan-100 text-cyan-800 text-xs px-2 py-1 rounded-full">{{ $kategori->nama_kategori ?? '-' }}</span>
        @endforeach
    
                            <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded-full">Limited Edition</span>
                        </div>

                        <h1 class="text-3xl font-bold text-slate-900 mb-2" x-text="product.name"></h1>

                        <div class="flex items-center mb-4">
                            <div class="flex text-cyan-500">
                                <template x-for="i in 5">
                                    <span x-html="i <= product.rating ? '★' : '☆'"></span>
                                </template>
                            </div>
                            <span class="ml-2 text-gray-600">(120 Reviews)</span>
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

                        <div class="flex flex-wrap md:flex-nowrap gap-4">
                            <button @click="addToCart"
                                class="w-full md:w-1/2 bg-white border-2 border-cyan-700 text-cyan-700 hover:bg-cyan-50 py-3 rounded-md font-medium transition duration-300">
                                Add to Cart
                            </button>
                            <button @click="openCheckoutModal"
                                class="w-full md:w-1/2 bg-cyan-700 hover:bg-cyan-800 text-white py-3 rounded-md font-medium transition duration-300">
                                Buy Now
                            </button>
                        </div>

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
        <div x-show="isCheckoutModalOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 mt-14 z-50 flex items-center justify-center bg-slate-900 bg-opacity-75"
            @click.self="closeCheckoutModal">

            <div x-show="isCheckoutModalOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform translate-y-4"
                class="bg-white rounded-lg shadow-xl max-w-md w-full max-h-screen overflow-y-auto" @click.stop>

                <div class="flex justify-between items-center border-b border-gray-200 px-6 py-4">
                    <h3 class="text-xl font-bold text-slate-900">Express Checkout</h3>
                    <button @click="closeCheckoutModal" class="text-gray-400 hover:text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="p-6">
                    <!-- Step indicator -->
                    <div class="flex mb-6">
                        <div class="flex-1 text-center">
                            <div :class="{
                                'bg-cyan-700 text-white': checkoutStep >= 1,
                                'bg-gray-200 text-gray-600': checkoutStep < 1
                            }"
                                class="h-8 w-8 rounded-full flex items-center justify-center mx-auto">1</div>
                            <div class="mt-1 text-xs"
                                :class="{ 'text-cyan-700 font-medium': checkoutStep >= 1, 'text-gray-500': checkoutStep < 1 }">
                                Details</div>
                        </div>
                        <div class="flex-1 text-center">
                            <div :class="{
                                'bg-cyan-700 text-white': checkoutStep >= 2,
                                'bg-gray-200 text-gray-600': checkoutStep < 2
                            }"
                                class="h-8 w-8 rounded-full flex items-center justify-center mx-auto">2</div>
                            <div class="mt-1 text-xs"
                                :class="{ 'text-cyan-700 font-medium': checkoutStep >= 2, 'text-gray-500': checkoutStep < 2 }">
                                Payment</div>
                        </div>
                        <div class="flex-1 text-center">
                            <div :class="{
                                'bg-cyan-700 text-white': checkoutStep >= 3,
                                'bg-gray-200 text-gray-600': checkoutStep < 3
                            }"
                                class="h-8 w-8 rounded-full flex items-center justify-center mx-auto">3</div>
                            <div class="mt-1 text-xs"
                                :class="{ 'text-cyan-700 font-medium': checkoutStep >= 3, 'text-gray-500': checkoutStep < 3 }">
                                Confirmation</div>
                        </div>
                    </div>

                    <!-- Step 1: Customer Details -->
                    <div x-show="checkoutStep === 1">
                        <h4 class="text-lg font-medium text-slate-900 mb-4">Shipping Information</h4>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                <input type="text" x-model="customerInfo.name" placeholder="Enter your full name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                <input type="tel" x-model="customerInfo.phone" placeholder="Example: 08123456789"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" x-model="customerInfo.email" placeholder="email@example.com"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Complete Address</label>
                                <textarea x-model="customerInfo.address" rows="3" placeholder="Enter your complete address"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500"></textarea>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button @click="goToStep(2)"
                                class="w-full bg-cyan-700 hover:bg-cyan-800 text-white py-3 rounded-md font-medium transition duration-300">
                                Continue to Payment
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Payment -->
                    <div x-show="checkoutStep === 2">
                        <h4 class="text-lg font-medium text-slate-900 mb-4">Payment Information</h4>

                        <div class="mb-4">
                            <div class="bg-cyan-50 border border-cyan-200 rounded-md p-4 mb-4">
                                <h5 class="font-medium text-slate-900 mb-2">Order Details:</h5>
                                <div class="flex justify-between mb-1">
                                    <span x-text="product.name"></span>
                                    <span x-text="'x' + quantity"></span>
                                </div>
                                <div class="flex justify-between font-medium text-slate-900">
                                    <span>Total Payment:</span>
                                    <span x-text="formatRupiah(product.price * quantity)"></span>
                                </div>
                            </div>

                            <div class="border border-gray-200 rounded-md p-4 mb-4">
                                <h5 class="font-medium text-slate-900 mb-2">Payment Method:</h5>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="radio" x-model="paymentMethod" value="transfer"
                                            class="h-4 w-4 text-cyan-600">
                                        <span class="ml-2">Bank Transfer</span>
                                    </label>

                                    <template x-if="paymentMethod === 'transfer'">
                                        <div class="mt-2 pl-6">
                                            <div class="bg-gray-50 border border-gray-200 rounded-md p-3">
                                                <p class="text-sm mb-1">BCA: 1234567890</p>
                                                <p class="text-sm mb-1">A/N: K-pop Heaven Store</p>
                                                <p class="text-sm font-medium text-cyan-700">Total: <span
                                                        x-text="formatRupiah(product.price * quantity)"></span></p>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Upload Payment Proof</label>
                                <div
                                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                            viewBox="0 0 48 48" aria-hidden="true">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="file-upload"
                                                class="relative cursor-pointer bg-white rounded-md font-medium text-cyan-600 hover:text-cyan-500 focus-within:outline-none">
                                                <span>Upload file</span>
                                                <input id="file-upload" name="file-upload" type="file"
                                                    class="sr-only" @change="handleFileUpload">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                    </div>
                                </div>

                                <div x-show="paymentProof" class="mt-3">
                                    <p class="text-sm text-green-600">File successfully uploaded: <span
                                            x-text="paymentProof"></span></p>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-3 mt-6">
                            <button @click="goToStep(1)"
                                class="flex-1 bg-white border border-gray-300 text-slate-700 hover:bg-gray-50 py-3 rounded-md font-medium transition duration-300">
                                Back
                            </button>
                            <button @click="goToStep(3)"
                                class="flex-1 bg-cyan-700 hover:bg-cyan-800 text-white py-3 rounded-md font-medium transition duration-300"
                                :disabled="!paymentProof || !paymentMethod"
                                :class="{ 'opacity-50 cursor-not-allowed': !paymentProof || !paymentMethod }">
                                Confirm Order
                            </button>
                        </div>
                    </div>

                    <!-- Step 3: Confirmation -->
                    <div x-show="checkoutStep === 3">
                        <div class="text-center">
                            <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-4">
                                <svg class="h-8 w-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>

                            <h4 class="text-lg font-bold text-slate-900 mb-2">Thank You For Your Order!</h4>
                            <p class="text-slate-600 mb-6">Your order has been received and is being processed.</p>

                            <div class="bg-gray-50 border border-gray-200 rounded-md p-4 text-left mb-6">
                                <h5 class="font-medium text-slate-900 mb-2">Order Details:</h5>
                                <p class="mb-1"><span class="font-medium">Order Number:</span> KPH-2025-<span
                                        x-text="Math.floor(Math.random() * 10000)"></span></p>
                                <p class="mb-1"><span class="font-medium">Product:</span> <span
                                        x-text="product.name"></span></p>
                                <p class="mb-1"><span class="font-medium">Quantity:</span> <span
                                        x-text="quantity"></span></p>
                                <p class="mb-1"><span class="font-medium">Total:</span> <span
                                        x-text="formatRupiah(product.price * quantity)"></span></p>
                                <p class="mb-1"><span class="font-medium">Status:</span> <span
                                        class="text-green-600">Awaiting Confirmation</span></p>
                            </div>

                            <p class="text-slate-600 text-sm mb-6">
                                We will send order details and status updates via email. If you have any questions, please contact our customer service.
                            </p>

                            <button @click="finishCheckout"
                                class="w-full bg-cyan-700 hover:bg-cyan-800 text-white py-3 rounded-md font-medium transition duration-300">
                                Return to Store
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add to Cart Notification -->
        <div x-show="showCartNotification" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform translate-y-2"
            class="fixed bottom-4 right-4 bg-cyan-600 text-white px-4 py-3 rounded-md shadow-lg flex items-center">
            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span>Product successfully added to cart!</span>
        </div>
    </div>

    <script>
        function productPage() {
            return {
                product: {
                    id: 1,
                    name: '{{ $album->judul_222305 }}',
                    price: {{ $album->harga_222305}},
                    rating: 5,
                    stock: 25,
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
                showCartNotification: false,
                customerInfo: {
                    name: '',
                    phone: '',
                    email: '',
                    address: ''
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

                // Cart functions
                addToCart() {
                    // In a real implementation, this would communicate with a cart service
                    // For now, we'll just show the notification
                    this.showCartNotification = true;

                    // Hide notification after 3 seconds
                    setTimeout(() => {
                        this.showCartNotification = false;
                    }, 3000);
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
                        // Validate payment information before confirming
                        if (!this.paymentMethod || !this.paymentProof) {
                            alert('Please select a payment method and upload payment proof');
                            return;
                        }
                    }

                    this.checkoutStep = step;
                },

                // Handle file upload for payment proof
                handleFileUpload(event) {
                    const file = event.target.files[0];
                    if (file) {
                        // In a real implementation, this would upload the file to a server
                        // For demo purposes, we'll just store the filename
                        this.paymentProof = file.name;
                    }
                },

                // Complete checkout process
                finishCheckout() {
                    // In a real implementation, this would finalize the order in the backend
                    this.closeCheckoutModal();

                    // Reset state
                    this.quantity = 1;
                    this.paymentMethod = '';
                    this.paymentProof = '';
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