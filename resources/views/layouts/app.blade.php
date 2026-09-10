<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Dashboard | k-rating</title>

    <!-- Typography: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #09090b;
            color: #f4f4f5;
        }
    </style>
</head>
<body class="font-sans antialiased bg-[#09090b] text-zinc-100 min-h-screen flex flex-col">
    <div class="min-h-screen bg-[#09090b]">
        
        <!-- Header Navigasi Admin Modern -->
        <nav class="bg-[#121215] border-b border-zinc-800/80 sticky top-0 z-50 backdrop-blur-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <div class="flex items-center gap-6">
                        
                        <!-- Logo K-Rating -->
                        <a href="{{ route('admin.cars.index') }}" class="flex items-center gap-3 group">
                            @if(file_exists(public_path('images/logo.png')))
                                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-9 w-auto object-contain">
                            @else
                                <div class="w-9 h-9 bg-red-600 text-white font-extrabold flex items-center justify-center rounded-lg text-base shadow-lg shadow-red-600/30">K</div>
                            @endif
                            <span class="font-black text-lg tracking-widest uppercase text-white">
                                K-RATING <span class="text-[9px] text-red-500 font-bold block leading-none tracking-widest mt-0.5">ADMIN PORTAL</span>
                            </span>
                        </a>

                        <!-- Menu Link -->
                        <div class="hidden sm:flex sm:space-x-3 ml-6">
                            <a href="{{ route('admin.cars.index') }}" class="text-xs font-bold uppercase tracking-wider px-4 py-2 bg-zinc-800/80 text-white border border-zinc-700/50 rounded-lg hover:border-red-600 transition">
                                Dashboard Mobil
                            </a>
                            <a href="{{ route('home') }}" target="_blank" class="text-xs font-bold uppercase tracking-wider px-4 py-2 text-zinc-400 hover:text-white transition flex items-center gap-1.5">
                                Pratinjau Web Utama ↗
                            </a>
                        </div>
                    </div>

                    <!-- Profile & Logout -->
                    <div class="hidden sm:flex sm:items-center">
                        <div class="flex items-center gap-3">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-zinc-300 bg-zinc-900 border border-zinc-800 px-3.5 py-2 rounded-lg">
                                {{ Auth::user()->name }}
                            </span>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-wider px-4 py-2 rounded-lg transition shadow-lg shadow-red-600/20">
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Dynamic Header Slot -->
        @if (isset($header))
            <header class="bg-[#0e0e11] border-b border-zinc-800/60 py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Main Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>