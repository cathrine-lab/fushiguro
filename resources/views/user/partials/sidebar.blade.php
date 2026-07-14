<aside class="fixed left-0 top-16 h-[calc(100vh-64px)] w-[280px] bg-surface-container-lowest border-r border-outline-variant flex flex-col p-md z-30 hidden md:flex overflow-y-auto">

    <div class="flex items-center gap-md p-md mb-xl bg-surface-container rounded-xl">
        <div class="w-12 h-12 rounded-full primary-gradient flex items-center justify-center font-bold text-white text-lg flex-shrink-0">
            {{ strtoupper(substr(Auth::user()->nama, 0, 1)) }}
        </div>
        <div class="overflow-hidden">
            <p class="font-label-md text-label-md text-on-surface truncate">{{ Auth::user()->nama }}</p>
            <p class="font-label-sm text-label-sm text-on-surface-variant">Member &bull; {{ Auth::user()->poin }} pts</p>
        </div>
    </div>

    {{-- Tombol Post Service --}}
    <a href="{{ route('user.jasa.create') }}"
       class="primary-gradient text-white font-label-md py-md px-lg rounded-xl mb-xl transition-transform active:scale-95 flex items-center justify-center gap-sm shadow-sm hover:shadow-md">
        <span class="material-symbols-outlined text-[20px]">add_circle</span>
        Post a Service
    </a>

    {{-- Navigasi Utama --}}
    <nav class="flex-1 space-y-base">
        <a class="flex items-center gap-md px-md py-sm rounded-lg font-label-md transition-all
            {{ request()->routeIs('user.dashboard') ? 'bg-secondary-container text-on-secondary-container' : 'text-on-surface-variant hover:bg-surface-container-high' }}"
           href="{{ route('user.dashboard') }}">
            <span class="material-symbols-outlined">dashboard</span> Dashboard
        </a>
        
        <a class="flex items-center gap-md px-md py-sm rounded-lg font-label-md transition-all
            {{ request()->routeIs('user.jasa.browse') || request()->routeIs('user.jasa.show') ? 'bg-secondary-container text-on-secondary-container' : 'text-on-surface-variant hover:bg-surface-container-high' }}"
           href="{{ route('user.jasa.browse') }}">
            <span class="material-symbols-outlined">explore</span> Explore
        </a>
        
        <a class="flex items-center gap-md px-md py-sm rounded-lg font-label-md transition-all
            {{ request()->routeIs('user.transaksi.*') ? 'bg-secondary-container text-on-secondary-container' : 'text-on-surface-variant hover:bg-surface-container-high' }}"
           href="{{ route('user.transaksi.index') }}">
            <span class="material-symbols-outlined">swap_horiz</span> Transaksi
        </a>

        <a class="flex items-center gap-md px-md py-sm rounded-lg font-label-md transition-all
            {{ request()->routeIs('user.wallet.*') ? 'bg-secondary-container text-on-secondary-container' : 'text-on-surface-variant hover:bg-surface-container-high' }}"
           href="{{ route('user.wallet.index') }}">
            <span class="material-symbols-outlined">payments</span> Poin
        </a>
        
        {{-- Settings mengarah ke Profil User --}}
        <a class="flex items-center gap-md px-md py-sm rounded-lg font-label-md transition-all
            {{ request()->routeIs('user.profil.show') ? 'bg-secondary-container text-on-secondary-container' : 'text-on-surface-variant hover:bg-surface-container-high' }}"
           href="{{ route('user.profil.show', Auth::id()) }}">
            <span class="material-symbols-outlined">settings</span> Settings
        </a>
    </nav>

    {{-- Footer Sidebar --}}
    <div class="mt-auto space-y-base pt-xl border-t border-outline-variant">
        <a class="flex items-center gap-md px-md py-sm text-on-surface-variant hover:bg-surface-container-high rounded-lg font-label-md transition-all"
           href="{{ route('user.search') }}">
            <span class="material-symbols-outlined">help</span> Help Center
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center gap-md px-md py-sm text-on-surface-variant hover:bg-surface-container-high rounded-lg font-label-md transition-all">
                <span class="material-symbols-outlined">logout</span> Logout
            </button>
        </form>
    </div>
</aside>