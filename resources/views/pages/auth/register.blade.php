<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Kpop Cove</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-400 via-purple-300 to-pink-200 relative overflow-hidden">
        <!-- Decorative elements -->
        
        
        <div class="max-w-md w-full p-8 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm rounded-2xl shadow-2xl z-10 transform transition-all duration-500 hover:scale-[1.02] my-8">
            <div class="text-center mb-6">
                
                <h1 class="text-4xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500">KPOP COVE</h1>
                <p class="mt-2 text-gray-600 font-medium">Bergabung Bersama Kami Sekarang!</p>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-400 text-red-500 p-4 rounded-lg mb-6">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('register') }}" method="POST" class="space-y-3">
                @csrf
                <div class="flex flex-col space-y-3">
                    <div class="transform transition-all duration-300 hover:translate-x-1">
                        <label for="email" class="block text-sm font-medium text-indigo-700 mb-1">Email</label>
                        <input
                            class="w-full text-sm rounded-lg border border-indigo-200 p-4 leading-relaxed placeholder-gray-500 tracking-wide focus:ring-2 focus:ring-indigo-400 bg-white bg-opacity-70 backdrop-filter backdrop-blur-sm"
                            type="email" id="email" name="email" placeholder="your@email.com" value="{{ old('email') }}" required />
                    </div>
                    
                    <div class="transform transition-all duration-300 hover:translate-x-1">
                        <label for="name" class="block text-sm font-medium text-indigo-700 mb-1">Name</label>
                        <input
                            class="w-full text-sm rounded-lg border border-indigo-200 p-4 leading-relaxed placeholder-gray-500 tracking-wide focus:ring-2 focus:ring-indigo-400 bg-white bg-opacity-70 backdrop-filter backdrop-blur-sm"
                            type="text" id="name" name="name" placeholder="Your name" value="{{ old('name') }}" required />
                    </div>
                    
                    <div class="transform transition-all duration-300 hover:translate-x-1">
                        <label for="password" class="block text-sm font-medium text-indigo-700 mb-1">Password</label>
                        <input
                            class="w-full text-sm rounded-lg border border-indigo-200 p-4 leading-relaxed placeholder-gray-500 tracking-wide focus:ring-2 focus:ring-indigo-400 bg-white bg-opacity-70 backdrop-filter backdrop-blur-sm"
                            type="password" id="password" name="password" placeholder="••••••••" required />
                    </div>
                    
                    <div class="transform transition-all duration-300 hover:translate-x-1">
                        <label for="password_confirmation" class="block text-sm font-medium text-indigo-700 mb-1">Confirm Password</label>
                        <input
                            class="w-full text-sm rounded-lg border border-indigo-200 p-4 leading-relaxed placeholder-gray-500 tracking-wide focus:ring-2 focus:ring-indigo-400 bg-white bg-opacity-70 backdrop-filter backdrop-blur-sm"
                            type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required />
                    </div>
                </div>
                
                <button type="submit"
                    class="w-full py-3 px-4 bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 hover:from-blue-600 hover:via-indigo-600 hover:to-purple-600 text-white font-bold rounded-lg transition duration-300 transform hover:-translate-y-1 hover:shadow-lg mt-4">
                    CREATE YOUR ACCOUNT
                </button>
            </form>

            <!-- Login Link -->
            <div class="text-center mt-6">
                <span class="text-gray-600">Awak Dah Punya Akun?</span>
                <a href="{{ route('login') }}" 
                    class="ml-1 font-bold text-indigo-600 hover:text-indigo-800 transition-colors duration-300">
                    Sign In Now
                </a>
            </div>
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