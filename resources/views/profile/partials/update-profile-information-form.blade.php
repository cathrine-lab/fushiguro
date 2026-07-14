<!DOCTYPE html>
<html class="light" lang="en">
<head>
    @include('user.partials.head', ['pageTitle' => 'Edit Profile | Tukar Jasa'])
    
    <style>
        /* Custom styles for form elements to match design system */
        .form-input {
            @apply w-full px-4 py-2.5 bg-surface-container-low border border-outline-variant rounded-xl 
                   text-on-surface font-body-sm focus:outline-none focus:ring-2 focus:ring-primary/20 
                   focus:border-primary transition-all;
        }
        .form-label {
            @apply block font-label-md text-on-surface mb-xs;
        }
        .surface-card {
            background: #ffffff;
            border: 1px solid #E2E8F0;
            box-shadow: 0 4px 6px -1px rgba(31, 16, 142, 0.05);
        }
    </style>
</head>
<body class="font-body-md text-on-surface bg-background flex flex-col min-h-screen">
    
    {{-- Sidebar Sistem --}}
    @include('user.partials.sidebar')
    
    {{-- Main Content --}}
    <main class="md:ml-[280px] min-h-screen pt-16 pb-3xl flex-1">
        
        {{-- Header Global --}}
        @include('user.partials.header', ['title' => 'Edit Profile'])
        
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
                            <span class="material-symbols-outlined">person</span>
                            Profile Information
                        </h2>
                        
                        <form method="post" action="{{ route('profile.update') }}" class="space-y-xl">
                            @csrf
                            @method('patch')

                            {{-- Nama --}}
                            <div>
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input id="nama" name="nama" type="text" 
                                    class="form-input @error('nama') border-error focus:ring-error/20 focus:border-error @enderror" 
                                    value="{{ old('nama', $user->nama) }}" required autofocus autocomplete="name" />
                                @error('nama')
                                    <p class="mt-1 font-label-sm text-error">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div>
                                <label for="email" class="form-label">Email Address</label>
                                <input id="email" name="email" type="email" 
                                    class="form-input @error('email') border-error focus:ring-error/20 focus:border-error @enderror" 
                                    value="{{ old('email', $user->email) }}" required autocomplete="username" />
                                @error('email')
                                    <p class="mt-1 font-label-sm text-error">{{ $message }}</p>
                                @enderror
                                
                                {{-- Verifikasi Email (Hanya muncul jika belum verified) --}}
                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <div class="mt-4 p-md bg-amber-50 border border-amber-200 rounded-xl">
                                        <p class="font-label-sm text-amber-800 mb-2">
                                            Your email address is unverified.
                                        </p>
                                        <form method="post" action="{{ route('verification.send') }}">
                                            @csrf
                                            <button type="submit" class="font-label-sm text-amber-700 hover:text-amber-900 underline">
                                                Click here to re-send the verification email.
                                            </button>
                                        </form>
                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 font-label-sm text-green-600">
                                                A new verification link has been sent to your email address.
                                            </p>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            {{-- No. HP --}}
                            <div>
                                <label for="no_hp" class="form-label">Nomor Telepon</label>
                                <input id="no_hp" name="no_hp" type="tel" 
                                    class="form-input @error('no_hp') border-error focus:ring-error/20 focus:border-error @enderror" 
                                    value="{{ old('no_hp', $user->no_hp) }}" autocomplete="tel" />
                                @error('no_hp')
                                    <p class="mt-1 font-label-sm text-error">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Alamat --}}
                            <div>
                                <label for="alamat" class="form-label">Alamat Lengkap</label>
                                <textarea id="alamat" name="alamat" rows="3" 
                                    class="form-input resize-none @error('alamat') border-error focus:ring-error/20 focus:border-error @enderror" 
                                    autocomplete="street-address">{{ old('alamat', $user->alamat) }}</textarea>
                                @error('alamat')
                                    <p class="mt-1 font-label-sm text-error">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Action Buttons --}}
                            <div class="flex items-center gap-4 pt-lg">
                                <button type="submit" 
                                    class="primary-gradient text-white px-xl py-md rounded-xl font-label-md shadow-md hover:scale-[0.98] active:scale-95 transition-all">
                                    Save Changes
                                </button>
                                
                                @if (session('status') === 'profile-updated')
                                    <p x-data="{ show: true }"
                                       x-show="show"
                                       x-transition
                                       x-init="setTimeout(() => show = false, 3000)"
                                       class="font-label-sm text-primary">
                                        Saved successfully!
                                    </p>
                                @endif
                            </div>
                        </form>
                    </div>

                    {{-- Delete Account Card --}}
                    <div class="surface-card rounded-2xl p-xl md:p-2xl border-l-4 border-l-error">
                        <h2 class="font-headline-sm text-headline-sm text-error mb-lg flex items-center gap-sm">
                            <span class="material-symbols-outlined">delete_forever</span>
                            Delete Account
                        </h2>
                        <p class="font-body-sm text-on-surface-variant mb-lg max-w-2xl">
                            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
                        </p>
                        
                        <x-danger-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                        >{{ __('Delete Account') }}</x-danger-button>

                        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('Are you sure you want to delete your account?') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600">
                                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                </p>

                                <div class="mt-6">
                                    <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                                    <x-text-input
                                        id="password"
                                        name="password"
                                        type="password"
                                        class="mt-1 block w-3/4"
                                        placeholder="{{ __('Password') }}"
                                    />
                                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                </div>

                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>
                                    <x-danger-button class="ms-3">
                                        {{ __('Delete Account') }}
                                    </x-danger-button>
                                </div>
                            </form>
                        </x-modal>
                    </div>
                </div>

                {{-- Right Column: Info Panel --}}
                <div class="lg:col-span-4 space-y-lg">
                    <div class="bg-primary-fixed/30 border border-primary/10 rounded-2xl p-xl">
                        <h3 class="font-headline-sm text-headline-sm text-primary mb-md flex items-center gap-sm">
                            <span class="material-symbols-outlined">info</span>
                            Tips
                        </h3>
                        <ul class="space-y-md font-body-sm text-on-surface-variant">
                            <li class="flex gap-sm">
                                <span class="material-symbols-outlined text-primary text-[18px] mt-0.5">check_circle</span>
                                <span>Gunakan nama asli agar mudah dikenali oleh partner barter.</span>
                            </li>
                            <li class="flex gap-sm">
                                <span class="material-symbols-outlined text-primary text-[18px] mt-0.5">check_circle</span>
                                <span>Pastikan nomor HP aktif untuk komunikasi cepat.</span>
                            </li>
                            <li class="flex gap-sm">
                                <span class="material-symbols-outlined text-primary text-[18px] mt-0.5">check_circle</span>
                                <span>Email terverifikasi meningkatkan kepercayaan profil kamu.</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </main>

    {{-- Footer Partial --}}
    @include('user.partials.footer')
</body>
</html>