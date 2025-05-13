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