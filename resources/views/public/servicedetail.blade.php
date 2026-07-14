<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>UI/UX Design for Mobile Apps - Tukar Jasa</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet"/>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .primary-gradient {
            background: linear-gradient(135deg, #712ae2 0%, #1f108e 100%);
        }
        .secondary-shadow {
            box-shadow: 0 10px 15px -3px rgba(55, 48, 163, 0.05), 0 4px 6px -2px rgba(55, 48, 163, 0.02);
        }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
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
<nav class="fixed top-0 w-full z-50 bg-surface/80 backdrop-blur-md flex justify-between items-center px-margin-desktop h-16 border-b border-outline-variant shadow-sm">
<div class="flex items-center gap-xl">
<span class="font-headline-md text-headline-md font-bold text-primary">Tukar Jasa</span>
<div class="hidden md:flex items-center gap-lg">
<a class="font-body-md text-body-md text-primary font-bold border-b-2 border-primary transition-colors" href="#">Explore</a>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">How it Works</a>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">Categories</a>
</div>
</div>
<div class="flex items-center gap-md">
<div class="hidden md:flex items-center gap-sm mr-md">
<button class="material-symbols-outlined p-xs text-on-surface-variant hover:text-primary transition-transform active:scale-90" data-icon="notifications">notifications</button>
<button class="material-symbols-outlined p-xs text-on-surface-variant hover:text-primary transition-transform active:scale-90" data-icon="account_balance_wallet">account_balance_wallet</button>
</div>
<button class="px-lg py-sm rounded-lg font-label-md text-label-md text-on-surface-variant hover:bg-surface-container-high transition-all">Login</button>
<button class="px-lg py-sm rounded-lg font-label-md text-label-md bg-primary text-on-primary hover:opacity-90 shadow-sm transition-all active:scale-95">Register</button>
</div>
</nav>
<!-- Main Content Canvas -->
<main class="max-w-[1280px] mx-auto px-margin-desktop pt-[100px] pb-3xl">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- Left Column: Content (8 Columns) -->
<div class="lg:col-span-8 flex flex-col gap-xl">
<!-- Hero Section -->
<section class="rounded-xl overflow-hidden secondary-shadow border border-outline-variant bg-surface-container-lowest">
<img alt="Hero Image" class="w-full h-[480px] object-cover" data-alt="A premium, ultra-modern UI/UX design showcase featuring high-fidelity mobile app mockups on a clean, professional workspace. The scene uses a sophisticated soft-lighting approach with a primary color palette of deep indigo and vibrant purple. The aesthetic is corporate yet creative, emphasizing clean lines, generous whitespace, and professional digital craftsmanship in a bright light-mode studio setting." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDGGt_HoXukykYdBtclEnElhN8IzxdFAeij_LISYGxFHqIU0zL1etmEKvVO5N33bPjCxMLkmLA_uSt_z-bt3MsAnAhixYq8ijGWoOB64xm_Sq_I4a7nHLTgrqWGtj2XZJonDumrYQKbHyzozzNXJELnk4UQnkhDoWvYpWIhS5ko31Fp2LqDCFWwKkWVoHhWCRV7bSOA2YddvufTtb1bWdiNVv4SL0D8A7PxrhbUBEw7qob0JLO2JgwE3gKyka19hbk8VnqOunuRGBuC"/>
<div class="p-xl">
<div class="flex items-center gap-sm mb-md">
<span class="px-md py-xs bg-secondary-fixed text-on-secondary-fixed-variant rounded-full text-label-sm font-label-sm">Design</span>
<span class="px-md py-xs bg-surface-container-high text-on-surface-variant rounded-full text-label-sm font-label-sm">Mobile Development</span>
</div>
<h1 class="font-headline-lg text-headline-lg text-on-surface mb-md">UI/UX Design for Mobile Apps</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant mb-xl leading-relaxed">
                            Transforming complex ideas into intuitive, high-converting mobile experiences. I specialize in user-centric design that balances aesthetic elegance with functional performance. My process involves deep user research, wireframing, high-fidelity prototyping, and developer-ready handoffs.
                        </p>
