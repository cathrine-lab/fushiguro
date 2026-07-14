<!DOCTYPE html>
<html class="light" lang="en">
<head>
    @include('user.partials.head', ['pageTitle' => 'Edit Profile | Tukar Jasa'])
    
    <style>
        .form-input {
            @apply w-full px-4 py-3 bg-surface-container-low border border-outline-variant rounded-xl 
                   text-on-surface font-body-sm focus:outline-none focus:ring-2 focus:ring-primary/20 
                   focus:border-primary transition-all placeholder:text-on-surface-variant/50;
        }
        .form-label {
            @apply block font-label-md text-on-surface mb-2 font-medium;
        }
        .surface-card {
            background: #ffffff;
            border: 1px solid #E2E8F0;
            box-shadow: 0 4px 6px -1px rgba(31, 16, 142, 0.05);
        }
    </style>
</head>
<body class="font-body-md text-on-surface bg-background flex flex-col min-h-screen">
    
    {{-- Sidebar User --}}
    @include('user.partials.sidebar')
    
    {{-- Main Content --}}
    <main class="md:ml-[280px] min-h-screen pt-16 pb-3xl flex-1">
        
        {{-- Header Global --}}
        @include('user.partials.header', ['title' => 'Edit Profile'])
        
        {{-- Container Centered agar rapi --}}
        <div class="max-w-4xl mx-auto px-margin-mobile md:px-margin-desktop mt-xl">
            
            {{-- Breadcrumbs --}}
            <nav class="flex items-center gap-xs text-on-surface-variant font-label-sm text-label-sm mb-lg">
                <a class="hover:text-primary transition-colors" href="{{ route('user.profil.show', Auth::id()) }}">My Profile</a>
                <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                <span class="text-primary font-bold">Edit Information</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-lg">
                
                {{-- Left Column: Form --}}
                <div class="lg:col-span-8 space-y-lg">
                    
                    {{-- Profile Information Card --}}
                    <div class="surface-card rounded-2xl p-xl md:p-2xl">
                        <h2 class="font-headline-sm text-headline-sm text-primary mb-lg flex items-center gap-sm">
                            <span class="material-symbols-outlined text-[24px]">person</span>
                            Profile Information
                        </h2>
                        
                        <form method="post" action="{{ route('user.profile.update') }}" class="space-y-xl">
                            @csrf
                            @method('patch')

                            {{-- Nama --}}
                            <div>
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input id="nama" name="nama" type="text" 
                                    class="form-input @error('nama') border-error focus:ring-error/20 focus:border-error @enderror" 
                                    value="{{ old('nama', $user->nama) }}" required autofocus autocomplete="name" />
                                @error('nama')
                                    <p class="mt-2 font-label-sm text-error flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[16px]">error</span> {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div>
                                <label for="email" class="form-label">Email Address</label>
                                <input id="email" name="email" type="email" 
                                    class="form-input @error('email') border-error focus:ring-error/20 focus:border-error @enderror" 
                                    value="{{ old('email', $user->email) }}" required autocomplete="username" />
                                @error('email')
                                    <p class="mt-2 font-label-sm text-error flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[16px]">error</span> {{ $message }}
                                    </p>
                                @enderror
                                
                                {{-- Verifikasi Email (Kondisional) --}}
                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <div class="mt-4 p-md bg-amber-50 border border-amber-200 rounded-xl flex gap-sm">
                                        <span class="material-symbols-outlined text-amber-600 text-[20px] flex-shrink-0">warning</span>
                                        <div>
                                            <p class="font-label-sm text-amber-800 mb-1 font-medium">Your email address is unverified.</p>
                                            <form method="post" action="{{ route('verification.send') }}">
                                                @csrf
                                                <button type="submit" class="font-label-sm text-amber-700 hover:text-amber-900 underline">
                                                    Click here to re-send the verification email.
                                                </button>
                                            </form>
                                            @if (session('status') === 'verification-link-sent')
                                                <p class="mt-2 font-label-sm text-green-600 flex items-center gap-1">
                                                    <span class="material-symbols-outlined text-[16px]">check_circle</span>
                                                    A new verification link has been sent.
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>

                            {{-- No. HP & Alamat dalam Grid 2 Kolom --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-xl">
                                <div>
                                    <label for="no_hp" class="form-label">Nomor Telepon</label>
                                    <input id="no_hp" name="no_hp" type="tel" 
                                        class="form-input @error('no_hp') border-error focus:ring-error/20 focus:border-error @enderror" 
                                        value="{{ old('no_hp', $user->no_hp) }}" autocomplete="tel" />
                                    @error('no_hp')
                                        <p class="mt-2 font-label-sm text-error">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="alamat" class="form-label">Alamat Lengkap</label>
                                    <textarea id="alamat" name="alamat" rows="1" 
                                        class="form-input resize-none @error('alamat') border-error focus:ring-error/20 focus:border-error @enderror" 
                                        autocomplete="street-address">{{ old('alamat', $user->alamat) }}</textarea>
                                    @error('alamat')
                                        <p class="mt-2 font-label-sm text-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Action Buttons --}}
                            <div class="flex items-center gap-6 pt-lg border-t border-outline-variant/50 mt-xl">
                                <button type="submit" 
                                    class="primary-gradient text-white px-xl py-md rounded-xl font-label-md shadow-md hover:scale-[0.98] active:scale-95 transition-all flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[20px]">save</span>
                                    Save Changes
                                </button>
                                
                                @if (session('status') === 'profile-updated')
                                    <p x-data="{ show: true }"
                                       x-show="show"
                                       x-transition
                                       x-init="setTimeout(() => show = false, 3000)"
                                       class="font-label-sm text-primary flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[18px]">check_circle</span>
                                        Berhasil disimpan!
                                    </p>
                                @endif
                            </div>
                        </form>
                    </div>

                    {{-- Delete Account Card --}}
                    <div class="surface-card rounded-2xl p-xl md:p-2xl border-l-4 border-l-error bg-error-container/10">
                        <h2 class="font-headline-sm text-headline-sm text-error mb-md flex items-center gap-sm">
                            <span class="material-symbols-outlined">delete_forever</span>
                            Delete Account
                        </h2>
                        <p class="font-body-sm text-on-surface-variant mb-lg max-w-2xl leading-relaxed">
                            Once your account is deleted, all of its resources and data will be permanently deleted. Please download any data you wish to retain before proceeding.
                        </p>
                        
                        <x-danger-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                            class="bg-error hover:bg-error/90 text-white px-xl py-md rounded-xl font-label-md shadow-sm hover:shadow-md transition-all flex items-center gap-2"
                        >
                            <span class="material-symbols-outlined text-[20px]">delete</span>
                            {{ __('Delete Account') }}
                        </x-danger-button>

                        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                            <form method="post" action="{{ route('user.profile.destroy') }}" class="p-6">
                                @csrf
                                @method('delete')
                                <h2 class="text-lg font-medium text-gray-900 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-error">warning</span>
                                    {{ __('Are you sure you want to delete your account?') }}
                                </h2>
                                <p class="mt-2 text-sm text-gray-600 ml-8">
                                    {{ __('Please enter your password to confirm you would like to permanently delete your account.') }}
                                </p>
                                <div class="mt-6 ml-8">
                                    <x-text-input id="password" name="password" type="password"
                                        class="mt-1 block w-full border-gray-300 rounded-xl focus:ring-error focus:border-error"
                                        placeholder="{{ __('Enter your password') }}" />
                                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                </div>
                                <div class="mt-8 flex justify-end gap-3">
                                    <x-secondary-button x-on:click="$dispatch('close')" class="rounded-xl px-xl py-md">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>
                                    <x-danger-button class="ms-3 bg-error hover:bg-error/90 rounded-xl px-xl py-md">
                                        {{ __('Delete Account') }}
                                    </x-danger-button>
                                </div>
                            </form>
                        </x-modal>
                    </div>
                </div>

                {{-- Right Column: Tips Panel (Sticky) --}}
                <div class="lg:col-span-4 space-y-lg">
                    <div class="bg-primary-fixed/20 border border-primary/10 rounded-2xl p-xl sticky top-24">
                        <h3 class="font-headline-sm text-headline-sm text-primary mb-lg flex items-center gap-sm">
                            <span class="material-symbols-outlined text-[24px]">info</span>
                            Tips Profil
                        </h3>
                        <ul class="space-y-md font-body-sm text-on-surface-variant leading-relaxed">
                            <li class="flex gap-sm items-start">
                                <span class="material-symbols-outlined text-primary text-[20px] mt-0.5 flex-shrink-0">check_circle</span>
                                <span>Gunakan nama asli agar mudah dikenali partner barter.</span>
                            </li>
                            <li class="flex gap-sm items-start">
                                <span class="material-symbols-outlined text-primary text-[20px] mt-0.5 flex-shrink-0">check_circle</span>
                                <span>Pastikan nomor HP aktif untuk komunikasi cepat.</span>
                            </li>
                            <li class="flex gap-sm items-start">
                                <span class="material-symbols-outlined text-primary text-[20px] mt-0.5 flex-shrink-0">check_circle</span>
                                <span>Email terverifikasi meningkatkan kepercayaan profil.</span>
                            </li>
                            <li class="flex gap-sm items-start">
                                <span class="material-symbols-outlined text-primary text-[20px] mt-0.5 flex-shrink-0">check_circle</span>
                                <span>Lengkapi alamat untuk koordinasi jasa lokal.</span>
                            </li>
                        </ul>
                        
                        <div class="mt-xl pt-lg border-t border-primary/10">
                            <p class="font-label-sm text-on-surface-variant italic">
                                "Profil lengkap mendapat 3x lebih banyak request jasa."
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    @include('user.partials.footer')
</body>
</html>