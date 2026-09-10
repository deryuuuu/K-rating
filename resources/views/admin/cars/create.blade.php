<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white uppercase tracking-wider">
            Tambah Mobil & Rating
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#121215] border border-zinc-800 rounded-2xl p-8 shadow-2xl">
                <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-xs font-bold text-zinc-400 uppercase mb-2">Brand Mobil</label>
                        <input type="text" name="brand" placeholder="Contoh: Honda" value="{{ old('brand') }}" required class="w-full bg-[#1a1a1e] border border-zinc-800 rounded-xl p-3 text-white text-sm focus:ring-red-600 focus:border-red-600">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-zinc-400 uppercase mb-2">Nama / Model Mobil</label>
                        <input type="text" name="name" placeholder="Contoh: S2000" value="{{ old('name') }}" required class="w-full bg-[#1a1a1e] border border-zinc-800 rounded-xl p-3 text-white text-sm focus:ring-red-600 focus:border-red-600">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-zinc-400 uppercase mb-2">Tahun Rilis</label>
                            <input type="number" name="year" placeholder="2021" value="{{ old('year') }}" required class="w-full bg-[#1a1a1e] border border-zinc-800 rounded-xl p-3 text-white text-sm focus:ring-red-600 focus:border-red-600">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-zinc-400 uppercase mb-2">Rating (Skala 1 - 10)</label>
                            <input type="number" step="0.1" min="0" max="10" name="rating" placeholder="Contoh: 8.5" value="{{ old('rating') }}" class="w-full bg-[#1a1a1e] border border-zinc-800 rounded-xl p-3 text-white text-sm focus:ring-red-600 focus:border-red-600">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-zinc-400 uppercase mb-2">Deskripsi / Ulasan</label>
                        <textarea name="description" rows="4" class="w-full bg-[#1a1a1e] border border-zinc-800 rounded-xl p-3 text-white text-sm focus:ring-red-600 focus:border-red-600">{{ old('description') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-zinc-400 uppercase mb-2">Foto Mobil</label>
                        <input type="file" name="image" class="w-full text-xs text-zinc-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-zinc-800 file:text-white hover:file:bg-zinc-700">
                    </div>

                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold text-sm uppercase py-3 rounded-xl transition shadow-lg shadow-red-600/30">
                        Simpan Data Mobil
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>