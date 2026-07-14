<aside class="fixed left-0 top-0 h-screen w-[280px] bg-white border-r border-gray-200 z-40 hidden md:flex flex-col p-4">
    <div class="mb-8 px-2">
        <h1 class="text-lg font-black text-indigo-900">Tukar Jasa</h1>
        <p class="text-xs text-gray-400 mt-0.5">Admin Control Center</p>
    </div>

    <nav class="flex-1 space-y-1 overflow-y-auto">
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-semibold transition
                  {{ request()->routeIs('admin.dashboard') ? 'bg-purple-100 text-purple-700' : 'text-gray-600 hover:bg-gray-100' }}">
            <span class="material-symbols-outlined text-[20px]">dashboard</span> Dashboard
        </a>
        <a href="{{ route('backoffice.pengguna.index') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-semibold transition
                  {{ request()->routeIs('backoffice.pengguna.*') ? 'bg-purple-100 text-purple-700' : 'text-gray-600 hover:bg-gray-100' }}">
            <span class="material-symbols-outlined text-[20px]">group</span> Kelola Pengguna
        </a>
        <a href="{{ route('backoffice.kategori.index') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-semibold transition
                  {{ request()->routeIs('backoffice.kategori.*') ? 'bg-purple-100 text-purple-700' : 'text-gray-600 hover:bg-gray-100' }}">
            <span class="material-symbols-outlined text-[20px]">category</span> Kelola Kategori
        </a>
        <a href="{{ route('backoffice.transaksi.index') }}"
            class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-semibold transition
          {{ request()->routeIs('backoffice.transaksi.*') ? 'bg-purple-100 text-purple-700' : 'text-gray-600 hover:bg-gray-100' }}">
            <span class="material-symbols-outlined text-[20px]">receipt_long</span> Kelola Transaksi
        </a>
        <a href="{{ route('backoffice.pages.index') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-semibold transition
                  {{ request()->routeIs('backoffice.pages.*') ? 'bg-purple-100 text-purple-700' : 'text-gray-600 hover:bg-gray-100' }}">
            <span class="material-symbols-outlined text-[20px]">article</span> Kelola Halaman
        </a>
    </nav>

    <div class="mt-auto pt-4 border-t border-gray-100 space-y-1">
        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl mb-2">
            <div class="w-9 h-9 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold text-sm">
                {{ strtoupper(substr(Auth::user()->nama, 0, 1)) }}
            </div>
            <div class="overflow-hidden">
                <p class="text-sm font-semibold text-gray-800 truncate">{{ Auth::user()->nama }}</p>
                <p class="text-xs text-gray-400">Administrator</p>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-semibold text-red-500 hover:bg-red-50 transition">
                <span class="material-symbols-outlined text-[20px]">logout</span> Logout
            </button>
        </form>
    </div>
</aside>