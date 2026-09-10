<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K-RATING - Katalog Mobil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0b0b0e] text-white min-h-screen font-sans antialiased">

    <!-- Top Bar Tipis -->
    <div class="border-b border-zinc-800/60 bg-[#0d0d10] py-1.5 px-6 text-[10px] text-zinc-400 flex justify-between items-center">
        <div class="flex items-center gap-4">
            <span>KEPENTINGAN INDEPENDEN</span>
            <span>•</span>
            <span>DIPERBARUI {{ date('d/m/Y') }}</span>
        </div>
        <div>
            <span>K-RATING AUTO REVIEW</span>
        </div>
    </div>

    <!-- Header Navigation -->
    <header class="border-b border-zinc-800/80 bg-[#121215]/90 backdrop-blur sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}">
                    <!-- Ukuran Logo Diperbesar (h-14 md:h-20) -->
                    <img src="{{ asset('images/logo.png') }}" alt="K-RATING Logo" class="h-14 md:h-20 w-auto object-contain">
                </a>
            </div>
            <nav class="hidden md:flex items-center gap-8 text-xs font-bold uppercase tracking-wider text-zinc-400">
                <a href="{{ route('home') }}" class="text-white hover:text-red-500 transition">Katalog Mobil</a>
                <a href="#" class="hover:text-red-500 transition">Standard Penilaian</a>
                <a href="#" class="hover:text-red-500 transition">Tentang Kami</a>
            </nav>
            <div>
                @auth
                    <a href="{{ route('admin.cars.index') }}" class="bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase px-5 py-2.5 rounded-xl transition shadow-lg shadow-red-600/30">
                        Dashboard Admin
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase px-5 py-2.5 rounded-xl transition shadow-lg shadow-red-600/30">
                        Dashboard Admin
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Hero Section (Teks, Filter, dan Video) -->
    <section class="max-w-7xl mx-auto px-6 pt-10 pb-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            
            <div class="lg:col-span-7 flex flex-col justify-center">
                <h1 class="text-3xl md:text-5xl font-black uppercase tracking-tight leading-tight mb-3">
                    ULASAN MOBIL: <span class="text-red-600">KAMI MENGENDARAINYA APA ADANYA</span>
                </h1>
                <p class="text-zinc-400 text-xs md:text-sm mb-8">
                    Dapatkan ulasan jujur dan mendalam dari para ahli tentang semua kendaraan terbaru.
                </p>

                <form action="{{ route('home') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-4 gap-3 bg-[#121215] p-3 rounded-2xl border border-zinc-800 shadow-xl">
                    <select name="brand" class="bg-[#1a1a1e] text-zinc-200 text-xs font-semibold rounded-xl border border-zinc-800 focus:ring-red-600 focus:border-red-600 p-3">
                        <option value="">Semua Brand</option>
                        @foreach($brands as $b)
                            <option value="{{ $b }}" {{ request('brand') == $b ? 'selected' : '' }}>{{ strtoupper($b) }}</option>
                        @endforeach
                    </select>

                    <select name="model" class="bg-[#1a1a1e] text-zinc-200 text-xs font-semibold rounded-xl border border-zinc-800 focus:ring-red-600 focus:border-red-600 p-3">
                        <option value="">Semua Model</option>
                        @foreach($models as $m)
                            <option value="{{ $m }}" {{ request('model') == $m ? 'selected' : '' }}>{{ strtoupper($m) }}</option>
                        @endforeach
                    </select>

                    <select name="year" class="bg-[#1a1a1e] text-zinc-200 text-xs font-semibold rounded-xl border border-zinc-800 focus:ring-red-600 focus:border-red-600 p-3">
                        <option value="">Tahun</option>
                        @foreach($years as $y)
                            <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase rounded-xl p-3 transition flex items-center justify-center gap-1.5 shadow-lg shadow-red-600/30">
                        SEARCH
                    </button>
                </form>
            </div>

            <div class="lg:col-span-5">
                <div class="relative w-full h-72 lg:h-96 rounded-3xl overflow-hidden border border-zinc-800/80 shadow-2xl bg-zinc-900">
                    <video autoplay loop muted playsinline class="w-full h-full object-cover">
                        <source src="{{ asset('videos/hero.mp4') }}" type="video/mp4">
                        <source src="https://assets.mixkit.co/videos/preview/mixkit-sports-car-driving-on-a-road-at-sunset-41225-large.mp4" type="video/mp4">
                    </video>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0b0b0e]/60 via-transparent to-transparent"></div>
                </div>
            </div>

        </div>
    </section>

    <!-- Hasil Pencarian / Listing Mobil -->
    <section class="max-w-7xl mx-auto px-6 py-8">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-xl font-bold uppercase tracking-wider text-white">HASIL PENCARIAN MOBIL</h2>
                <p class="text-xs text-zinc-400">Daftar kendaraan sesuai kriteria filter pilihan Anda.</p>
            </div>
            @if(request()->anyFilled(['brand', 'model', 'year']))
                <a href="{{ route('home') }}" class="text-xs text-red-500 hover:underline font-bold">Reset Filter ✕</a>
            @endif
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($cars as $car)
                <div class="bg-[#121215] border border-zinc-800 rounded-2xl overflow-hidden hover:border-zinc-700 transition group flex flex-col justify-between">
                    <div>
                        <div class="relative h-48 bg-zinc-900 overflow-hidden">
                            @if($car->image)
                                <img src="{{ asset('storage/' . $car->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-zinc-600 text-xs font-bold uppercase">Tidak Ada Gambar</div>
                            @endif
                            <span class="absolute top-3 left-3 bg-red-600 text-white text-[10px] font-black uppercase px-2.5 py-1 rounded-md tracking-wider">
                                {{ $car->brand }}
                            </span>
                            @if($car->year)
                                <span class="absolute top-3 right-3 bg-black/70 backdrop-blur text-zinc-300 text-[10px] font-bold px-2 py-1 rounded-md">
                                    {{ $car->year }}
                                </span>
                            @endif
                        </div>

                        <div class="p-5">
                            <h3 class="text-lg font-bold text-white uppercase tracking-tight mb-1 group-hover:text-red-500 transition">
                                {{ $car->name }}
                            </h3>

                            <div class="flex items-center gap-1 my-3">
                                @php
                                    $starCount = $car->rating ? round($car->rating / 2) : 0;
                                @endphp

                                @if($car->rating)
                                    <div class="flex text-amber-400">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $starCount)
                                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                </svg>
                                            @else
                                                <svg class="w-4 h-4 text-zinc-700 fill-current" viewBox="0 0 20 20">
                                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                </svg>
                                            @endif
                                        @endfor
                                    </div>
                                    <span class="text-xs font-bold text-zinc-300 ml-1.5">({{ number_format($car->rating, 1) }})</span>
                                @else
                                    <span class="text-xs text-zinc-500 italic">Belum ada rating</span>
                                @endif
                            </div>

                            <p class="text-zinc-400 text-xs line-clamp-2 leading-relaxed">
                                {{ $car->description ?? 'Tidak ada deskripsi tersedia.' }}
                            </p>
                        </div>
                    </div>

                    <div class="p-5 pt-0">
                        <a href="{{ route('cars.show', $car->id) }}" class="block w-full text-center bg-zinc-800 hover:bg-zinc-700 text-white font-bold text-xs uppercase py-2.5 rounded-xl transition">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-[#121215] border border-zinc-800/80 rounded-2xl p-12 text-center">
                    <span class="text-3xl mb-3 block">⚠️</span>
                    <h3 class="text-lg font-bold text-white uppercase mb-1">Mobil Tidak Ditemukan</h3>
                    <p class="text-zinc-500 text-xs mb-4">Tidak ada kriteria mobil yang cocok dengan pencarian Anda.</p>
                    <a href="{{ route('home') }}" class="inline-block bg-zinc-800 hover:bg-zinc-700 text-white font-bold text-xs uppercase px-4 py-2 rounded-xl transition">
                        Lihat Semua Mobil
                    </a>
                </div>
            @endforelse
        </div>
    </section>

    <footer class="border-t border-zinc-800/80 py-8 text-center text-xs text-zinc-500">
        © {{ date('Y') }} K-RATING. All rights reserved.
    </footer>

</body>
</html>