@props(['path', 'title', 'price', 'discountPrice', 'image', 'class'])

<div class="bg-white shadow-md p-4 relative {{ $class }}">
    <span class="absolute top-2 left-2 bg-gray-500 text-white text-xs font-bold px-2 py-1">SALE</span>
    <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-full h-auto rounded-lg">
    <h2 class="text-gray-800 font-semibold mt-2">{{ $title }}</h2>
    <p class="text-sm text-gray-500">
        <span class="line-through text-gray-400">$ {{ number_format($price, 2) }}</span>
        <span class="text-red-500 font-bold">$ {{ number_format(100, 2) }}</span>
    </p>
    <div class="flex mt-2 text-yellow-400">
        ⭐⭐⭐⭐☆
    </div>
</div>
