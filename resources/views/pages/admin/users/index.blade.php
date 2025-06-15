@extends('layouts.dashboard-layout')

@section('title', 'Manajemen User')

@section('content')
<div class="container px-6 mx-auto">
    <!-- Page Heading -->
    <div class="flex items-center justify-between py-4 mb-6 ">
        <h1 class="text-2xl font-semibold text-gray-800">Manajemen User</h1>
        <a href="{{ route('admin.users.create') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <svg class="w-4 h-4 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah User Baru
        </a>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="p-4 mb-6 bg-green-100 border border-green-400 rounded-md text-green-700" role="alert">
            <div class="flex">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <!-- DataTable -->
    <div class="overflow-hidden bg-white shadow-md rounded-lg">
       <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200" id="dataTable">
            <thead class="bg-cyan-600">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nama</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Email</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">No. Telp</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Role</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ Str::limit($user->email_222305, 8, '...') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $user->nama_222305 }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->email_222305 }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->no_telp_222305 }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $user->role_222305 == 'admin' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                {{ ucfirst($user->role_222305) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2 justify-center">
                                <a href="{{ route('admin.users.show', $user->email_222305) }}" class="text-indigo-600 hover:text-indigo-900" title="Detail">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <a href="{{ route('admin.users.edit', $user->email_222305) }}" class="text-yellow-600 hover:text-yellow-900" title="Edit">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <button type="button" class="text-red-600 hover:text-red-900" onclick="toggleModal('deleteModal{{ $user->email_222305 }}')" title="Hapus">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Delete Modal -->
                            <div id="deleteModal{{ $user->email_222305 }}" class="fixed inset-0 z-10 hidden overflow-y-auto">
                                <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                    
                                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                    <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                        <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                                            <div class="sm:flex sm:items-start">
                                                <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                                    <svg class="w-6 h-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                    </svg>
                                                </div>
                                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                                                        Konfirmasi Hapus
                                                    </h3>
                                                    <div class="mt-2">
                                                        <p class="text-sm text-gray-500">
                                                            Apakah Anda yakin ingin menghapus user <strong>{{ $user->nama_222305 }}</strong>?
                                                        </p>
                                                        <p class="mt-2 text-sm text-red-500">
                                                            Tindakan ini tidak dapat dibatalkan.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                                            <form action="{{ route('admin.users.delete', $user->email_222305) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                            <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleModal('deleteModal{{ $user->email_222305 }}')">
                                                Batal
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                            Tidak ada data user.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
       </div>
    </div>
</div>
<script>
    

    // Modal toggle function
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
        } else {
            modal.classList.add('hidden');
        }
    }
</script>
@endsection