</div>
</section>
<!-- Portfolio Gallery -->
<section>
<h2 class="font-headline-md text-headline-md text-on-surface mb-lg">Project Portfolio</h2>
<div class="grid grid-cols-2 gap-md">
<div class="group relative aspect-video rounded-xl overflow-hidden border border-outline-variant cursor-pointer transition-all hover:secondary-shadow">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="A close-up shot of a sleek mobile application interface for a financial tracking app. The design features soft purple gradients and clean typography on a crisp white background. High-key lighting creates a professional, trustworthy atmosphere within the modern digital design landscape." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDdhwuLe5WJJgpjCft-zoY2_maXQOf5oJIm9eiQ9O-IvpnOOTg0Kp3RnVdq8dfq7eE4RV22A2XYH5GqG8IuBH2pHXKdNg-sD1EQsHlTRnhEtQxhUpqwjMskxDRxIp3Z6pF0aDUDhOwek1NCh3ya0xtvBWsgeAMuYtebsEnfCKTAxXRYLo3QVejUp1yPpy1ZA9VE1tW4APGEv3W3wGrOLHZphGN_iXlnVmwZq_--acbbS4dbmj8iy4yqR3gjvDPNHFToYHVLg6EaoXmX"/>
</div>
<div class="group relative aspect-video rounded-xl overflow-hidden border border-outline-variant cursor-pointer transition-all hover:secondary-shadow">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="A vibrant lifestyle mobile app UI design displayed on a smartphone mockup. The interface uses a warm, approachable color palette with soft rounded corners and clean iconography. The setting is a bright, minimalist creative studio with natural daylight and a professional corporate aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCmkxnetU2nbkta8okj9aXGuVSFMAqyly7b1Vys9UhmpOkUnEYE71H3iS3YFOMMCVZv5SzlatJTmFz17Ev6dTtIR2FEb4ysQQj9692BLogQ0SoHKDP-a9EoYxJ_eYmxp4izjomGnWakqjciMEY_1BoObb5UnamfP0wBhswbcGtm9qvqomZC78yrt3n4tqsk91vfSnR1EZA0ub6_6-d5aWHcBnJDJTL-Rwca9VfLfMpV2UxUeVsLzrIGkJkAzPek5aepgWCAEgTd1z9z"/>
</div>
<div class="group relative aspect-video rounded-xl overflow-hidden border border-outline-variant cursor-pointer transition-all hover:secondary-shadow">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="High-fidelity wireframes of a healthcare mobile application shown on a digital tablet. The layout is structured and minimalist, using a primary palette of indigo and slate. The lighting is diffused and professional, highlighting the clear information hierarchy and user flow." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBKa3uGd-cR72LiAldJyawfy44LEUiVXSmdaBSI1ZGUehooEkY-sFyv1MJ3ZM-6vSzB6UfuBOvQZAWi_LVhEw0RiQgAShdWW4Pyom1Pi48IGgpWTsbsMMvuPqAMOpfFsHyi4alnQIR3afC5VjH4pUNBk51CkQ8-SHnfahB2ThLFM4FwxbZfyBsznqdfv9j2zezkSM5848UylkZ6gI0_aosg2q4B39H5d74du9EShuxP3XNIjogUazJ1IHSEwz5zCnYKMiudfo7zw_-S"/>
</div>
<div class="group relative aspect-video rounded-xl overflow-hidden border border-outline-variant cursor-pointer transition-all hover:secondary-shadow">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="A collection of app icons and a cohesive design system style guide for a community marketplace. The visual style features vibrant purple accents against a pristine white background. The overall mood is modern, collaborative, and highly professional." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDRriiBL_AswDHY-bzGB51Ri0O5nGL6M40pMSSMcJbuwhE5JxX3wuFXy4FFREXcW_l_M0uQxcGVmha7dzAUeyRf9zBNv6NAKeTFawG1GFErFifhPQeKlr92zoO8fwST7Q07DDMZB0COb_3P9VpYgfFvwcn7EkEP3T3gOzD2YXLOClft1tmAIK1YveTeKhWEEM6zB-VrDdbFvls6P2O9I4WD9TZMnwdQ9CxtrJgP8yEpbx7wYPZryrGEXW2sH2w0h9HkiNEQ-YPKFp3u"/>
</div>
</div>
</section>
<!-- Reviews Section -->
<section class="p-xl bg-surface-container-lowest border border-outline-variant rounded-xl secondary-shadow">
<div class="flex justify-between items-center mb-xl">
<h2 class="font-headline-md text-headline-md text-on-surface">Client Reviews</h2>
<div class="flex items-center gap-xs">
<span class="material-symbols-outlined text-[#FACC15]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="font-label-md text-label-md text-on-surface">4.9 (42 reviews)</span>
</div>
</div>
<div class="space-y-lg">
<!-- Review 1 -->
<div class="pb-lg border-b border-outline-variant">
<div class="flex items-center gap-md mb-sm">
<div class="w-10 h-10 rounded-full bg-tertiary-fixed flex items-center justify-center text-tertiary font-bold">JD</div>
<div>
<h4 class="font-label-md text-label-md text-on-surface">John Doe</h4>
<p class="font-label-sm text-label-sm text-on-surface-variant">2 weeks ago</p>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant italic">"Ahmad is a true professional. He understood my vision immediately and delivered designs that exceeded my expectations. His attention to detail in the mobile flow was impeccable."</p>
</div>
<!-- Review 2 -->
<div class="pb-lg">
<div class="flex items-center gap-md mb-sm">
<div class="w-10 h-10 rounded-full bg-secondary-fixed flex items-center justify-center text-secondary font-bold">SM</div>
<div>
<h4 class="font-label-md text-label-md text-on-surface">Sarah Miller</h4>
<p class="font-label-sm text-label-sm text-on-surface-variant">1 month ago</p>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant italic">"Exceptional work on our fintech app. The user interface is clean, modern, and very easy to navigate. Looking forward to our next project together."</p>
</div>
</div>
</section>
</div>
<!-- Right Column: Sidebar (4 Columns) -->
<div class="lg:col-span-4">
<div class="sticky top-[100px] flex flex-col gap-lg">
<!-- Pricing & Action Card -->
<div class="p-xl bg-surface-container-lowest border border-outline-variant rounded-xl secondary-shadow">
<div class="flex items-center justify-between mb-xl">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Starting From</span>
<span class="font-display-lg text-display-lg text-primary leading-none">50 <span class="text-headline-sm font-headline-sm text-on-surface-variant">Points</span></span>
</div>
<div class="w-12 h-12 rounded-full bg-primary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-primary" data-icon="payments">payments</span>
</div>
</div>
<div class="space-y-md mb-xl">
<div class="flex items-center gap-sm">
<span class="material-symbols-outlined text-secondary text-[20px]" data-icon="check_circle">check_circle</span>
<span class="font-body-sm text-body-sm text-on-surface">High-fidelity Figma Source File</span>
</div>
<div class="flex items-center gap-sm">
<span class="material-symbols-outlined text-secondary text-[20px]" data-icon="check_circle">check_circle</span>
<span class="font-body-sm text-body-sm text-on-surface">3 Revisions Included</span>
</div>
<div class="flex items-center gap-sm">
<span class="material-symbols-outlined text-secondary text-[20px]" data-icon="check_circle">check_circle</span>
<span class="font-body-sm text-body-sm text-on-surface">Developer Handoff Guide</span>
</div>
</div>
<button class="w-full primary-gradient text-on-primary py-md rounded-xl font-headline-sm text-headline-sm shadow-lg hover:opacity-90 active:scale-[0.98] transition-all mb-md">
                            Request Service
                        </button>
