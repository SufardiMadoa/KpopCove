@extends('layouts.dashboard-layout')

@section('title', 'Edit Album')

@section('content')
<div class="container px-6 mx-auto">
    <!-- Page Heading -->
    <div class="flex items-center justify-between py-4 mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Edit Album</h1>
        <a href="{{ route('admin.album.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <svg class="w-4 h-4 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white shadow overflow-hidden rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-medium text-gray-800">Form Edit Album</h2>
        </div>
        <form action="{{ route('admin.album.update', $album->id_album_222305) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="px-6 py-4">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="judul_222305" class="block text-sm font-medium text-gray-700">
                            Judul Album <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="judul_222305" id="judul_222305" value="{{ old('judul_222305', $album->judul_222305) }}" 
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                            @error('judul_222305') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror" 
                            required>
                        @error('judul_222305')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="harga_222305" class="block text-sm font-medium text-gray-700">
                            Harga (Rp) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="harga_222305" id="harga_222305" value="{{ old('harga_222305', $album->harga_222305) }}" min="0"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                            @error('harga_222305') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                            required>
                        @error('harga_222305')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6">
                    <label for="deskripsi_222305" class="block text-sm font-medium text-gray-700">
                        Deskripsi <span class="text-red-500">*</span>
                    </label>
                    <textarea name="deskripsi_222305" id="deskripsi_222305" rows="4"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                        @error('deskripsi_222305') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                        required>{{ old('deskripsi_222305', $album->deskripsi_222305) }}</textarea>
                    @error('deskripsi_222305')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2">
                    <div>
                        <label for="status_222305" class="block text-sm font-medium text-gray-700">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select name="status_222305" id="status_222305"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md
                            @error('status_222305') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                            required>
                            <option value="tersedia" {{ old('status_222305', $album->status_222305) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="tidak tersedia" {{ old('status_222305', $album->status_222305) == 'tidak tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                        </select>
                        @error('status_222305')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <div class="bg-white border border-gray-300 rounded-md shadow-sm p-2 max-h-48 overflow-y-auto">
                            @foreach($kategoris as $kategori)
                            <div class="flex items-center mb-2 last:mb-0">
                                <input type="checkbox" name="kategori_ids[]" id="kategori_{{ $kategori->id_kategori_222305 }}" 
                                    value="{{ $kategori->id_kategori_222305 }}" 
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                    {{ (is_array(old('kategori_ids', $selectedKategoris)) && in_array($kategori->id_kategori_222305, old('kategori_ids', $selectedKategoris))) ? 'checked' : '' }}>
                                <label for="kategori_{{ $kategori->id_kategori_222305 }}" 
                                    class="ml-2 block text-sm text-gray-700">
                                    {{ $kategori->nama_kategori_222305 }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Pilih satu atau lebih kategori dengan mencentang kotak</p>
                        @error('kategori_ids')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-700">
                        Cover Album
                    </label>
                    
                    <!-- Current Image Preview -->
                    <div class="mt-2">
                        @if($album->path_img_222305)
                            <div class="flex items-center mb-2">
                                <img src="{{ asset('storage/' . $album->path_img_222305) }}" 
                                    class="h-40 w-auto object-cover rounded-md" alt="{{ $album->judul_222305 }}">
                                <p class="ml-4 text-sm text-gray-500">Cover saat ini</p>
                            </div>
                        @endif
                    </div>
                    
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" 
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="cover_image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Upload file baru</span>
                                    <input id="cover_image" name="cover_image" type="file" class="sr-only" accept="image/*">
                                </label>
                                <p class="pl-1">atau drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">
                                PNG, JPG, GIF hingga 2MB
                            </p>
                            <p class="text-xs text-gray-500">
                                Biarkan kosong jika tidak ingin mengubah cover
                            </p>
                        </div>
                    </div>
                    <div class="mt-2">
                        <img id="preview" class="hidden mt-2 h-40 w-auto object-cover rounded-md" src="#" alt="Preview">
                    </div>
                    @error('cover_image')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="px-6 py-4 bg-gray-50 text-right">
                <button type="reset" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Reset
                </button>
                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Image preview
        const input = document.getElementById('cover_image');
        const preview = document.getElementById('preview');
        
        if (input) {
            input.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                    }
                    
                    reader.readAsDataURL(this.files[0]);
                }
            });
        }
        
        // Drag and drop feature
        const dropArea = document.querySelector('.border-dashed');
        
        if (dropArea) {
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, preventDefaults, false);
            });
            
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            ['dragenter', 'dragover'].forEach(eventName => {
                dropArea.addEventListener(eventName, highlight, false);
            });
            
            ['dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, unhighlight, false);
            });
            
            function highlight() {
                dropArea.classList.add('border-indigo-500');
                dropArea.classList.add('bg-indigo-50');
            }
            
            function unhighlight() {
                dropArea.classList.remove('border-indigo-500');
                dropArea.classList.remove('bg-indigo-50');
            }
            
            dropArea.addEventListener('drop', handleDrop, false);
            
            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                
                if (files.length) {
                    input.files = files;
                    
                    // Trigger change event to show preview
                    const event = new Event('change', { bubbles: true });
                    input.dispatchEvent(event);
                }
            }
        }
        
        // Form reset handling
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('reset', function() {
                // Hide preview
                if (preview) {
                    preview.classList.add('hidden');
                    preview.src = '#';
                }
                
                // Reset checkboxes to their initial state based on album data
                const initialSelected = {!! json_encode(old('kategori_ids', $selectedKategoris)) !!};
                
                document.querySelectorAll('input[name="kategori_ids[]"]').forEach(checkbox => {
                    const value = parseInt(checkbox.value);
                    checkbox.checked = initialSelected.includes(value);
                });
                
                // Remove validation errors
                document.querySelectorAll('.text-red-600').forEach(el => {
                    el.textContent = '';
                });
                
                document.querySelectorAll('.border-red-300, .text-red-900, .placeholder-red-300').forEach(el => {
                    el.classList.remove('border-red-300', 'text-red-900', 'placeholder-red-300');
                });
            });
        }
    });
</script>
@endsection
