<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-g">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mebel Rahayu') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">

    <!-- Scripts (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Menambahkan font custom ke Tailwind */
        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3,
        .font-display {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>

<body class="bg-stone-50 text-stone-800 antialiased">

    {{-- Bagian Navigasi --}}
    <header class="bg-white shadow-sm">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-display font-bold text-stone-900">
                Mebel Rahayu
            </a>
            <div>
                <a href="{{ route('home') }}" class="px-4 hover:text-stone-600">Beranda</a>
                <a href="{{ route('products.index') }}" class="px-4 hover:text-stone-600">Koleksi</a>
                <a href="#" class="px-4 hover:text-stone-600">Tentang Kami</a>
                <a href="#" class="px-4 hover:text-stone-600">Kontak</a>
            </div>
        </nav>
    </header>

    {{-- Konten Utama dari setiap halaman --}}
    <main>
        {{ $slot }}
    </main>

    {{-- Bagian Footer --}}
    <footer class="bg-white mt-16">
        <div class="container mx-auto px-6 py-8 text-center text-stone-600">
            <p>&copy; {{ date('Y') }} Mebel Rahayu. Semua Hak Cipta Dilindungi.</p>
            <p class="text-sm mt-2">Dibuat dengan ❤️ di Jepara</p>
        </div>
    </footer>

</body>

</html>
