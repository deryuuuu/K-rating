<x-guest-layout>
    <!-- Dynamic Hero Banner Section -->
    <section class="relative bg-gradient-to-b from-[#120303] via-[#0d0d0d] to-[#080808] border-b border-neutral-800/60 py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Hero Left: Typography & Copywriting -->
                <div class="lg:col-span-7 space-y-6">
                    <h1 class="text-3xl md:text-5xl font-extrabold text-white tracking-tight leading-tight">
                        Ulasan Mobil: <span class="text-red-600">Kami Mengendarainya Apa Adanya</span>
                    </h1>
                    <p class="text-neutral-400 text-xs md:text-sm font-light leading-relaxed max-w-xl">
                        Dapatkan ulasan jujur dan mendalam dari para ahli tentang semua kendaraan terbaru. Find your perfect car.
                    </p>

                    <!-- Filter / Search Control Card -->
                    <div class="bg-[#121212]/90 border border-neutral-800 p-4 rounded-xl shadow-2xl mt-8 backdrop-blur-md">
                        <form action="{{ route('home') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-4 gap-3">
                            <div>
                                <select name="brand" class="w-full bg-[#0a0a0a] border border-neutral-800 text-neutral-300 text-xs rounded-lg p-3 focus:border-red-600 focus:outline-none">
                                    <option value="">Pilih Brand</option>
                                    <option value="Porsche">Porsche</option>
                                    <option value="BMW">BMW</option>
                                    <option value="Mercedes-Benz">Mercedes-Benz</option>
                                </select>
                            </div>
                            <div>
                                <select name="model" class="w-full bg-[#0a0a0a] border border-neutral-800 text-neutral-300 text-xs rounded-lg p-3 focus:border-red-600 focus:outline-none">
                                    <option value="">Pilih Model</option>
                                    <option value="Sedan">Sedan</option>
                                    <option value="SUV">SUV</option>
                                    <option value="Sports">Sports</option>
                                </select>
                            </div>
                            <div>
                                <select name="year" class="w-full bg-[#0a0a0a] border border-neutral-800 text-neutral-300 text-xs rounded-lg p-3 focus:border-red-600 focus:outline-none">
                                    <option value="">2026</option>
                                    <option value="2025">2025</option>
                                    <option value="2024">2024</option>
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold text-xs rounded-lg py-3 transition flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                    <span>Cari Mobil</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Hero Right: Rounded Showcase Image -->
                <div class="lg:col-span-5">
                    <div class="relative rounded-2xl overflow-hidden border border-neutral-800 shadow-2xl group">
                        <img src="https://images.unsplash.com/photo-1614162692292-7ac56d7f7f1e?q=80&w=1000&auto=format&fit=crop" alt="Featured Car" class="w-full h-72 md:h-80 object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Latest Safety & Review Ratings Section -->
    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-bold text-white tracking-tight">Latest Safety & Review Ratings</h2>
            <p class="text-neutral-500 text-xs mt-2">Peringkat keamanan dan hasil pengujian performa k-rating terbaru.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($cars as $car)
                <div class="bg-[#111111] border border-neutral-800/80 rounded-xl overflow-hidden hover:border-red-600/50 transition duration-300 flex flex-col justify-between group">
                    <div class="p-4">
                        <!-- Image Container -->
                        <div class="relative h-48 bg-[#080808] rounded-lg overflow-hidden mb-4 border border-neutral-800">
                            @if($car->image)
                                <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-neutral-700 text-[10px] uppercase tracking-widest">
                                    No Image
                                </div>
                            @endif
                        </div>

                        <!-- Car Info -->
                        <div class="space-y-2">
                            <div class="flex justify-between items-center text-xs">
                                <span class="bg-neutral-900 border border-neutral-800 text-neutral-300 px-2.5 py-1 rounded text-[10px] font-semibold uppercase">2026</span>
                                <div class="flex text-red-600 text-xs tracking-tighter">
                                    ★★★★★
                                </div>
                            </div>
                            <h3 class="text-lg font-bold text-white tracking-wide uppercase pt-1">{{ $car->name }}</h3>
                            <p class="text-neutral-400 text-xs line-clamp-2 font-light leading-relaxed">{{ $car->description }}</p>
                        </div>
                    </div>

                    <!-- Button Action -->
                    <div class="p-4 pt-0">
                        <a href="{{ route('cars.show', $car->id) }}" class="block w-full text-center bg-neutral-900 hover:bg-red-600 text-white font-medium text-xs rounded-lg py-3 border border-neutral-800 hover:border-red-600 transition duration-300">
                            More Details
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-20 border border-dashed border-neutral-800 rounded-xl">
                    <p class="text-neutral-500 text-xs uppercase tracking-widest">Belum ada data unit mobil yang ditambahkan.</p>
                </div>
            @endforelse
        </div>
    </section>
</x-guest-layout>