<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div
        class="min-h-screen flex flex-col justify-center items-center bg-gray-100 dark:bg-gray-900 border-b border-gray-300 mx-auto">
        <p class="text-center text-2xl font-bold">ANDA TIDAK DAPAT MENGAKSES HALAMAN INI, SILAHKAN KEMBALI KE HALAMAN
            UTAMA</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="bg-red-600 rounded-md text-white py-3 px-4 mt-8 text-xl font-bold">Kembali</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
