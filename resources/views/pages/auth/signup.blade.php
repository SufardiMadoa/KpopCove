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

    <div class="relative flex items-center w-full justify-center h-screen">
        <!-- Background Image -->


        <!-- Login Form -->
        <div
            class="relative   py-12 shadow-md rounded-md overflow-hidden max-w-md w-full border border-slate-400 dark:bg-slate-50">
            <div class="absolute top-0 ">
                <div class="w-full h-20 bg-linen"></div>
                <svg class="w-screen h-full z-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#FAF0E6" fill-opacity="1"
                        d="M0,224L26.7,224C53.3,224,107,224,160,213.3C213.3,203,267,181,320,149.3C373.3,117,427,75,480,90.7C533.3,107,587,181,640,202.7C693.3,224,747,192,800,154.7C853.3,117,907,75,960,69.3C1013.3,64,1067,96,1120,101.3C1173.3,107,1227,85,1280,96C1333.3,107,1387,149,1413,170.7L1440,192L1440,0L1413.3,0C1386.7,0,1333,0,1280,0C1226.7,0,1173,0,1120,0C1066.7,0,1013,0,960,0C906.7,0,853,0,800,0C746.7,0,693,0,640,0C586.7,0,533,0,480,0C426.7,0,373,0,320,0C266.7,0,213,0,160,0C106.7,0,53,0,27,0L0,0Z">
                    </path>
                </svg>
            </div>
            <!-- Logo -->
            <div class="relative p-5 z-50 px-10">
                <h1 class="font-bold text-2xl text-center mb-5 dark:text-slate-950">TERRA SHOP</h1>

                <!-- Title -->
                <h2 class="text-center text-2xl  text-gray-800 mb-1">Enter your Account</h2>
                <p class="font-light text-center mb-4">Lorem ipsum dolor sit amet consectetur adipisicing.</p>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="mb-5 text-red-500 text-sm">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('signup') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="flex flex-col space-y-3">
                        <input
                            class="w-full text-sm rounded-lg border border-gray-300 p-4 leading-relaxed placeholder-gray-500 tracking-wide focus:ring-2 focus:ring-green-700 focus:outline-none"
                            type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
                        <input
                            class="w-full text-sm rounded-lg border border-gray-300 p-4 leading-relaxed placeholder-gray-500 tracking-wide focus:ring-2 focus:ring-green-700 focus:outline-none"
                            type="text" name="name" placeholder="Name" value="{{ old('name') }}" required />
                        <input
                            class="w-full text-sm rounded-lg border border-gray-300 p-4 leading-relaxed placeholder-gray-500 tracking-wide focus:ring-2 focus:ring-green-700 focus:outline-none"
                            type="password" name="password" placeholder="Password" required />
                        <input
                            class="w-full text-sm rounded-lg border border-gray-300 p-4 leading-relaxed placeholder-gray-500 tracking-wide focus:ring-2 focus:ring-green-700 focus:outline-none"
                            type="password" name="password_confirmation" placeholder="Confirm Password" required />
                    </div>
                    <button type="submit"
                        class="w-full bg-gray-950 rounded-md text-white py-3 hover:bg-green-800 transition duration-300 font-semibold">
                        Register
                    </button>
                </form>

                <!-- Signup Link -->
                <div class="mt-4 text-center text-sm text-gray-600">
                    Sudah memiliki akun?
                    <a href="{{ route('login.form') }}" class="font-semibold text-blue-600 hover:underline">Masuk
                        Sekarang</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