<a class="w-full flex items-center justify-center gap-sm bg-surface-container-high hover:bg-outline-variant text-on-surface py-md rounded-xl font-label-md text-label-md transition-all" href="https://wa.me/1234567890" target="_blank">
<span class="material-symbols-outlined" data-icon="chat">chat</span>
                            Contact via WhatsApp
                        </a>
</div>
<!-- Provider Profile Card -->
<div class="p-xl bg-surface-container-lowest border border-outline-variant rounded-xl secondary-shadow">
<div class="flex flex-col items-center text-center">
<div class="relative mb-md">
<img alt="Ahmad Fauzi Profile" class="w-24 h-24 rounded-full object-cover border-4 border-surface-container-low shadow-sm" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDijpgZnxyF-dwWDxTZClBKh7rBCYHbRibqHrpja48o7KwkqkWS0NCsPfHgW6CEfLUJJguV5VUkKQbme4a8BR1cQIV71weSChsAp3YF4SVsg1ZKrFJJ3YjuyI2zmlRfjDU7dbMQFyUBvLARcrVpzphKPWG-lJ8C16oBmg6jrS2NI3QQ5427MfxsG7gJTiRwfQfCICYfV9M8HE3whNTW2AJqxrPkAhHwi5XrjKJNXw2TFJCxq_2UmwFO2xm7m8T-D3MPPHsl1pJh6R0K"/>
<span class="absolute bottom-1 right-1 w-5 h-5 bg-green-500 border-2 border-white rounded-full"></span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Ahmad Fauzi</h3>
<p class="font-label-md text-label-md text-secondary mb-md">Pro Member • 450 pts</p>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-xl">
                                Dedicated UI/UX Designer with over 5 years of experience in creating digital products for startups and enterprises across Indonesia.
                            </p>
