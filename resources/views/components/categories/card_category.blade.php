<div
    class="flex flex-col md:flex-row-reverse h-60 overflow-hidden items-center gap-8 border border-linen px-5 rounded-md shadow-md">
    <div class="relative w-full md:w-1/2 h-full {{ $isOdd ? 'order-1' : '' }}">
        <img src="{{ $image }}" alt="Kemeja" class="w-full object-cover object-top h-full">
    </div>
    <div class="w-full md:w-1/2   {{ $isOdd ? 'text-end' : '' }}">
        <h3 class="text-3xl font-bold text-gray-800">{{ $title }}</h3>
        <p class="text-gray-600 my-2">{{ Str::words($desc, 20, '...') }}</p>
        <a href="{{ $path }} "
            class="text-slate-950 border border-slate-950 hover:bg-linen  px-5 py-2  shadow-md inline-block mt-5">Belanja
            Sekarang →</a>
    </div>
</div>
