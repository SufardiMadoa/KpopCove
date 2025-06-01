<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> -->
    <title>Document</title>
    @vite('resources/css/app.css')

</head>

<body>
    <x-dashboard.sidebar></x-dashboard.sidebar>
    <x-dashboard.header>{{ $title }}</x-dashboard.header>
    <div class="py-2 px-3 sm:ml-64 bg-gray-100 ">

        <div class="p-3 border-2 border-gray-200 border-dashed rounded-lg :border-gray-700 ">
            {{ $slot }}


        </div>
    </div>

</body>

</html>