<div class="w-full grid grid-cols-2 gap-sm pt-xl border-t border-outline-variant">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant">Success Rate</span>
<span class="font-headline-sm text-headline-sm text-on-surface">98%</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant">Response Time</span>
<span class="font-headline-sm text-headline-sm text-on-surface">&lt; 2h</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
<!-- Footer -->
<footer class="w-full py-xl px-margin-desktop grid grid-cols-1 md:grid-cols-4 gap-gutter bg-surface-container-lowest border-t border-outline-variant">
<div class="md:col-span-1">
<span class="font-headline-md text-headline-md font-bold text-on-surface mb-md block">Tukar Jasa</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-xl">Empowering local talent through the art of skill exchange. Join our community today.</p>
</div>
<div>
<h4 class="font-label-md text-label-md text-primary mb-lg">Platform</h4>
<ul class="space-y-sm">
<li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Privacy Policy</a></li>
<li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Terms of Service</a></li>
<li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Cookie Policy</a></li>
</ul>
</div>
<div>
<h4 class="font-label-md text-label-md text-primary mb-lg">Community</h4>
<ul class="space-y-sm">
<li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Community Guidelines</a></li>
<li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Success Stories</a></li>
<li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Events</a></li>
</ul>
</div>
<div>
<h4 class="font-label-md text-label-md text-primary mb-lg">Support</h4>
<ul class="space-y-sm">
<li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Help Center</a></li>
<li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Safety Tips</a></li>
<li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Contact Support</a></li>
</ul>
</div>
<div class="md:col-span-4 mt-xl pt-lg border-t border-outline-variant flex flex-col md:flex-row justify-between items-center gap-md">
<p class="font-body-sm text-body-sm text-on-surface-variant">© 2024 Tukar Jasa Skill Exchange. All rights reserved.</p>
<div class="flex gap-lg">
<span class="material-symbols-outlined text-on-surface-variant hover:text-primary cursor-pointer transition-colors" data-icon="language">language</span>
<span class="material-symbols-outlined text-on-surface-variant hover:text-primary cursor-pointer transition-colors" data-icon="share">share</span>
</div>
</div>
</footer>
<script>
        // Micro-interaction for gallery images
        document.querySelectorAll('.group img').forEach(img => {
            img.addEventListener('click', () => {
                const overlay = document.createElement('div');
                overlay.className = 'fixed inset-0 z-[100] bg-black/90 backdrop-blur-md flex items-center justify-center p-xl cursor-zoom-out';
                const largeImg = document.createElement('img');
                largeImg.src = img.src;
                largeImg.className = 'max-w-full max-h-full rounded-xl object-contain';
                overlay.appendChild(largeImg);
                document.body.appendChild(overlay);
                overlay.onclick = () => overlay.remove();
            });
        });

        // Request Service button interaction
        const requestBtn = document.querySelector('.primary-gradient');
        requestBtn.addEventListener('click', function() {
            const originalText = this.innerText;
            this.innerHTML = '<span class="material-symbols-outlined animate-spin" data-icon="sync">sync</span> Sending...';
            setTimeout(() => {
                this.innerHTML = '<span class="material-symbols-outlined" data-icon="check">check</span> Request Sent';
                this.classList.replace('primary-gradient', 'bg-green-500');
                setTimeout(() => {
                    this.innerText = originalText;
                    this.classList.replace('bg-green-500', 'primary-gradient');
                }, 3000);
            }, 1500);
        });
    </script>
</body></html>