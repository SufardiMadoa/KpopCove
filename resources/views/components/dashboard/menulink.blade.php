@props(['path', 'title'])

@php
    $isActive = request()->url() === url($path);
@endphp

<li class="group">
    <a href="{{ url($path) }}"
       @class([
           'flex items-center px-4 py-2 rounded-lg transition-colors',
           'bg-[#A2D2FF] text-black stroke-white' => $isActive,
           'hover:bg-[#A2D2FF] hover:text-black hover:stroke-white' => !$isActive,
       ])
    >
        {{-- Slot untuk icon --}}
        {{ $slot }}

        {{-- Label menu --}}
        <span class="ms-3">{{ $title }}</span>
    </a>
</li>
