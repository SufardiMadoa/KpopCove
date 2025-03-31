@extends('layouts.app')

@section('title', 'Shop')

@section('content')
    <main class="mt-[80px]  relative w-full flex justify-center">
        <div class="w-full  bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Banner Section -->
            <div>
                <div class="h-16 w-full bg-slate-900"></div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#0f172b" fill-opacity="1"
                        d="M0,192L24,197.3C48,203,96,213,144,208C192,203,240,181,288,170.7C336,160,384,160,432,170.7C480,181,528,203,576,213.3C624,224,672,224,720,202.7C768,181,816,139,864,101.3C912,64,960,32,1008,64C1056,96,1104,192,1152,218.7C1200,245,1248,203,1296,154.7C1344,107,1392,53,1416,26.7L1440,0L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z">
                    </path>
                </svg>
            </div>

            <!-- Profile Section -->
            <form id="profileForm" action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col items-center relative px-32 -translate-y-32">
                <!-- Avatar Section -->
                <div class=" absolute top-[-100px] left-[155px] text-center">
                    <label for="avatarInput" class="cursor-pointer relative">
                        <img id="avatarPreview" class="h-56 object-cover w-56 border-8 border-white rounded-full"
                            src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('images/produk.png') }}"
                            alt="Profile Image">
                        <div class="absolute bottom-0 right-5 bg-gray-200 p-1 rounded-full hidden" id="iconedit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 48 48"
                                id="Camera-1--Streamline-Plump-Remix" height="28" width="28">
                                <desc>Camera 1 Streamline Icon: https://streamlinehq.com</desc>
                                <g id="camera-1--photos-picture-camera-photography-photo-pictures">
                                    <path id="Union" fill="#000000" fill-rule="evenodd"
                                        d="M24 2.5c-1.9427 0 -3.5629 0.07923 -4.793 0.17178 -2.363 0.17778 -4.3047 1.65924 -5.2811 3.66654L12.853 8.54401c-1.9541 0.07272 -3.60775 0.15796 -4.96175 0.24123 -3.62631 0.22304 -6.52814 3.00296 -6.85862 6.63676C0.76867 18.3245 0.5 22.3904 0.5 26.925s0.26867 8.6005 0.53263 11.503c0.33048 3.6338 3.2323 6.4137 6.85861 6.6368C11.3271 45.2761 16.692 45.5 24 45.5s12.6729 -0.2239 16.1088 -0.4352c3.6263 -0.2231 6.5281 -3.003 6.8586 -6.6368 0.2639 -2.9024 0.5326 -6.9684 0.5326 -11.503s-0.2687 -8.6006 -0.5326 -11.503c-0.3305 -3.6338 -3.2323 -6.41372 -6.8586 -6.63675 -1.354 -0.08328 -3.0077 -0.16852 -4.9617 -0.24124l-1.0729 -2.20569c-0.9765 -2.0073 -2.9182 -3.48876 -5.2812 -3.66654C27.5629 2.57923 25.9427 2.5 24 2.5Zm-4.4929 4.1605C20.6458 6.57483 22.1657 6.5 24 6.5c1.8344 0 3.3542 0.07483 4.4929 0.1605 0.8124 0.06112 1.5703 0.57658 1.9842 1.42751l1.5993 3.28779c0.3246 0.6674 0.9921 1.1001 1.7338 1.1241 2.45 0.0793 4.4671 0.1803 6.053 0.2778 1.6767 0.1031 2.971 1.3613 3.1206 3.0066 0.2561 2.8164 0.5162 6.7573 0.5162 11.1407 0 4.3834 -0.2601 8.3243 -0.5162 11.1407 -0.1496 1.6453 -1.4439 2.9035 -3.1206 3.0066 -3.3539 0.2063 -8.637 0.4277 -15.8632 0.4277s-12.5093 -0.2214 -15.8632 -0.4277c-1.67671 -0.1031 -2.97098 -1.3613 -3.12061 -3.0066C4.76005 35.2492 4.5 31.3084 4.5 26.925c0 -4.3834 0.26005 -8.3243 0.51619 -11.1407 0.14963 -1.6453 1.4439 -2.9035 3.12061 -3.0066 1.58587 -0.0975 3.603 -0.1985 6.053 -0.2778 0.7417 -0.024 1.4092 -0.4567 1.7338 -1.1241l1.5993 -3.28779c0.4139 -0.85093 1.1718 -1.36639 1.9842 -1.42751ZM14 26.5c0 -5.5228 4.4772 -10 10 -10s10 4.4772 10 10 -4.4772 10 -10 10 -10 -4.4772 -10 -10Z"
                                        clip-rule="evenodd" stroke-width="1"></path>
                                </g>
                            </svg>
                        </div>
                    </label>
                    <input type="file" id="avatarInput" class="hidden" accept="image/*" name="profile_photo">
                    <div class="mt-3 text-start">
                        <h2 class="text-4xl font-semibold">{{ $user->name }}</h2>
                        <p class="flex items-center text-gray-400 text-lg mt-1">
                            {{ $user->address }}
                        </p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex space-x-3 mt-4 absolute bottom-16 right-40">
                    <button type="button" id="editBtn"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                        Update Profile
                    </button>
                </div>

                <!-- Profile Form -->
                <div class="w-full px-6 py-4 mt-60 h-96">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-2 gap-4 text-gray-700">
                        <div>
                            <label class="font-semibold">Username</label>
                            <input type="text" name="name" id="username" class="w-full border rounded p-2"
                                value="{{ $user->name }}" disabled>
                        </div>
                        <div>
                            <label class="font-semibold">Email</label>
                            <input type="email" name="email" id="email" class="w-full border rounded p-2"
                                value="{{ $user->email }}" disabled>
                        </div>
                        <div>
                            <label class="font-semibold">Alamat</label>
                            <input type="text" name="address" id="alamat" class="w-full border rounded p-2"
                                value="{{ $user->address }}" disabled>
                        </div>
                        <div>
                            <label class="font-semibold">Phone</label>
                            <input type="text" name="phone" id="phone" class="w-full border rounded p-2"
                                value="{{ $user->phone }}" disabled>
                        </div>
                        <div>
                            <label class="font-semibold">Tanggal Lahir</label>
                            <input type="date" name="birth_date" id="dob" class="w-full border rounded p-2"
                                value="{{ $user->birth_date }}" disabled>
                        </div>
                        <div>
                            <label class="font-semibold">Jenis Kelamin</label>
                            <select id="gender" name="gender" class="text-gray-500 w-full border rounded p-2" disabled>
                                <option value="" disabled {{ !$user->gender ? 'selected' : '' }}>Pilih Gender</option>
                                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex gap-3 mt-5">
                        <button type="submit" id="saveBtn"
                            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300 hidden">
                            Simpan Perubahan
                        </button>
                        <button type="button" id="cancelBtn"
                            class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-300 hidden">
                            Batal
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        document.getElementById('editBtn').addEventListener('click', function() {
            // Enable all input fields
            document.querySelectorAll('#profileForm input').forEach(input => input.removeAttribute('disabled'));
            document.querySelectorAll('#profileForm select').forEach(input => input.removeAttribute('disabled'));

            // Show save and cancel buttons, hide edit button
            document.getElementById('saveBtn').classList.remove('hidden');
            document.getElementById('cancelBtn').classList.remove('hidden');
            this.classList.add('hidden');

            // Show avatar input and edit icon
            document.getElementById('iconedit').classList.remove('hidden');
        });

        document.getElementById('cancelBtn').addEventListener('click', function() {
            // Disable all input fields
            document.querySelectorAll('#profileForm input').forEach(input => input.setAttribute('disabled', true));

            // Show edit button, hide save and cancel buttons
            document.getElementById('editBtn').classList.remove('hidden');
            document.getElementById('saveBtn').classList.add('hidden');
            this.classList.add('hidden');

            // Hide avatar input and edit icon
            document.getElementById('iconedit').classList.add('hidden');
        });

        document.getElementById('avatarInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('avatarPreview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
