@props(['path', 'title', 'price', 'discountPrice', 'image', 'class'])

<a href="{{ $path }}" class=" bg-white shadow-md p-4  {{ $class }}">
    <div class="overflow-hidden rounded-lg relative">
        <img src="{{ $image }}" alt="{{ $title }}"
            class="w-full h-60 object-cover rounded-lg hover:scale-110 transition-transform duration-500 ease-in-out">
    </div>
    <h2 class="text-gray-800 font-semibold mt-2">{{ $title }}</h2>
    <p class="  text-sm text-gray-500">
        <span class="text-gray-900">{{ $price }}</span>
    </p>
   <button
    class="mt-4 w-full bg-cyan-800  hover:bg-cyan-700 text-white py-2 rounded transition-colors duration-300">
    Tambah ke Keranjang
</button >

</a>

<!-- CSS Custom untuk memastikan animasi bekerja -->
<style>
    .overflow-hidden img:hover {
        transform: scale(1.1);
    }
</style>

