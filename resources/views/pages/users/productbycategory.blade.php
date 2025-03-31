@extends('layouts.app')
@section('title', 'Category')
@section('content')
<main>
    <div class="px-32 mt-12 relative min-h-screen h-full">
        <div class="flex justify-center items-center">
            <div class="h-0.5 bg-black w-full mt-10"></div>
            <h2 class="text-2xl font-semibold mt-10 text-center w-[800px]">LIST PRODUCTS</h2>
            <div class="h-0.5 bg-black w-full mt-10"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5 mt-5">
            @if (!empty($category->products) && count($category->products) > 0)
                @foreach ($category->products as $product)
                <x-shop.card-product :path="route('product.show', $product->id)" :title="$product->nama" :id_product="$product->id" :price="number_format($product->harga, 0, ',', '.') . ' IDR'" :image="Str::startsWith($product->path_img, 'http')
                    ? $product->path_img
                    : asset('storage/' . $product->path_img)"
                     />
                @endforeach
            @else
                <p class="text-center col-span-full">No products available.</p>
            @endif
        </div>
    </div>

</main>
@endsection
@section('scripts')
<script>
    function isUserLoggedIn() {
        return {{ auth()->check() ? 'true' : 'false' }}; 
    }

    document.querySelectorAll('#add-to-cart').forEach(button => {
        button.addEventListener('click', async function () {
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
                const response = await fetch(`{{ route('cart.add', ':id') }}`.replace(':id', productId), {
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

                // Tampilkan SweetAlert untuk notifikasi sukses
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
@endsection
