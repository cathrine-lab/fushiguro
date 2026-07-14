{{-- Resources/Views/User/Partials/header.blade.php --}}
<header class="fixed top-0 left-0 w-full h-16 bg-surface z-50 border-b border-outline-variant shadow-sm flex items-center justify-between px-margin-mobile md:px-margin-desktop">
    
    {{-- Left: Logo & Main Navigation --}}
    <div class="flex items-center gap-xl">
        {{-- Logo Tukar Jasa --}}
        <a href="{{ route('user.dashboard') }}" class="font-headline-md text-headline-md font-bold text-primary whitespace-nowrap">
            Tukar Jasa
        </a>
        <nav class="hidden md:flex items-center gap-lg ml-4">
            {{-- HOME / DASHBOARD --}}
            @php
                $isHome = request()->routeIs('user.dashboard');
            @endphp
            <a class="font-body-md text-body-md pb-0.5 transition-colors {{ $isHome ? 'font-bold border-b-2 border-primary text-primary transition-colors' : 'text-on-surface-variant hover:text-primary' }}" 
               href="{{ route('user.dashboard') }}">
                Home
            </a>

            {{-- EXPLORE --}}
            @php
                $isExplore = request()->routeIs('user.jasa.browse') || request()->routeIs('user.jasa.show');
            @endphp
            <a class="font-body-md text-body-md pb-0.5 transition-colors {{ $isExplore ? 'font-bold border-b-2 border-primary text-primary transition-colors' : 'text-on-surface-variant hover:text-primary' }}" 
               href="{{ route('user.jasa.browse') }}">
                Explore
            </a>
            
            {{-- ABOUT US --}}
            @php
                $isAbout = request()->routeIs('user.about.');
            @endphp
            <a class="font-body-md text-body-md pb-0.5 transition-colors {{ $isAbout ? 'font-bold border-b-2 border-primary text-primary transition-colors' : 'text-on-surface-variant hover:text-primary' }}" 
               href="#">
                About Us
            </a>
        </nav>
    </div>

    {{-- Right: Actions & Profile --}}
    <div class="flex items-center gap-md">
        {{-- Wallet Icon --}}
        <a href="{{ route('user.wallet.index') }}" class="p-2 text-on-surface-variant hover:bg-surface-container rounded-full transition-colors" title="Wallet">
            <span class="material-symbols-outlined">account_balance_wallet</span>
        </a>

        {{-- Notification Icon --}}
        <a href="{{ route('user.transaksi.index') }}" class="p-2 text-on-surface-variant hover:bg-surface-container rounded-full transition-colors relative" title="Notifications">
            <span class="material-symbols-outlined">notifications</span>
            @php
                $pendingCount = \App\Models\Transaksi::where('id_penyedia_jasa', Auth::id())
                    ->where('status', 'pending')->count();
            @endphp
            @if($pendingCount > 0)
                <span class="absolute top-1 right-1 w-2 h-2 bg-error rounded-full"></span>
            @endif
        </a>

        {{-- Divider --}}
        <div class="h-8 w-[1px] bg-outline-variant mx-1 hidden sm:block"></div>

        {{-- User Profile Mini --}}
        <a href="{{ route('user.profil.show', Auth::id()) }}" class="flex items-center gap-sm hover:bg-surface-container rounded-full pr-2 py-1 transition-colors">
            <div class="w-9 h-9 rounded-full primary-gradient flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                {{ strtoupper(substr(Auth::user()->nama, 0, 1)) }}
            </div>
            <div class="hidden lg:block leading-tight"></div>
        </a>
    </div>
</header>