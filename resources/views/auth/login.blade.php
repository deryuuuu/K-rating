<x-guest-layout>
    <div class="max-w-md mx-auto my-20 p-8 bg-[#111111] border border-neutral-800 rounded-2xl shadow-2xl relative overflow-hidden">
        
        <!-- Red Accent Line -->
        <div class="absolute top-0 left-0 w-full h-1.5 bg-red-600"></div>

        <!-- Logo Custom Header Login -->
        <div class="text-center mb-8">
            @if(file_exists(public_path('images/logo.png')))
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-auto mx-auto mb-3">
            @else
                <div class="w-12 h-12 bg-red-600 text-white font-black text-2xl flex items-center justify-center rounded-xl mx-auto mb-3">K</div>
            @endif
            <h2 class="text-xl font-bold text-white uppercase tracking-widest">Portal Admin</h2>
            <p class="text-neutral-500 text-xs mt-1">Masukan akun pengawas untuk mengelola katalog.</p>
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block text-[10px] font-bold uppercase tracking-[0.2em] text-neutral-400 mb-2">Alamat Email</label>
                <input type="email" name="email" :value="old('email')" required autofocus class="w-full bg-[#080808] border border-neutral-800 text-white text-xs rounded-lg p-4 focus:border-red-600 focus:outline-none transition" placeholder="admin@krating.com">
            </div>

            <div>
                <label class="block text-[10px] font-bold uppercase tracking-[0.2em] text-neutral-400 mb-2">Kata Sandi / Password</label>
                <input type="password" name="password" required class="w-full bg-[#080808] border border-neutral-800 text-white text-xs rounded-lg p-4 focus:border-red-600 focus:outline-none transition" placeholder="••••••••">
            </div>

            <div class="flex items-center justify-between text-xs">
                <label class="flex items-center text-neutral-400">
                    <input type="checkbox" name="remember" class="bg-[#080808] border-neutral-800 text-red-600 focus:ring-0 rounded">
                    <span class="ml-2 text-[10px] uppercase tracking-wider font-semibold">Ingat Sesi Saya</span>
                </label>
            </div>

            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-[0.2em] py-4 rounded-lg transition shadow-lg shadow-red-600/30">
                Masuk Ke Dashboard
            </button>
        </form>
    </div>
</x-guest-layout>