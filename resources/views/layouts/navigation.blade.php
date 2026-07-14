<nav class="w-64 bg-slate-900 text-white min-h-screen fixed left-0 top-0 p-4 flex flex-col">
    <div class="mb-8 font-bold text-lg px-2">
        <a href="{{ route('admin.dashboard') }}">Tukar Jasa Admin</a>
    </div>

    <div class="flex flex-col space-y-2 flex-grow">
        <a href="{{ route('admin.dashboard') }}" class="p-3 hover:bg-slate-700 rounded transition">Dashboard</a>
        <a href="{{ route('backoffice.pages.index') }}" class="p-3 hover:bg-slate-700 rounded transition">Manajemen Halaman</a>
        <a href="#" class="p-3 hover:bg-slate-700 rounded transition">Kelola Jasa</a>
    </div>

    <div class="mt-auto border-t border-slate-700 pt-4">
        @auth
            <div class="mb-4 px-2">
                <div class="font-medium text-sm truncate">{{ Auth::user()->name }}</div>
            </div>
            
            <a href="{{ route('profile.edit') }}" class="block px-2 text-gray-300 hover:text-white mb-2 text-sm">
                {{ __('Profile') }}
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-2 text-red-400 hover:text-red-300 text-sm">
                    {{ __('Log Out') }}
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block px-2 text-white hover:text-gray-300">Login</a>
        @endauth
    </div>
</nav>