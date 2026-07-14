<header class="sticky top-0 w-full h-16 bg-surface/80 backdrop-blur-md flex justify-between items-center px-margin-mobile md:px-margin-desktop z-30 border-b border-outline-variant/50">
    <h2 class="font-headline-sm text-headline-sm text-on-surface">
        {{ $title ?? 'Dashboard' }}
    </h2>
    <div class="flex items-center gap-lg">
        <a href="{{ route('user.search') }}" class="relative p-sm text-on-surface-variant hover:text-primary transition-colors">
            <span class="material-symbols-outlined">search</span>
        </a>
        <button class="relative p-sm text-on-surface-variant hover:text-primary transition-colors">
            <span class="material-symbols-outlined">notifications</span>
        </button>
    </div>
</header>