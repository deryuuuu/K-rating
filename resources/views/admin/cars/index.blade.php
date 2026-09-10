<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-white uppercase tracking-wider">
                Kelola Data Mobil
            </h2>
            <a href="{{ route('admin.cars.create') }}" class="bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase px-5 py-2.5 rounded-xl transition shadow-lg shadow-red-600/30">
                + Tambah Mobil
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#121215] border border-zinc-800 rounded-2xl overflow-hidden shadow-2xl">
                <table class="w-full text-left text-xs text-zinc-400">
                    <thead class="bg-[#1a1a1e] text-zinc-300 uppercase text-[10px] tracking-wider border-b border-zinc-800">
                        <tr>
                            <th class="py-4 px-6">Gambar</th>
                            <th class="py-4 px-6">Brand</th>
                            <th class="py-4 px-6">Model / Nama</th>
                            <th class="py-4 px-6">Tahun</th>
                            <th class="py-4 px-6">Rating</th>
                            <th class="py-4 px-6 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800/60">
                        @forelse($cars as $car)
                            <tr class="hover:bg-zinc-900/50 transition">
                                <td class="py-3 px-6">
                                    @if($car->image)
                                        <img src="{{ asset('storage/' . $car->image) }}" class="w-12 h-12 object-cover rounded-lg border border-zinc-800">
                                    @else
                                        <div class="w-12 h-12 bg-zinc-800 rounded-lg flex items-center justify-center text-[10px]">No Img</div>
                                    @endif
                                </td>
                                <td class="py-3 px-6 font-bold text-red-500 uppercase">{{ $car->brand }}</td>
                                <td class="py-3 px-6 font-bold text-white uppercase">{{ $car->name }}</td>
                                <td class="py-3 px-6 text-zinc-300 font-mono">{{ $car->year ?? 'KOSONG' }}</td>
                                <td class="py-3 px-6 font-bold text-amber-400">⭐ {{ $car->rating ?? '-' }}</td>
                                <td class="py-3 px-6 flex justify-center gap-2">
                                    <a href="{{ route('cars.show', $car->id) }}" class="bg-zinc-800 hover:bg-zinc-700 text-white px-3 py-1.5 rounded-lg text-[10px] font-bold uppercase transition">
                                        Pratinjau
                                    </a>
                                    <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus mobil ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-950 hover:bg-red-600 text-red-400 hover:text-white px-3 py-1.5 rounded-lg text-[10px] font-bold uppercase transition border border-red-800/50">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-8 text-center text-zinc-500">
                                    Belum ada data mobil. Silakan klik tombol **+ Tambah Mobil**.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>