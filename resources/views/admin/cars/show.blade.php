<x-guest-layout>
    <section class="py-12 px-6 max-w-5xl mx-auto">
        <a href="{{ url()->previous() }}" class="inline-flex items-center text-xs text-zinc-400 hover:text-white mb-6 transition">
            ← Kembali
        </a>

        <div class="bg-[#121215] border border-zinc-800 rounded-2xl overflow-hidden shadow-2xl grid grid-cols-1 md:grid-cols-2 gap-8 p-6 md:p-8">
            <div class="bg-zinc-900 rounded-xl overflow-hidden h-72 md:h-full relative border border-zinc-800">
                @if($car->image)
                    <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center text-zinc-600 text-xs font-bold uppercase">No Image</div>
                @endif
                <span class="absolute top-3 left-3 bg-red-600 text-white font-mono text-xs font-bold px-3 py-1 rounded-md">
                    {{ $car->year ?? 'N/A' }}
                </span>
            </div>

            <div class="flex flex-col justify-between">
                <div>
                    <span class="text-xs font-bold uppercase text-red-500 tracking-widest block mb-1">{{ $car->brand }}</span>
                    <h1 class="text-3xl font-black text-white uppercase tracking-wider mb-4">{{ $car->name }}</h1>
                    <div class="border-t border-zinc-800 pt-4">
                        <h3 class="text-xs font-bold uppercase text-zinc-400 tracking-wider mb-2">Deskripsi Detail</h3>
                        <p class="text-zinc-300 text-sm leading-relaxed whitespace-pre-line">
                            {{ $car->description ?? 'Belum ada deskripsi yang ditambahkan untuk mobil ini.' }}
                        </p>
                    </div>
                </div>

                <div class="mt-8 pt-4 border-t border-zinc-800 flex justify-between items-center text-xs text-zinc-500">
                    <span>ID Mobil: #{{ $car->id }}</span>
                    <span>Tahun Rilis: {{ $car->year }}</span>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>