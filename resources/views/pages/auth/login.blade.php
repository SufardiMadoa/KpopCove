<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body class="">



    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-400 via-purple-300 to-pink-200 relative overflow-hidden">
        <!-- Decorative elements -->
       
        <div class="max-w-md w-full p-8 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm rounded-2xl shadow-2xl z-10 transform transition-all duration-500 hover:scale-[1.02]">
            <div class="text-center mb-8">
                <div class="flex justify-center mb-3">
                    <!-- Simple K-pop inspired logo -->
                    <svg class="w-12 h-12" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M50 10L65 30H35L50 10Z" fill="#4F46E5"/>
                        <path d="M65 30V70H35V30" fill="#6366F1"/>
                        <path d="M50 90L65 70H35L50 90Z" fill="#818CF8"/>
                        <circle cx="50" cy="50" r="15" fill="white"/>
                        <circle cx="50" cy="50" r="10" fill="#C4B5FD"/>
                    </svg>
                </div>
                <h1 class="text-4xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500">KPOP COVE</h1>
                <p class="mt-2 text-gray-600 font-medium">Masukan Akun Kpop Cove Anda</p>
            </div>
    
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-400 text-red-500 p-4 rounded-lg mb-6">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
              
                <div class="transform transition-all duration-300 hover:translate-x-1">
                    <label for="email" class="block text-sm font-medium text-indigo-700 mb-1">Email</label>
                    <input id="email" name="email" type="email" required 
                        class="w-full px-4 py-3 border border-indigo-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 bg-white bg-opacity-70 backdrop-filter backdrop-blur-sm" 
                        placeholder="your@email.com">
                </div>
                
                <div class="transform transition-all duration-300 hover:translate-x-1">
                    <label for="password" class="block text-sm font-medium text-indigo-700 mb-1">Password</label>
                    <input id="password" name="password" type="password" required 
                        class="w-full px-4 py-3 border border-indigo-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 bg-white bg-opacity-70 backdrop-filter backdrop-blur-sm" 
                        placeholder="••••••••">
                </div>

                  <div class="relative">
                    <label for="role" class="block text-slate-950 text-sm font-medium mb-2">Login sebagai:</label>
                    <select id="role" name="role" 
                            class="w-full px-3 py-2 bg-white bg-opacity-20 backdrop-blur-sm border border-white border-opacity-30 rounded text-slate-950 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 appearance-none cursor-pointer"
                            required>
                        <option value="" disabled {{ old('role') ? '' : 'selected' }} class=" text-slate-950">Pilih role...</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }} class=" text-slate-950">👨‍💼 Admin</option>
                        <option value="customer" {{ old('role') == 'customer' ? 'selected' : '' }} class=" text-slate-950">👤 Customer</option>
                    </select>
                 
                </div>
                
                <div>
                    <button type="submit" 
                        class="w-full py-3 px-4 bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 hover:from-blue-600 hover:via-indigo-600 hover:to-purple-600 text-white font-bold rounded-lg transition duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                        SIGN IN
                    </button>
                </div>
                
                <div class="text-center mt-8">
                    <span class="text-gray-600">Tak Dee Akunn?</span>
                    <a href="{{ route('register') }}" 
                        class="ml-1 font-bold text-indigo-600 hover:text-indigo-800 transition-colors duration-300">
                        Register!
                    </a>
                </div>
            </form>
        </div>
    </div>

    <style>
    .animate-blob {
        animation: blob 7s infinite;
    }
    @keyframes blob {
        0% {
            transform: translate(0px, 0px) scale(1);
        }
        33% {
            transform: translate(30px, -50px) scale(1.1);
        }
        66% {
            transform: translate(-20px, 20px) scale(0.9);
        }
        100% {
            transform: translate(0px, 0px) scale(1);
        }
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    .animation-delay-4000 {
        animation-delay: 4s;
    }
    </style>

</body>

</html>
