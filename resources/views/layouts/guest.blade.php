<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'K-Rating') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,800,900&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-[#0a0a0c] text-white antialiased selection:bg-red-600 selection:text-white min-h-screen flex flex-col justify-between">

    <!-- Top Bar Info -->
    <div class="bg-[#121215] border-b border-zinc-800/80 py-2 px-6 text-[10px] font-mono tracking-wider text-zinc-400 flex justify-between items-center">
        <div>• EKSKLUSIF & STANDAR PENILAIAN RESMI K-RATING</div>
        <div class="hidden md:flex gap-6">
            <span>EVALUASI INDEPENDEN</span>
            <span>|</span>
            <span>INDONESIAN AUTOMOTIVE BENCHMARK</span>
        </div>
    </div>

    <!-- Main Navigation Header -->
    <header class="border-b border-zinc-800/80 bg-[#0a0a0c]/90 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            
            <!-- Logo (Sudah Diperbesar) -->
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <!-- Jika Pakai Gambar Logo -->
                <img src="{{ asset('images/logo.png') }}" class="h-12 md:h-14 w-auto object-contain" alt="K-Rating Logo" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                
                <!-- Fallback Text Logo Jika Gambar Belum Ada -->
                <div class="hidden items-center gap-2">
                    <span class="bg-red-600 text-white font-black text-xl px-3 py-1 rounded-lg uppercase tracking-widest shadow-lg shadow-red-600/40">K</span>
                    <span class="font-black text-xl text-white uppercase tracking-wider">RATING</span>
                </div>
            </a>

            <!-- Menu Navigation -->
            <nav class="hidden md:flex items-center gap-8 text-xs font-bold uppercase tracking-wider text-zinc-400">
                <a href="{{ route('home') }}" class="hover:text-white transition text-white">Katalog Mobil</a>
                <a href="#" class="hover:text-white transition">Standard Penilaian</a>
                <a href="#" class="hover:text-white transition">Tentang Kami</a>
            </nav>

            <!-- Dashboard Button -->
            <div>
                @auth
                    <a href="{{ route('admin.cars.index') }}" class="bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-wider px-5 py-2.5 rounded-xl transition shadow-lg shadow-red-600/30">
                        Dashboard Admin
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-zinc-800 hover:bg-zinc-700 text-white font-bold text-xs uppercase tracking-wider px-5 py-2.5 rounded-xl transition">
                        Masuk Admin
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Content Slot -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="border-t border-zinc-800/80 bg-[#0a0a0c] py-8 text-center text-xs text-zinc-500">
        <p>&copy; {{ date('Y') }} K-RATING. All rights reserved.</p>
    </footer>

</body>
</html>