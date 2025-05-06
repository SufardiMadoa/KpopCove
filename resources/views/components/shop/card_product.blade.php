@props(['path', 'title', 'price', 'discountPrice', 'image', 'class'])

<a href="{{ $path }}" class="bg-white shadow-md p-4 relative {{ $class }}">
    <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-60 object-cover rounded-lg">
    <h2 class="text-gray-800 font-semibold mt-2">{{ $title }}</h2>
    <p class="text-sm text-gray-500">
        <span class="text-gray-900">{{ $price }}</span>
    </p>
    <button
    class="mt-4 w-full bg-cyan-700 hover:bg-cyan-800 text-slate-900 py-2 rounded transition duration-300">
    Tambah ke Keranjang
    </button>
</a>
