<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
            display: inline-block;
            vertical-align: middle;
        }
        .btn-gradient {
            background: linear-gradient(135deg, #712ae2 0%, #1f108e 100%);
        }
        .soft-shadow {
            box-shadow: 0 10px 15px -3px rgba(55, 48, 163, 0.05), 0 4px 6px -2px rgba(55, 48, 163, 0.02);
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md">
<!-- TopNavBar -->
<nav class="fixed top-0 w-full z-50 bg-surface/80 backdrop-blur-md flex justify-between items-center px-margin-desktop h-16 border-b border-outline-variant shadow-sm">
<div class="flex items-center gap-xl">
<span class="font-headline-md text-headline-md font-bold text-primary">Tukar Jasa</span>
<div class="hidden md:flex items-center gap-lg">
<a class="font-body-md text-body-md font-bold border-b-2 border-primary text-primary transition-colors" href="#">Explore</a>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">How it Works</a>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">Categories</a>
</div>
</div>
<div class="flex-1 max-w-md mx-xl relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-surface-container rounded-xl border-none focus:ring-2 focus:ring-primary/20 text-body-sm" placeholder="Search services..." type="text"/>
</div>
<div class="flex items-center gap-md">
<button class="material-symbols-outlined p-2 text-on-surface-variant hover:bg-surface-container rounded-full">notifications</button>
<button class="material-symbols-outlined p-2 text-on-surface-variant hover:bg-surface-container rounded-full">account_balance_wallet</button>
<div class="h-8 w-[1px] bg-outline-variant mx-2"></div>
<button class="font-label-md text-label-md text-primary px-4 py-2 hover:bg-primary-fixed rounded-lg transition-colors">Login</button>
<button class="font-label-md text-label-md bg-primary text-on-primary px-6 py-2 rounded-xl btn-gradient hover:scale-[0.98] transition-transform">Register</button>
</div>
</nav>
<main class="pt-24 pb-3xl px-margin-desktop max-w-[1440px] mx-auto min-h-screen">
<!-- Breadcrumbs & Search Header -->
<div class="mb-xl">
<nav class="flex items-center gap-xs text-on-surface-variant font-label-sm text-label-sm mb-md">
<a class="hover:text-primary" href="#">Home</a>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
<span class="text-primary font-bold">Browse Services</span>
</nav>
<h1 class="font-headline-lg text-headline-lg text-on-surface">Explore Skills &amp; Services</h1>
<p class="text-on-surface-variant font-body-md mt-xs">Find the perfect expert to exchange skills with today.</p>
</div>
<div class="flex flex-col md:flex-row gap-gutter">
<!-- Sidebar Filters -->
<aside class="w-full md:w-[280px] shrink-0">
<div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl soft-shadow sticky top-24">
<div class="flex items-center justify-between mb-lg">
<h3 class="font-headline-sm text-headline-sm">Filters</h3>
<button class="text-primary font-label-sm text-label-sm hover:underline">Reset All</button>
</div>
<!-- Category Filter -->
<div class="mb-xl">
<h4 class="font-label-md text-label-md mb-md flex items-center gap-xs">
<span class="material-symbols-outlined text-[18px]">category</span>
                            Category
                        </h4>
<div class="space-y-sm">
<label class="flex items-center gap-sm cursor-pointer group">
<input checked="" class="rounded text-primary focus:ring-primary" type="checkbox"/>
<span class="font-body-sm text-body-sm group-hover:text-primary transition-colors">Programming &amp; Tech</span>
</label>
<label class="flex items-center gap-sm cursor-pointer group">
<input class="rounded text-primary focus:ring-primary" type="checkbox"/>
<span class="font-body-sm text-body-sm group-hover:text-primary transition-colors">Digital Marketing</span>
</label>
<label class="flex items-center gap-sm cursor-pointer group">
<input class="rounded text-primary focus:ring-primary" type="checkbox"/>
<span class="font-body-sm text-body-sm group-hover:text-primary transition-colors">Graphic Design</span>
</label>
<label class="flex items-center gap-sm cursor-pointer group">
<input class="rounded text-primary focus:ring-primary" type="checkbox"/>
<span class="font-body-sm text-body-sm group-hover:text-primary transition-colors">Writing &amp; Translation</span>
</label>
<label class="flex items-center gap-sm cursor-pointer group">
<input class="rounded text-primary focus:ring-primary" type="checkbox"/>
<span class="font-body-sm text-body-sm group-hover:text-primary transition-colors">Business &amp; Consulting</span>
</label>
</div>
</div>
<!-- Rating Filter -->
<div class="mb-xl">
<h4 class="font-label-md text-label-md mb-md flex items-center gap-xs">
<span class="material-symbols-outlined text-[18px]">star</span>
                            Minimum Rating
                        </h4>
<div class="space-y-sm">
<button class="w-full flex items-center justify-between p-sm hover:bg-surface-container rounded-lg transition-colors">
<div class="flex text-secondary">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]">star</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">&amp; up</span>
</button>
</div>
</div>
<!-- Points Range Filter -->
<div class="mb-lg">
<h4 class="font-label-md text-label-md mb-md flex items-center gap-xs">
<span class="material-symbols-outlined text-[18px]">payments</span>
                            Points Range
                        </h4>
<input class="w-full h-2 bg-surface-container-highest rounded-lg appearance-none cursor-pointer accent-primary" max="1000" min="0" step="50" type="range"/>
<div class="flex justify-between mt-sm text-on-surface-variant font-label-sm text-label-sm">
<span>0 pts</span>
<span>1000 pts</span>
</div>
</div>
<button class="w-full py-3 btn-gradient text-on-primary rounded-xl font-label-md text-label-md hover:scale-[0.98] transition-transform shadow-lg shadow-primary/20">
                        Apply Filters
                    </button>
</div>
</aside>
<!-- Main Grid -->
<div class="flex-1">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-lg">
<!-- Service Card 1 -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden soft-shadow hover:-translate-y-1 transition-transform duration-300 group">
<div class="relative h-48 overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="A professional close-up of a high-end laptop display showing complex React code, set in a bright, modern home office with soft morning sunlight. The environment is clean and minimalist, featuring a white desk, a small succulent, and a cup of specialty coffee. The lighting is high-key and airy, emphasizing a productive and sophisticated atmosphere consistent with a professional developer's workspace." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAPTND9P6t_Ykoj_57rrf2uaFU8fWDQqP6M0jddHzXNTBlq0evaklvqjcH37zs12qRZhAEgvMJXv7tA-AV3CDKYf6R-EewkZW4KsguTiCqujC3HlN1U0BlnhaOlfe3TS7XNgw5oc_sz0p8cHZMOX6KGjls3qwtGqhE5SJtsblerbw3zd9cUXVtHOTPsNRlQFVwEs5F1ibjUuWPZCYfrIzyQqt46qXTvnV40b-wjnzC_ZguVoF3-S_Wxe7zzj8kVsjZv8usqrOJxfjNV"/>
<div class="absolute top-3 right-3 bg-surface/90 backdrop-blur px-3 py-1 rounded-full text-primary font-label-sm text-label-sm font-bold border border-primary/20">
                                450 pts
                            </div>
</div>
<div class="p-lg">
<span class="text-secondary font-label-sm text-label-sm uppercase tracking-wider mb-xs block">Development</span>
<h3 class="font-headline-sm text-headline-sm mb-md group-hover:text-primary transition-colors">React &amp; Tailwind Frontend Specialist</h3>
<div class="flex items-center gap-sm mb-lg">
<img class="w-10 h-10 rounded-full border border-outline-variant" data-alt="A professional portrait of a male software engineer with a friendly smile, wearing a modern navy polo shirt. He is set against a blurred background of a sleek, contemporary tech office with large windows and warm, natural indoor lighting. The style is clean, sharp, and high-fidelity, conveying trustworthiness and expertise in a professional corporate environment." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDciMwMIYhfIBMMIcMXP1PXj5pTgo9MxYkNaFEg2ZawPZpAx-UerzUMn_BaWbQj6jVTt0sn50dUIQFkBHEsYq4wfgPGc9o2Cj1SrAGxLBqd99nNPcQYfAVIzSJ1qjIecfWg5XaV-th7Uw18_AeB7TvkrXd7kcS9lW9UNFKxe4Fg1Hgm7oYn-jPyMYQW54ugnxgvi7-rc4WAujoLVHiVEBClUf27HNH2STGQSkM_o6yZ9pdlG-RnETrICHKLJB0LK16gujFx-9_JRbBP"/>
<div>
<p class="font-label-md text-label-md">Ahmad Fauzi</p>
<div class="flex items-center gap-xs">
<span class="material-symbols-outlined text-[14px] text-secondary" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="text-on-surface-variant font-label-sm text-label-sm">4.9 (124)</span>
</div>
</div>
</div>
<button class="w-full py-2 border border-primary text-primary rounded-lg font-label-md text-label-md hover:bg-primary hover:text-on-primary transition-all">View Details</button>
</div>
</div>
<!-- Service Card 2 -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden soft-shadow hover:-translate-y-1 transition-transform duration-300 group">
<div class="relative h-48 overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="A vibrant and artistic display of a professional graphic designer's workspace, featuring a large graphics tablet, a stylus, and multiple monitors showing colorful brand identity concepts. The room is decorated with minimalist art and has warm, ambient lighting that creates a creative and inspiring mood. The color palette is rich with purples and indigos, reflecting a modern and collaborative professional aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCcbFM2qmgE_wr1Wm8HvtQd-BXhOS6nmSOhY5shJz1TqemtfqJpleuSs-YYhNLHdV0TBN1Kly3ZNdLpxTTB_iMYkRPAPJJw6cipHFRf46ExV1d7YuUzMsKMnegj7PK7TBipC0hxdH4u3_MZAuM-CdULrQbU89siEnOvwd8wkIzTviuQh5wMG09h71IaYIBaL-okydIrOTS3lw0_gG0gMnqpfbMyh9KwjpY9XkkgLHi530LxRKJ0XFcxRKwl3v3iqmiiTL98HUhXgQEa"/>
<div class="absolute top-3 right-3 bg-surface/90 backdrop-blur px-3 py-1 rounded-full text-primary font-label-sm text-label-sm font-bold border border-primary/20">
                                300 pts
                            </div>
</div>
<div class="p-lg">
<span class="text-secondary font-label-sm text-label-sm uppercase tracking-wider mb-xs block">Design</span>
<h3 class="font-headline-sm text-headline-sm mb-md group-hover:text-primary transition-colors">Custom Logo &amp; Brand Identity Package</h3>
<div class="flex items-center gap-sm mb-lg">
<img class="w-10 h-10 rounded-full border border-outline-variant" data-alt="A warm and approachable headshot of a female graphic designer in her late 20s, wearing stylish glasses and a minimalist white sweater. She is positioned in a creative studio with soft, diffused natural light from a window. The aesthetic is clean, professional, and contemporary, capturing a sense of artistic talent and reliability within a modern creative community." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCFZHZjWrS1BG-2udiyyziG7p-MsU4Ps-GVq8qsXnESdx2gtnENmk04RgkqV5YCX8woKxcvyOeATV0IZjIcodLtVjzYv9tuQEiXG7TNude21hDy7xhjevhrNckwUFC4dr_OK-ck5pyOh0yx1_I_HmML-cdbp3YaYVl1qRmaBMlCF7EbeeJWa-1hC_L8VUHgI_1RgQsa0XZkUbU_Mm9UvbvbS0qEy1dPXeALYrxNbFqINM-jnDW654f9GYJbybJKDxf5UG_giooSluJj"/>
<div>
<p class="font-label-md text-label-md">Siti Nurhaliza</p>
<div class="flex items-center gap-xs">
<span class="material-symbols-outlined text-[14px] text-secondary" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="text-on-surface-variant font-label-sm text-label-sm">5.0 (89)</span>
</div>
</div>
</div>
<button class="w-full py-2 border border-primary text-primary rounded-lg font-label-md text-label-md hover:bg-primary hover:text-on-primary transition-all">View Details</button>
</div>
</div>
<!-- Service Card 3 -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden soft-shadow hover:-translate-y-1 transition-transform duration-300 group">
<div class="relative h-48 overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="A wide-angle shot of a minimalist business consultation environment, featuring a glass desk with a slim smartphone, an elegant notebook, and a high-end laptop displaying data charts. The background is a clean, corporate office space with floor-to-ceiling windows and a view of a modern city skyline. The lighting is bright and professional, utilizing a cool-toned palette of grays, whites, and deep blues to convey trust and authority." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJgJCbnRqJbaznmSMLYGsHBy7xZ5qsfeBy0qvp-HZRdrcgFG-1P4sJS-mZoIEdNUBhzHTtvDKKQErU29NDk5lnS11RTGgh-98N4AAZhfXFXxRYElnE2E5x8hOFG-mfqQPxsGPi3VuJnVLclvOblWsRLjOlRvcRS4wRY0XvmKmd4k93lIwkuHyi0S5eY8ipG_eTOCgTx2cvriZ1p11wBZvR5DoTkCpAnG__piBoeXNvduaVTA6oFNg6ln4AJ7siWMQlOsdm0v9bqHoK"/>
<div class="absolute top-3 right-3 bg-surface/90 backdrop-blur px-3 py-1 rounded-full text-primary font-label-sm text-label-sm font-bold border border-primary/20">
                                600 pts
                            </div>
</div>
<div class="p-lg">
<span class="text-secondary font-label-sm text-label-sm uppercase tracking-wider mb-xs block">Business</span>
<h3 class="font-headline-sm text-headline-sm mb-md group-hover:text-primary transition-colors">Strategic Marketing Growth Audit</h3>
<div class="flex items-center gap-sm mb-lg">
<img class="w-10 h-10 rounded-full border border-outline-variant" data-alt="A professional portrait of a senior marketing consultant with a confident and kind expression. He is wearing a sharp, light-gray suit jacket over a crisp white shirt. The background is a blurred high-end corporate library or lobby with warm ambient light and mahogany accents. The visual style is premium and authoritative, emphasizing years of professional experience and peer-to-peer mentorship." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAF3_gk2bdYL9E13hYESE-kRmNGLA6UBo_bRgGlp7I0dbZz7SlFuGddryHJJU8HoDEhqscHWs1xhMh1KDlHm98QPtiFKc1TZa-tLbFkQLlfe_9qlX0KF_Siw9V1CnfW4teeMXswWtpTpyhb_l_-eCyxh_5TvpbjNTnuqs4SN5NbGVNOz9RCiFgyADVugak4CveywbCHJgrzFbOEJvhz_K7AnQki4IMncLt4cGbn5EXAhM4ySPS7O6ed_Wn7oy1ZXe120ztQyaukJEJ4"/>
<div>
<p class="font-label-md text-label-md">Budi Santoso</p>
<div class="flex items-center gap-xs">
<span class="material-symbols-outlined text-[14px] text-secondary" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="text-on-surface-variant font-label-sm text-label-sm">4.8 (215)</span>
</div>
</div>
</div>
<button class="w-full py-2 border border-primary text-primary rounded-lg font-label-md text-label-md hover:bg-primary hover:text-on-primary transition-all">View Details</button>
</div>
</div>
<!-- Additional Card rows for visual layout -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden soft-shadow hover:-translate-y-1 transition-transform duration-300 group">
<div class="relative h-48 overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="A professional team collaboration scene in a modern workspace, with people gathered around a large screen discussing project analytics and performance metrics. The room is filled with soft, natural light and features contemporary furniture. The atmosphere is energetic and focused on group success, with a color palette that blends neutral office tones with vibrant primary indigo highlights." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDC19gnbmyQ1n8R1p7ukMRoP-VgpnpZCmAND-QEzg_BrEtY6muaXAiXHM-iO5TsZ-aczZwwrt_DcDyPNqVqJ-09vb8nsGVe2T9eiqapr06f58-o8YKBTrXweiXlz9yEYJvtDxp6Q7L0aFcrRJ-dZg2vNFMhbX2cE4twEpzBJ1DTYl9Znbxi37AaZ5TIjFmRy1gAd4jEujTcwinwedwVZi5R8zpC_h_QRBan94MT2xzp0SgypYdnK_jRvhIspISsVgZ9_aaP37Vh2HdF"/>
<div class="absolute top-3 right-3 bg-surface/90 backdrop-blur px-3 py-1 rounded-full text-primary font-label-sm text-label-sm font-bold border border-primary/20">
                                350 pts
                            </div>
</div>
<div class="p-lg">
<span class="text-secondary font-label-sm text-label-sm uppercase tracking-wider mb-xs block">Digital Marketing</span>
<h3 class="font-headline-sm text-headline-sm mb-md group-hover:text-primary transition-colors">SEO Mastery &amp; Organic Traffic Strategy</h3>
<div class="flex items-center gap-sm mb-lg">
<div class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center font-bold text-primary">RK</div>
<div>
<p class="font-label-md text-label-md">Rina Kusuma</p>
<div class="flex items-center gap-xs">
<span class="material-symbols-outlined text-[14px] text-secondary" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="text-on-surface-variant font-label-sm text-label-sm">4.7 (56)</span>
</div>
</div>
</div>
<button class="w-full py-2 border border-primary text-primary rounded-lg font-label-md text-label-md hover:bg-primary hover:text-on-primary transition-all">View Details</button>
</div>
</div>
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden soft-shadow hover:-translate-y-1 transition-transform duration-300 group">
<div class="relative h-48 overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="A clean and modern UI design process visualized, featuring wireframes on a tablet, a mechanical keyboard, and high-quality design books on a pristine white surface. The lighting is balanced and creates minimal shadows, producing a sophisticated corporate minimalist feel. The scene is accented by subtle purple tones in the lighting, aligning with a high-end digital design studio environment." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDE3eJ3xVdLVHw-cxGz5xbfhCnj4DJYLMSVsP3mzFSsH6MIb6tIXcdYGSmeg_RmvROx3v_45o8b0TdD_tgZHJRdEOJW0tR0LvuVamjsFw7jGppb0f8aHM4TuHMxRrGpZIcFKIA7pwEZltR9jS7FlyZvcOAW2f43AkA1HTJAp6JuSVN3x4fbWuGd92yki-Tos5quwnTGNlzdLyMCP0XEQLb7OBy-xR697sAtrdO2MadHqGH6Kdcz6fMqZpxtSSSXWi_L9tBRnJdprb5q"/>
<div class="absolute top-3 right-3 bg-surface/90 backdrop-blur px-3 py-1 rounded-full text-primary font-label-sm text-label-sm font-bold border border-primary/20">
                                250 pts
                            </div>
</div>
<div class="p-lg">
<span class="text-secondary font-label-sm text-label-sm uppercase tracking-wider mb-xs block">Design</span>
<h3 class="font-headline-sm text-headline-sm mb-md group-hover:text-primary transition-colors">UI/UX Design for Mobile Apps</h3>
<div class="flex items-center gap-sm mb-lg">
<div class="w-10 h-10 rounded-full bg-tertiary-fixed flex items-center justify-center font-bold text-tertiary">DA</div>
<div>
<p class="font-label-md text-label-md">Dwi Aris</p>
<div class="flex items-center gap-xs">
<span class="material-symbols-outlined text-[14px] text-secondary" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="text-on-surface-variant font-label-sm text-label-sm">4.9 (42)</span>
</div>
</div>
</div>
<button class="w-full py-2 border border-primary text-primary rounded-lg font-label-md text-label-md hover:bg-primary hover:text-on-primary transition-all">View Details</button>
</div>
</div>
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden soft-shadow hover:-translate-y-1 transition-transform duration-300 group">
<div class="relative h-48 overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="A focused and professional writing environment, showcasing a high-end pen resting on a leather-bound notebook next to a sleek, modern laptop. The workspace is part of a bright, contemporary co-working space with floor-to-ceiling windows and lush indoor plants. The lighting is crisp and natural, highlighting a clean-cut, sophisticated aesthetic for a professional copywriter or editor." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDssadHW1j5_9aIEuTXod2tDK8rpCg-M_vgiF6rNfS20dPSz40Zm_xcLTojUHe5_IHPG-V7WjzBfTkiQHIz0NusiwMmfL8EtrRfKwt200qJu86N8tNejwZVwVAwzWOatYVV65omBHsqxtpjak7ohGA4-U6fT-70bKpbRcFOUG62ds0SIB2T4plvoKOxEBTkv4sEbzdm3D_qpyziCNBlhctPVf-j2EN1epAj67hRkZpEcvbwUXg8NRliKBEeCuJZhlk6ALEKJh7F5h-J"/>
<div class="absolute top-3 right-3 bg-surface/90 backdrop-blur px-3 py-1 rounded-full text-primary font-label-sm text-label-sm font-bold border border-primary/20">
                                200 pts
                            </div>
</div>
<div class="p-lg">
<span class="text-secondary font-label-sm text-label-sm uppercase tracking-wider mb-xs block">Writing</span>
<h3 class="font-headline-sm text-headline-sm mb-md group-hover:text-primary transition-colors">Professional Copywriting &amp; SEO Articles</h3>
<div class="flex items-center gap-sm mb-lg">
<div class="w-10 h-10 rounded-full bg-secondary-fixed flex items-center justify-center font-bold text-on-secondary-fixed">EW</div>
<div>
<p class="font-label-md text-label-md">Eka Wijaya</p>
<div class="flex items-center gap-xs">
<span class="material-symbols-outlined text-[14px] text-secondary" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="text-on-surface-variant font-label-sm text-label-sm">4.6 (112)</span>
</div>
</div>
</div>
<button class="w-full py-2 border border-primary text-primary rounded-lg font-label-md text-label-md hover:bg-primary hover:text-on-primary transition-all">View Details</button>
</div>
</div>
</div>
<!-- Pagination -->
<div class="mt-2xl flex items-center justify-center gap-sm">
<button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant hover:bg-surface-container transition-colors">
<span class="material-symbols-outlined">chevron_left</span>
</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg bg-primary text-on-primary font-label-md text-label-md shadow-md">1</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant hover:bg-surface-container transition-colors font-label-md text-label-md">2</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant hover:bg-surface-container transition-colors font-label-md text-label-md">3</button>
<span class="px-2 text-on-surface-variant">...</span>
<button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant hover:bg-surface-container transition-colors font-label-md text-label-md">12</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant hover:bg-surface-container transition-colors">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</div>
</div>
</div>
</main>
<!-- Footer -->
<footer class="w-full py-xl px-margin-desktop grid grid-cols-1 md:grid-cols-4 gap-gutter bg-surface-container-lowest border-t border-outline-variant">
<div class="flex flex-col gap-md">
<span class="font-headline-md text-headline-md font-bold text-on-surface">Tukar Jasa</span>
<p class="text-on-surface-variant font-body-sm text-body-sm max-w-[240px]">The premier community-driven marketplace for professional skill-sharing and collaboration.</p>
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
<a class="text-on-surface-variant font-body-sm text-body-sm hover:text-secondary transition-colors" href="#">Support</a>
</div>
<div class="flex flex-col gap-sm">
<h4 class="font-label-md text-label-md text-primary mb-sm">Connect</h4>
<div class="flex gap-md">
<span class="material-symbols-outlined text-on-surface-variant hover:text-primary cursor-pointer transition-colors">public</span>
<span class="material-symbols-outlined text-on-surface-variant hover:text-primary cursor-pointer transition-colors">mail</span>
<span class="material-symbols-outlined text-on-surface-variant hover:text-primary cursor-pointer transition-colors">share</span>
</div>
<p class="text-on-surface-variant font-body-sm text-body-sm mt-md">© 2024 Tukar Jasa Skill Exchange. All rights reserved.</p>
</div>
</footer>
<script>
        // Simple micro-interaction for filter range update
        const range = document.querySelector('input[type="range"]');
        if (range) {
            range.addEventListener('input', (e) => {
                const value = e.target.value;
                const display = e.target.nextElementSibling.lastElementChild;
                display.textContent = `${value} pts`;
            });
        }

        // Card hover scale effects already handled by Tailwind transition classes
    </script>
</body></html>