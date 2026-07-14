<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Login - Tukar Jasa</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "inverse-surface": "#2d3133",
                    "on-secondary": "#ffffff",
                    "on-tertiary-container": "#78b2ff",
                    "inverse-on-surface": "#eff1f3",
                    "error-container": "#ffdad6",
                    "tertiary-fixed": "#d4e3ff",
                    "surface-container-low": "#f2f4f6",
                    "on-primary": "#ffffff",
                    "tertiary-container": "#00447d",
                    "inverse-primary": "#c3c0ff",
                    "surface-container-highest": "#e0e3e5",
                    "on-tertiary": "#ffffff",
                    "on-secondary-fixed-variant": "#5a00c6",
                    "on-secondary-container": "#fffbff",
                    "on-primary-fixed": "#0f0069",
                    "background": "#f7f9fb",
                    "on-error": "#ffffff",
                    "on-secondary-fixed": "#25005a",
                    "secondary-fixed-dim": "#d2bbff",
                    "surface-tint": "#544fc0",
                    "secondary-container": "#8a4cfc",
                    "outline-variant": "#c8c4d5",
                    "secondary": "#712ae2",
                    "outline": "#777584",
                    "surface-container-high": "#e6e8ea",
                    "on-primary-fixed-variant": "#3b35a7",
                    "surface-variant": "#e0e3e5",
                    "secondary-fixed": "#eaddff",
                    "on-surface-variant": "#464553",
                    "primary-container": "#3730a3",
                    "tertiary-fixed-dim": "#a4c9ff",
                    "surface-dim": "#d8dadc",
                    "on-tertiary-fixed-variant": "#004883",
                    "primary-fixed-dim": "#c3c0ff",
                    "tertiary": "#002d57",
                    "surface-bright": "#f7f9fb",
                    "on-surface": "#191c1e",
                    "on-primary-container": "#a9a7ff",
                    "primary": "#1f108e",
                    "error": "#ba1a1a",
                    "primary-fixed": "#e2dfff",
                    "on-background": "#191c1e",
                    "surface": "#f7f9fb",
                    "surface-container-lowest": "#ffffff",
                    "on-error-container": "#93000a",
                    "surface-container": "#eceef0",
                    "on-tertiary-fixed": "#001c39"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "sm": "8px",
                    "xl": "32px",
                    "2xl": "48px",
                    "margin-desktop": "40px",
                    "margin-mobile": "16px",
                    "base": "4px",
                    "md": "16px",
                    "lg": "24px",
                    "gutter": "24px",
                    "3xl": "64px",
                    "xs": "4px"
            },
            "fontFamily": {
                    "body-lg": ["Inter"],
                    "headline-sm": ["Inter"],
                    "label-md": ["Inter"],
                    "body-md": ["Inter"],
                    "headline-md": ["Inter"],
                    "headline-lg-mobile": ["Inter"],
                    "headline-lg": ["Inter"],
                    "body-sm": ["Inter"],
                    "display-lg": ["Inter"],
                    "label-sm": ["Inter"]
            },
            "fontSize": {
                    "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "headline-sm": ["20px", {"lineHeight": "1.4", "fontWeight": "600"}],
                    "label-md": ["14px", {"lineHeight": "1", "letterSpacing": "0.01em", "fontWeight": "600"}],
                    "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "headline-md": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                    "headline-lg-mobile": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                    "headline-lg": ["32px", {"lineHeight": "1.25", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                    "body-sm": ["14px", {"lineHeight": "1.5", "fontWeight": "400"}],
                    "display-lg": ["48px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "label-sm": ["12px", {"lineHeight": "1", "letterSpacing": "0.02em", "fontWeight": "500"}]
            }
          },
        },
      }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .bg-vibrant-gradient {
            background: linear-gradient(135deg, #1f108e 0%, #712ae2 50%, #8a4cfc 100%);
        }
        .login-card-shadow {
            box-shadow: 0 10px 15px -3px rgba(31, 16, 142, 0.05), 0 4px 6px -2px rgba(31, 16, 142, 0.02);
        }
        .input-focus-glow:focus {
            box-shadow: 0 0 0 4px rgba(113, 42, 226, 0.2);
        }
    </style>
</head>
<body class="bg-background font-body-md text-on-background selection:bg-primary-fixed selection:text-primary overflow-hidden">
<!-- Auth Shell Suppression: Per instructions, TopNavBar is hidden for transactional pages -->
<main class="min-h-screen flex flex-col md:flex-row">
<!-- Left Side: Vibrant Identity Section -->
<section class="hidden md:flex md:w-1/2 bg-vibrant-gradient relative items-center justify-center p-3xl overflow-hidden">
<!-- Decorative Elements -->
<div class="absolute top-0 left-0 w-full h-full opacity-20 pointer-events-none">
<div class="absolute -top-24 -left-24 w-96 h-96 bg-white/20 rounded-full blur-3xl"></div>
<div class="absolute -bottom-24 -right-24 w-96 h-96 bg-secondary-fixed/30 rounded-full blur-3xl"></div>
</div>
<div class="relative z-10 text-center max-w-lg">
<div class="mb-lg inline-flex items-center justify-center p-md bg-white/10 backdrop-blur-md rounded-xl border border-white/20">
<span class="material-symbols-outlined text-white text-[48px]" style="font-variation-settings: 'FILL' 1;">swap_horiz</span>
</div>
<h1 class="font-display-lg text-display-lg text-white mb-md leading-tight">
                    Ubah Keahlian Menjadi Nilai
                </h1>
<p class="font-body-lg text-body-lg text-white/80">
                    Bergabunglah dengan komunitas profesional Indonesia untuk saling bertukar jasa secara aman dan kolaboratif.
                </p>
<!-- Visual Social Proof Card -->
<div class="mt-3xl p-lg bg-white/10 backdrop-blur-lg border border-white/20 rounded-xl text-left flex items-center gap-md">
<div class="flex -space-x-4">
<img alt="User 1" class="w-10 h-10 rounded-full border-2 border-white" data-alt="A professional looking avatar of a young man with glasses, styled in a clean modern illustration format. The background is a soft neutral color, maintaining the collaborative community vibe of a professional marketplace." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB_KgNIGc2hHC7uNkWYXugqospaTCweFi6NwnjKjgx5Q06hhksoCiZQa37muBmFbPAEg96lvedN3Gzz9y9I94mgMdkhrjkk061ojrf_Y1zbGfv-ybVZtZ-rH_5UN-dKK_GTiaM5KnJHRSG1Xm_sq8yMGkcEGdbllmvRRLlyxTcN4iuGEggWBnmkysJC3XMzUVNYcuXIY6goBb5ScQWGN36MH6-AQyYuYFs0I5Ct1rw1b35YRhkxZX7mRyl0oaWTPhxc20F82L7bo16q"/>
<img alt="User 2" class="w-10 h-10 rounded-full border-2 border-white" data-alt="A professional looking avatar of a young woman with a friendly smile, styled in a minimalist digital art format. She has a high-quality, professional appearance suitable for an enterprise-level skill sharing platform." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDNnaBztk1w6QA8LAYCN3NJ-9-_9IzvUPpKRm2M2nMWNKJdOID9vs06f9nKEmbNY1QFJ9VDQK2k6HdmnwtpOr-gKlmufL3nkAhX3j7TOXGK1BIk_23AFqy7eyv1LVkDoDLK5HenAegFxGdsTDfBeoU7-7avM2vdzMeMS4x-B1OyOdI6tmF16k6tWUFFWSapVOkhJNhGynsrxMs5egBGsp_hCmGNKslsPmoWT6py58ovuRJHAGxSQfiApVcWbgZCqpMGwIQ_mSGgTbcc"/>
<img alt="User 3" class="w-10 h-10 rounded-full border-2 border-white" data-alt="A high-quality digital avatar of a South Asian professional man in a business casual shirt. The art style is crisp and modern, fitting into a corporate yet approachable design system for a peer-to-peer marketplace." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDNBpqL4LrA5_B87cAD3Kotx6d4oTetpddm4vh5x1zhjS34S6l50I82SYNlg6-OuUYTcmX3F4K4CL5l1b9EFJ9EkAyY8l-Esa-a-i9yh6X_CdzaOXZW_HbGTxXZfdgrs5qGGldslDAozyTalL2o364F-lo2rJj_uWv0ILvmfwwJFy7fwmV-mzVba04zrwq0NmcXve2Y0VF98wBN0hx6C2_-mFvxc4YXj6fytjdg1seoeFNDo6s50M6DhzqBkfBhsiYxNVUkjOLxZRdD"/>
</div>
<div class="text-white">
<p class="font-label-md text-label-md">+2.5k Profesional Aktif</p>
<p class="font-label-sm text-label-sm opacity-70">Saling membantu hari ini</p>
</div>
</div>
</div>
</section>
<!-- Right Side: Login Form Section -->
<section class="flex-1 flex items-center justify-center p-margin-mobile md:p-margin-desktop bg-surface">
<div class="w-full max-w-[440px] animate-in fade-in slide-in-from-bottom-4 duration-700">
<!-- Mobile Branding -->
<div class="md:hidden mb-xl flex items-center gap-sm">
<span class="material-symbols-outlined text-primary text-[32px]">swap_horiz</span>
<span class="font-headline-md text-headline-md font-bold text-primary">Tukar Jasa</span>
</div>
<div class="mb-xl">
<h2 class="font-headline-lg text-headline-lg text-on-surface mb-xs">Selamat Datang Kembali</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Silakan masuk ke akun Anda untuk melanjutkan.</p>
</div>
<form method="POST" action="{{ route('login') }}" class="space-y-lg">
                @csrf

                <!-- Tampilan Error Jika Login Gagal -->
                @if ($errors->any())
                    <div class="p-4 bg-error-container text-on-error-container rounded-xl text-sm">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
<!-- Email Field -->
                <div class="space-y-xs">
                    <label class="font-label-md text-label-md text-on-surface-variant block" for="email">Email</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-outline text-[20px]">mail</span>
                        <input name="email" value="{{ old('email') }}" class="w-full h-[44px] pl-[44px] pr-md bg-white border border-outline-variant rounded-xl focus:border-primary input-focus-glow transition-all" id="email" placeholder="nama@email.com" required type="email"/>
                    </div>
                </div>

                <!-- Password Field -->
                <div class="space-y-xs">
                    <label class="font-label-md text-label-md text-on-surface-variant" for="password">Kata Sandi</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-outline text-[20px]">lock</span>
                        <input name="password" class="w-full h-[44px] pl-[44px] pr-[44px] bg-white border border-outline-variant rounded-xl focus:border-primary input-focus-glow transition-all" id="password" placeholder="••••••••" required type="password"/>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center gap-sm">
                    <input name="remember" class="w-5 h-5 rounded-lg border-outline-variant text-primary" id="remember" type="checkbox"/>
                    <label class="font-body-sm text-body-sm text-on-surface-variant cursor-pointer" for="remember">Ingat saya</label>
                </div>

                <!-- Submit Button -->
                <button class="w-full h-[48px] bg-vibrant-gradient text-white font-label-md rounded-xl shadow-lg flex items-center justify-center gap-sm" type="submit">
                    Masuk Sekarang <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                </button>
<!-- Divider -->
<div class="relative flex items-center py-sm">
<div class="flex-grow border-t border-outline-variant"></div>
<span class="flex-shrink mx-md font-label-sm text-label-sm text-outline">Atau masuk dengan</span>
<div class="flex-grow border-t border-outline-variant"></div>
</div>
<!-- Social Login -->
<div class="grid grid-cols-2 gap-md">
<button class="flex items-center justify-center gap-sm h-[44px] border border-outline-variant rounded-xl font-label-md text-label-md text-on-surface hover:bg-surface-container-low transition-colors" type="button">
<img alt="Google" class="w-5 h-5" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB8SJVN7qvWbfBmPug0iunONbWpFjyZ_DicEg9SVfBcxBw5LrtNsqeGpiimF4iIAUJsS_eXBw47VRf_teqKwg22q52-j--4B0A7GUE2fgoehpXeiuZsMOUHmdFW_7O7PYjiciqNzT38zVfwcpJ77i5phFmmezkOlxLEjMxacBwU9SZbOtWxntwNa1ZMpUEJ8ZuPMIZurLcLWJgvrZmH5y3_G0fxpTFfXHtd0V1ln9BsNqW2d1UExHAu1VWr6dPkhIlxq85wOXxgI-Cu"/>
                            Google
                        </button>
<button class="flex items-center justify-center gap-sm h-[44px] border border-outline-variant rounded-xl font-label-md text-label-md text-on-surface hover:bg-surface-container-low transition-colors" type="button">
<span class="material-symbols-outlined text-[20px] text-[#1877F2]" style="font-variation-settings: 'FILL' 1;">social_leaderboard</span>
                            Facebook
                        </button>
</div>
</form>
<div class="mt-2xl text-center">
<p class="font-body-md text-body-md text-on-surface-variant">
                        Belum punya akun? 
                        <a class="font-label-md text-label-md text-primary hover:underline ml-xs" href="{{ route('register') }}">Daftar Sekarang</a>
</p>
</div>
<footer class="mt-3xl pt-xl border-t border-outline-variant/30 text-center">
<p class="font-label-sm text-label-sm text-outline">
                        © 2024 Tukar Jasa Skill Exchange. <br class="md:hidden"/> Kebijakan Privasi • Syarat &amp; Ketentuan
                    </p>
</footer>
</div>
</section>
</main>
<script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerText = 'visibility_off';
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerText = 'visibility';
            }
        }
    </script>
</body></html>