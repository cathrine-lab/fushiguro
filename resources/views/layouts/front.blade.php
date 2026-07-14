<!DOCTYPE html>

<html class="light" lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Tukar Jasa - Ubah Keahlian Menjadi Nilai</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }
        .gradient-text {
            background: linear-gradient(135deg, #544fc0 0%, #712ae2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .primary-gradient {
            background: linear-gradient(135deg, #544fc0 0%, #712ae2 100%);
        }

        /* Modern Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .reveal {
            opacity: 0;
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .reveal.active {
            opacity: 1;
            animation: fadeInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }

        .shimmer {
            position: relative;
            overflow: hidden;
        }

        .shimmer::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 0.2) 50%,
                rgba(255, 255, 255, 0) 100%
            );
            transform: rotate(45deg);
            animation: shimmerEffect 3s infinite;
        }

        @keyframes shimmerEffect {
            0% { transform: translateX(-150%) rotate(45deg); }
            100% { transform: translateX(150%) rotate(45deg); }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        .animate-bounce-slow {
            animation: bounce-slow 4s ease-in-out infinite;
        }

        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        /* Card Transitions */
        .card-interactive {
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.3s ease;
        }
        .card-interactive:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
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
</head>
<body class="bg-background text-on-surface font-body-md overflow-x-hidden">
<!-- TopNavBar -->
<nav class="fixed top-0 w-full z-50 bg-surface/80 backdrop-blur-md flex justify-between items-center px-margin-desktop h-16 border-b border-outline-variant shadow-sm transition-all duration-300">
<div class="flex items-center gap-xl">
<span class="font-headline-md text-headline-md font-bold text-primary cursor-pointer">Tukar Jasa</span>
<div class="hidden md:flex items-center gap-lg">
<a class="text-primary font-bold border-b-2 border-primary font-body-md text-body-md py-1" href="{{ route ('explore') }}">Explore</a>
<a class="text-on-surface-variant hover:text-primary transition-colors font-body-md text-body-md" href="{{ route ('How it Works') }}">How it Works</a>
<a class="text-on-surface-variant hover:text-primary transition-colors font-body-md text-body-md" href="{{route ('Categories') }}">Categories</a>
</div>
</div>
<div class="flex items-center gap-md">
<div class="hidden lg:flex items-center bg-surface-container-low rounded-full px-md py-xs border border-outline-variant mr-md focus-within:ring-2 focus-within:ring-primary/20 transition-all">
<span class="material-symbols-outlined text-on-surface-variant text-[20px]">search</span>
<input class="bg-transparent border-none focus:ring-0 text-body-sm w-48" placeholder="Search services..." type="text"/>
</div>
<button class="hidden sm:block text-on-surface-variant hover:text-primary transition-colors font-label-md" href="loginpage.blade.php">Login</button>
<button class="primary-gradient text-white px-lg py-sm rounded-xl font-label-md shadow-lg shadow-primary/20 hover:shadow-primary/30 active:scale-95 transition-all">Register</button>
</div>
</nav>

@yield("content")
<footer class="w-full py-xl px-margin-desktop grid grid-cols-1 md:grid-cols-4 gap-gutter bg-surface-container-lowest border-t border-outline-variant reveal">
<div class="md:col-span-1">
<h2 class="font-headline-md text-headline-md font-bold text-on-surface mb-md">Tukar Jasa</h2>
<p class="text-on-surface-variant text-body-sm mb-lg">Platform pertukaran keahlian terbesar di Indonesia untuk para profesional dan kreatif.</p>
<div class="flex gap-md">
<a class="w-8 h-8 rounded-full bg-surface-container-high flex items-center justify-center text-on-surface-variant hover:text-primary hover:scale-110 transition-all" href="#">
<svg class="w-5 h-5 fill-current" viewbox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg>
</a>
<a class="w-8 h-8 rounded-full bg-surface-container-high flex items-center justify-center text-on-surface-variant hover:text-primary hover:scale-110 transition-all" href="#">
<svg class="w-5 h-5 fill-current" viewbox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"></path></svg>
</a>
<a class="w-8 h-8 rounded-full bg-surface-container-high flex items-center justify-center text-on-surface-variant hover:text-primary hover:scale-110 transition-all" href="#">
<svg class="w-5 h-5 fill-current" viewbox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.761 0 5-2.239 5-5v-14c0-2.761-2.239-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"></path></svg>
</a>
</div>
</div>
<div>
<h4 class="font-bold text-on-surface mb-lg">Platform</h4>
<ul class="space-y-md">
<li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="#">Explore Services</a></li>
<li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="#">How it Works</a></li>
<li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="#">Categories</a></li>
<li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="#">Community Guidelines</a></li>
</ul>
</div>
<div>
<h4 class="font-bold text-on-surface mb-lg">Support</h4>
<ul class="space-y-md">
<li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="#">Help Center</a></li>
<li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="#">Safety Center</a></li>
<li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="#">Contact Us</a></li>
<li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="#">FAQ</a></li>
</ul>
</div>
<div>
<h4 class="font-bold text-on-surface mb-lg">Legal</h4>
<ul class="space-y-md">
<li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="#">Privacy Policy</a></li>
<li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="#">Terms of Service</a></li>
<li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="#">Cookie Policy</a></li>
</ul>
<div class="mt-xl pt-lg border-t border-outline-variant">
<p class="text-body-sm text-on-surface-variant">© 2024 Tukar Jasa Skill Exchange. All rights reserved.</p>
</div>
</div>
</footer>
<script>
    // Intersection Observer for Scroll Animations
    const observerOptions = {
        root: null,
        threshold: 0.1,
        rootMargin: '0px'
    };

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                // Optional: Unobserve after animating once
                // revealObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.addEventListener('DOMContentLoaded', () => {
        // Observe all sections with 'reveal' class
        const reveals = document.querySelectorAll('.reveal');
        reveals.forEach(reveal => revealObserver.observe(reveal));

        // Add active class to hero immediately on load
        const hero = document.querySelector('section.reveal');
        if (hero) hero.classList.add('active');

        // Scroll listener for Navbar transparency/shadow
        const nav = document.querySelector('nav');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                nav.classList.add('bg-white', 'shadow-md');
                nav.classList.remove('bg-surface/80');
            } else {
                nav.classList.remove('bg-white', 'shadow-md');
                nav.classList.add('bg-surface/80');
            }
        });
    });
</script>
</body></html>