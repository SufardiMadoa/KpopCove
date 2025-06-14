@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="bg-gray-100 py-16 font-jost" x-data="cart()">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-slate-900 mb-8">Your Shopping Cart</h1>

        <div class="md:flex md:gap-8">
            <div class="md:w-2/3">
                {{-- Loading State --}}
                <template x-if="loading">
                    <div class="bg-white rounded-lg shadow-md p-8 text-center">
                        <p class="text-lg font-semibold">Loading your cart...</p>
                    </div>
                </template>
                
                {{-- Empty Cart State --}}
                <template x-if="!loading && items.length === 0">
                    <div class="bg-white rounded-lg shadow-md p-8 text-center">
                        <h2 class="text-xl font-semibold text-gray-700">Your cart is empty.</h2>
                        <p class="text-gray-500 mt-2">Looks like you haven't added any albums yet.</p>
                        <a href="{{ route('userHome.home') }}" class="mt-6 inline-block bg-cyan-600 text-white px-6 py-2 rounded-md hover:bg-cyan-700 transition">
                            Continue Shopping
                        </a>
                    </div>
                </template>

                {{-- Cart with Items --}}
                <template x-if="!loading && items.length > 0">
                    <div class="bg-white rounded-lg shadow-md">
                        <div class="hidden md:flex px-6 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase">
                            <div class="w-2/5">Product</div>
                            <div class="w-1/5 text-center">Price</div>
                            <div class="w-1/5 text-center">Quantity</div>
                            <div class="w-1/5 text-right">Total</div>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <template x-for="(item, index) in items" :key="item.id_item_keranjang_222305">
                                <div class="flex flex-col md:flex-row items-center p-6" :class="{ 'opacity-50': item.loading }">
                                    <div class="w-full md:w-2/5 flex items-center mb-4 md:mb-0">
                                        <img :src="item.album.image_url" :alt="item.album.judul_222305" class="w-24 h-24 object-cover rounded-md mr-4">
                                        <div>
                                            <p class="font-bold text-slate-800" x-text="item.album.judul_222305"></p>
                                            <p class="text-sm text-gray-500">K-Pop Album</p>
                                            <button @click="removeItem(item.id_item_keranjang_222305, index)" class="text-red-500 hover:text-red-700 text-sm font-semibold mt-2">Remove</button>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/5 text-left md:text-center mb-2 md:mb-0"><span class="md:hidden font-semibold">Price: </span><span x-text="formatRupiah(item.harga_222305)"></span></div>
                                    <div class="w-full md:w-1/5 flex items-center justify-start md:justify-center mb-4 md:mb-0">
                                       <span class="md:hidden font-semibold mr-4">Quantity: </span>
                                        <div class="flex items-center border border-gray-300 rounded">
                                            <button @click="updateQuantity(item.id_item_keranjang_222305, item.jumlah_222305 - 1)" class="px-3 py-1 text-cyan-700 hover:bg-gray-100" :disabled="item.jumlah_222305 <= 1 || item.loading">-</button>
                                            <span class="px-4 py-1 border-l border-r border-gray-300" x-text="item.jumlah_222305"></span>
                                            <button @click="updateQuantity(item.id_item_keranjang_222305, item.jumlah_222305 + 1)" class="px-3 py-1 text-cyan-700 hover:bg-gray-100" :disabled="item.loading">+</button>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/5 text-left md:text-right"><span class="md:hidden font-semibold">Total: </span><span class="font-bold" x-text="formatRupiah(item.jumlah_222305 * item.harga_222305)"></span></div>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Order Summary -->
            <div class="md:w-1/3 mt-8 md:mt-0">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                    <h2 class="text-xl font-bold text-slate-800 border-b pb-4">Order Summary</h2>
                    <div class="mt-4 space-y-2">
                        <div class="flex justify-between"><span>Subtotal</span><span x-text="formatRupiah(subtotal)"></span></div>
                        <div class="flex justify-between"><span>Shipping</span><span class="font-semibold text-green-600">Free</span></div>
                        <div class="flex justify-between text-lg font-bold border-t pt-4 mt-4"><span>Total</span><span x-text="formatRupiah(total)"></span></div>
                    </div>
                    <button @click="openCheckoutModal" class="w-full mt-6 bg-cyan-600 text-white py-3 rounded-md font-medium hover:bg-cyan-700 transition" :disabled="items.length === 0">
                        Proceed to Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Checkout Modal -->
    <div x-show="isCheckoutModalOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" style="display: none;">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 overflow-auto max-h-[90vh]" @click.away="closeCheckoutModal">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Checkout</h2>
                <button @click="closeCheckoutModal" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
            </div>

            <form @submit.prevent="submitOrder">
                @csrf
                <!-- Step 1: Customer Information -->
                <div x-show="checkoutStep === 1">
                    <h3 class="text-lg font-semibold mb-4">Customer Information</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" x-model="customerInfo.name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Phone</label>
                            <input type="tel" x-model="customerInfo.phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" x-model="customerInfo.email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Shipping Address</label>
                            <textarea x-model="customerInfo.address" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Payment Method -->
                <div x-show="checkoutStep === 2">
                    <h3 class="text-lg font-semibold mb-4">Payment Method</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between mt-2 text-lg font-bold"><span>Total:</span><span x-text="formatRupiah(total)"></span></div>
                            <label class="block text-sm font-medium text-gray-700 p-2">Select Payment Method</label>
                            <select x-model="paymentMethod" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2" required>
                                <option value="">Choose a payment method</option>
                                <option value="qris">QRIS</option>
                                <option value="transfer">Bank Transfer</option>
                                <option value="cod">Cash on Delivery</option>
                                <option value="e-wallet">E-Wallet (DANA)</option>
                            </select>
                        </div>
                        <div x-show="paymentMethod === 'qris'" class="mt-4 p-4 bg-gray-50 rounded-lg"><h4 class="font-medium text-gray-900 mb-2">QRIS Payment</h4><img src="{{ asset('images/qris.png') }}" alt="QRIS Code" class="w-48 mx-auto mb-2"><p class="text-sm text-gray-600 text-center">Scan QR code to pay</p></div>
                        <div x-show="paymentMethod === 'transfer'" class="mt-4 p-4 bg-gray-50 rounded-lg"><h4 class="font-medium text-gray-900 mb-2">Bank Transfer (BRI)</h4><p class="text-gray-600">Account Number: <span class="font-medium">1234-5678-9012-3456</span></p><p class="text-gray-600">Account Name: <span class="font-medium">KPOP COVE</span></p><p class="text-sm text-gray-500 mt-2">Please transfer the exact amount and upload the proof</p></div>
                        <div x-show="paymentMethod === 'e-wallet'" class="mt-4 p-4 bg-gray-50 rounded-lg"><h4 class="font-medium text-gray-900 mb-2">DANA E-Wallet</h4><p class="text-gray-600">DANA Number: <span class="font-medium">0812-3456-7890</span></p><p class="text-gray-600">Account Name: <span class="font-medium">KPOP COVE</span></p><p class="text-sm text-gray-500 mt-2">Please transfer the exact amount and upload the proof</p></div>
                        <div x-show="paymentMethod === 'cod'" class="mt-4 p-4 bg-gray-50 rounded-lg"><h4 class="font-medium text-gray-900 mb-2">Cash on Delivery</h4><p class="text-gray-600">Pay when you receive your order</p></div>
                        <div x-show="paymentMethod && paymentMethod !== 'cod'" class="mt-4">
                            <label class="block text-sm font-medium text-gray-700">Payment Proof</label>
                            <input type="file" @change="handleFileUpload" accept="image/*" class="mt-1 block w-full" :required="paymentMethod !== 'cod'">
                            <div x-show="imagePreview" class="mt-3"><img :src="imagePreview" alt="Payment Proof Preview" class="max-w-xs rounded-lg shadow-sm"></div>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Order Summary -->
                <div x-show="checkoutStep === 3">
                    <h3 class="text-lg font-semibold mb-4">Order Summary</h3>
                    <div class="space-y-4">
                        <div class="border-t border-b border-gray-200 py-4">
                            <template x-for="item in items" :key="item.id_item_keranjang_222305">
                                <div class="flex justify-between text-sm mb-1">
                                    <span x-text="`${item.album.judul_222305} (x${item.jumlah_222305})`"></span>
                                    <span x-text="formatRupiah(item.jumlah_222305 * item.harga_222305)"></span>
                                </div>
                            </template>
                            <div class="flex justify-between mt-4 pt-4 border-t text-lg font-bold"><span>Total:</span><span x-text="formatRupiah(total)"></span></div>
                        </div>
                        <div class="space-y-2">
                            <p><strong>Shipping to:</strong></p>
                            <p x-text="customerInfo.name"></p>
                            <p x-text="customerInfo.address"></p>
                        </div>
                        <div><p><strong>Payment Method:</strong> <span x-text="paymentMethod" class="uppercase font-medium"></span></p></div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="mt-6 flex justify-between">
                    <button type="button" @click="checkoutStep > 1 ? checkoutStep-- : closeCheckoutModal()" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300"><span x-text="checkoutStep === 1 ? 'Cancel' : 'Back'"></span></button>
                    <button type="button" x-show="checkoutStep < 3" @click="goToStep(checkoutStep + 1)" class="px-4 py-2 bg-cyan-600 text-white rounded-md hover:bg-cyan-700">Next</button>
                    <button type="submit" x-show="checkoutStep === 3" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Place Order</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function cart() {
    return {
        items: [],
        loading: true,
        isCheckoutModalOpen: false,
        checkoutStep: 1,
        paymentMethod: '',
        paymentProofFile: null,
        imagePreview: '',
        customerInfo: { name: '', phone: '', email: '', address: '' },

        init() { this.fetchCartItems(); },
        getCsrfToken() {
            const tokenElement = document.querySelector('meta[name="csrf-token"]');
            if (!tokenElement) { console.error('CSRF token not found'); return null; }
            return tokenElement.getAttribute('content');
        },

        async fetchCartItems() {
            this.loading = true;
            try {
                const response = await fetch('/keranjang', { headers: { 'Accept': 'application/json' }});
                if (!response.ok) throw new Error('Failed to fetch cart data.');
                const data = await response.json();
                this.items = (data && data.item_keranjangs) ? data.item_keranjangs.map(item => ({ ...item, album: { ...item.album, image_url: `{{ asset('storage') }}/${item.album.path_img_222305}` }, loading: false })) : [];
            } catch (error) {
                console.error('Error fetching cart items:', error);
                Swal.fire('Error', 'Could not load your shopping cart.', 'error');
            } finally {
                this.loading = false;
            }
        },

        async updateQuantity(itemId, newQuantity) {
            const itemIndex = this.items.findIndex(i => i.id_item_keranjang_222305 === itemId);
            if (itemIndex === -1 || newQuantity < 1) return;
            this.items[itemIndex].loading = true;
            try {
                const csrfToken = this.getCsrfToken();
                if (!csrfToken) throw new Error('CSRF Token not found.');
                const response = await fetch(`/keranjang/item/${itemId}`, {
                    method: 'PUT',
                    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                    body: JSON.stringify({ jumlah_222305: newQuantity })
                });
                const result = await response.json();
                if (!response.ok) throw new Error(result.message || 'Failed to update quantity.');
                this.items[itemIndex] = { ...this.items[itemIndex], ...result.item };
            } catch (error) {
                Swal.fire('Error', error.message, 'error');
                this.fetchCartItems(); 
            } finally {
                if (this.items[itemIndex]) this.items[itemIndex].loading = false;
            }
        },

        async removeItem(itemId, index) {
            Swal.fire({ title: 'Are you sure?', text: "This action cannot be undone!", icon: 'warning', showCancelButton: true, confirmButtonColor: '#0891b2', cancelButtonColor: '#d33', confirmButtonText: 'Yes, remove it!' })
            .then(async (result) => {
                if (result.isConfirmed) {
                    try {
                        const csrfToken = this.getCsrfToken();
                        if (!csrfToken) throw new Error('CSRF Token not found.');
                        const response = await fetch(`/keranjang/item/${itemId}`, { method: 'DELETE', headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': csrfToken }});
                        const res = await response.json();
                        if (!response.ok) throw new Error(res.message || 'Failed to remove item.');
                        this.items.splice(index, 1);
                        Swal.fire('Removed!', res.message, 'success');
                    } catch (error) { Swal.fire('Error', error.message, 'error'); }
                }
            })
        },

        // --- CHECKOUT LOGIC ---
        openCheckoutModal() { if (this.items.length > 0) { this.isCheckoutModalOpen = true; document.body.style.overflow = 'hidden'; } },
        closeCheckoutModal() { this.isCheckoutModalOpen = false; document.body.style.overflow = ''; this.resetCheckoutForm(); },
        
        goToStep(step) {
            if (step === 2 && (!this.customerInfo.name || !this.customerInfo.phone || !this.customerInfo.email || !this.customerInfo.address)) { Swal.fire('Validation Error', 'Please complete all customer information.', 'warning'); return; }
            if (step === 3 && !this.paymentMethod) { Swal.fire('Validation Error', 'Please select a payment method.', 'warning'); return; }
            if (step === 3 && this.paymentMethod !== 'cod' && !this.paymentProofFile) { Swal.fire('Validation Error', 'Please upload payment proof.', 'warning'); return; }
            this.checkoutStep = step;
        },

        handleFileUpload(event) {
            const file = event.target.files[0];
            if (!file) { this.paymentProofFile = null; this.imagePreview = ''; return; }
            this.paymentProofFile = file;
            const reader = new FileReader();
            reader.onload = (e) => this.imagePreview = e.target.result;
            reader.readAsDataURL(file);
        },

        async submitOrder(e) {
            const csrfToken = this.getCsrfToken();
            if (!csrfToken) return;
            const formData = new FormData();
            
            // Append checkout data
            formData.append('nama_penerima_222305', this.customerInfo.name);
            formData.append('telepon_penerima_222305', this.customerInfo.phone);
            formData.append('email_penerima_222305', this.customerInfo.email);
            formData.append('alamat_pengiriman_222305', this.customerInfo.address);
            formData.append('metode_pembayaran_222305', this.paymentMethod);
            formData.append('total_harga_222305', this.total);
            if (this.paymentProofFile) { formData.append('bukti_pembayaran_222305', this.paymentProofFile); }
            
            // Append items data as an array for backend processing
            this.items.forEach((item, index) => {
                formData.append(`items[${index}][album_id]`, item.id_album_222305);
                formData.append(`items[${index}][quantity]`, item.jumlah_222305);
            });
            
            try {
                // Assuming you have a route for cart checkout
                const response = await fetch("{{ route('users.pemesanan.storeFromCart') }}", { 
                    method: 'POST', body: formData, headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': csrfToken }
                });
                const result = await response.json();
                if (!response.ok) throw new Error(result.errors ? Object.values(result.errors).flat().join('\n') : result.message);
                Swal.fire("Order Placed!", "Your order is being processed.", "success");
                this.closeCheckoutModal();
                this.items = []; // Clear the cart on frontend
            } catch (error) { Swal.fire('Order Error', error.message, 'error'); }
        },

        resetCheckoutForm() {
            this.checkoutStep = 1;
            this.paymentMethod = '';
            this.paymentProofFile = null;
            this.imagePreview = '';
            // Don't reset customer info if they might checkout again
        },

        // Computed properties for totals
        get subtotal() {
            if (!this.items) return 0;
            return this.items.reduce((acc, item) => acc + (parseFloat(item.jumlah_222305) || 0) * (parseFloat(item.harga_222305) || 0), 0);
        },
        get total() { return this.subtotal; },
        formatRupiah(amount) {
            const number = parseFloat(amount);
            if (isNaN(number)) return 'Rp 0';
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(number);
        }
    }
}
</script>
@endsection
