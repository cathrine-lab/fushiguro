{{-- Resources/Views/User/Partials/footer.blade.php --}}
<footer class="w-full py-xl px-margin-mobile md:px-margin-desktop md:ml-[280px] grid grid-cols-1 md:grid-cols-4 gap-gutter bg-surface-container-lowest border-t border-outline-variant mt-auto">
    <div class="flex flex-col gap-md">
        <span class="font-headline-md text-headline-md font-bold text-on-surface">Tukar Jasa</span>
        <p class="text-on-surface-variant font-body-sm text-body-sm max-w-[280px]">
            The premier community-driven marketplace for professional skill-sharing and collaboration.
        </p>
    </div>
    
    <div class="flex flex-col gap-sm">
        <h4 class="font-label-md text-label-md text-primary mb-sm">Resources</h4>
        <a class="text-on-surface-variant font-body-sm text-body-sm hover:text-secondary transition-colors" href="#">Privacy Policy</a>
        <a class="text-on-surface-variant font-body-sm text-body-sm hover:text-secondary transition-colors" href="#">Terms of Service</a>
        <a class="text-on-surface-variant font-body-sm text-body-sm hover:text-secondary transition-colors" href="#">Cookie Policy</a>
    </div>
    
    <div class="flex flex-col gap-sm">
        <h4 class="font-label-md text-label-md text-primary mb-sm">Community</h4>
        <a class="text-on-surface-variant font-body-sm text-body-sm hover:text-secondary transition-colors" href="#">Community Guidelines</a>
        <a class="text-on-surface-variant font-body-sm text-body-sm hover:text-secondary transition-colors" href="{{ route('user.search') }}">Support</a>
    </div>
    
    <div class="flex flex-col gap-sm">
        <h4 class="font-label-md text-label-md text-primary mb-sm">Connect</h4>
        <div class="flex gap-md">
            <span class="material-symbols-outlined text-on-surface-variant hover:text-primary cursor-pointer transition-colors">public</span>
            <span class="material-symbols-outlined text-on-surface-variant hover:text-primary cursor-pointer transition-colors">mail</span>
            <span class="material-symbols-outlined text-on-surface-variant hover:text-primary cursor-pointer transition-colors">share</span>
        </div>
        <p class="text-on-surface-variant font-body-sm text-body-sm mt-md">
            © {{ date('Y') }} Tukar Jasa Skill Exchange. All rights reserved.
        </p>
    </div>
</footer>