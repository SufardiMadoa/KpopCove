@extends('layouts.dashboard-layout')

@section('title', 'Detail Album')

@section('content')
<div class="container px-6 mx-auto">
    <!-- Page Heading -->
    <div class="flex items-center justify-between py-4 mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Detail Album</h1>
        <div class="flex space-x-2">
            <a href="{{ route('admin.album.edit', $album->id_album_222305) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg class="w-4 h-4 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit
            </a>
            <a href="{{ route('admin.album.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg class="w-4 h-4 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>
    </div>

    <!-- Album Details Card -->
    <div class="bg-white shadow overflow-hidden rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-medium text-gray-800">Informasi Album</h2>
        </div>
        
        <div class="px-6 py-4">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <!-- Album Cover -->
                <div class="col-span-1">
                    @if($album->path_img_222305)
                        <div class="rounded-lg overflow-hidden shadow-md">
                            <img src="{{ asset('storage/' . $album->path_img_222305) }}" 
                                class="w-full h-auto object-cover" alt="{{ $album->judul_222305 }}">
                        </div>
                    @else
                        <div class="rounded-lg overflow-hidden shadow-md bg-gray-100 flex items-center justify-center" style="height: 300px">
                            <svg class="h-16 w-16 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- Album Details -->
                <div class="col-span-2">
                    <dl>
                        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">ID Album</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $album->id_album_222305 }}</dd>
                        </div>
                        
                        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4 border-t border-gray-200">
                            <dt class="text-sm font-medium text-gray-500">Judul Album</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $album->judul_222305 }}</dd>
                        </div>
                        
                        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4 border-t border-gray-200">
                            <dt class="text-sm font-medium text-gray-500">Harga</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Rp {{ number_format($album->harga_222305, 0, ',', '.') }}</dd>
                        </div>
                        
                        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4 border-t border-gray-200">
                            <dt class="text-sm font-medium text-gray-500">Status</dt>
                            <dd class="mt-1 sm:mt-0 sm:col-span-2">
                                @if($album->status_222305 == 'tersedia')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Tersedia
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Tidak Tersedia
                                    </span>
                                @endif
                            </dd>
                        </div>
                        
                        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4 border-t border-gray-200">
                            <dt class="text-sm font-medium text-gray-500">Kategori</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <div class="flex flex-wrap gap-2">
                                    @foreach($album->kategoris as $kategori)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                            {{ $kategori->nama_kategori_222305 }}
                                        </span>
                                    @endforeach
                                </div>
                            </dd>
                        </div>
                        
                        
                        
                        <div class="py-3 border-t border-gray-200">
                            <dt class="text-sm font-medium text-gray-500 mb-2">Deskripsi</dt>
                            <dd class="mt-1 text-sm text-gray-900 whitespace-pre-line">{{ $album->deskripsi_222305 }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Tracks Section (Optional) -->
    @if($album->tracks && $album->tracks->count() > 0)
    <div class="mt-8 bg-white shadow overflow-hidden rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-medium text-gray-800">Tracks dalam Album Ini</h2>
        </div>
        
        <div class="px-6 py-4">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul Track</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durasi</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">File</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($album->tracks as $index => $track)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $track->judul_track_222305 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $track->durasi_222305 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                @if($track->file_222305)
                                <a href="{{ asset('storage/' . $track->file_222305) }}" class="text-indigo-600 hover:text-indigo-900" target="_blank">
                                    <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Play
                                </a>
                                @else
                                <span class="text-gray-400">No file</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection