<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>{{ $pageTitle ?? 'Tukar Jasa' }}</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script id="tailwind-config">
tailwind.config = {
    darkMode: "class",
    theme: {
        extend: {
            "colors": {
                "inverse-surface": "#2d3133","on-secondary": "#ffffff","on-tertiary-container": "#78b2ff",
                "inverse-on-surface": "#eff1f3","error-container": "#ffdad6","tertiary-fixed": "#d4e3ff",
                "surface-container-low": "#f2f4f6","on-primary": "#ffffff","tertiary-container": "#00447d",
                "inverse-primary": "#c3c0ff","surface-container-highest": "#e0e3e5","on-tertiary": "#ffffff",
                "on-secondary-fixed-variant": "#5a00c6","on-secondary-container": "#fffbff","on-primary-fixed": "#0f0069",
                "background": "#f7f9fb","on-error": "#ffffff","on-secondary-fixed": "#25005a",
                "secondary-fixed-dim": "#d2bbff","surface-tint": "#544fc0","secondary-container": "#8a4cfc",
                "outline-variant": "#c8c4d5","secondary": "#712ae2","outline": "#777584",
                "surface-container-high": "#e6e8ea","on-primary-fixed-variant": "#3b35a7",
                "surface-variant": "#e0e3e5","secondary-fixed": "#eaddff","on-surface-variant": "#464553",
                "primary-container": "#3730a3","tertiary-fixed-dim": "#a4c9ff","surface-dim": "#d8dadc",
                "on-tertiary-fixed-variant": "#004883","primary-fixed-dim": "#c3c0ff","tertiary": "#002d57",
                "surface-bright": "#f7f9fb","on-surface": "#191c1e","on-primary-container": "#a9a7ff",
                "primary": "#1f108e","error": "#ba1a1a","primary-fixed": "#e2dfff","on-background": "#191c1e",
                "surface": "#f7f9fb","surface-container-lowest": "#ffffff","on-error-container": "#93000a",
                "surface-container": "#eceef0","on-tertiary-fixed": "#001c39"
            },
            "borderRadius": {"DEFAULT": "0.25rem","lg": "0.5rem","xl": "0.75rem","full": "9999px"},
            "spacing": {
                "sm": "8px","xl": "32px","2xl": "48px","margin-desktop": "40px","margin-mobile": "16px",
                "base": "4px","md": "16px","lg": "24px","gutter": "24px","3xl": "64px","xs": "4px"
            },
            "fontFamily": {
                "body-lg": ["Inter"],"headline-sm": ["Inter"],"label-md": ["Inter"],"body-md": ["Inter"],
                "headline-md": ["Inter"],"headline-lg-mobile": ["Inter"],"headline-lg": ["Inter"],
                "body-sm": ["Inter"],"display-lg": ["Inter"],"label-sm": ["Inter"]
            },
            "fontSize": {
                "body-lg": ["18px", {"lineHeight": "1.6","fontWeight": "400"}],
                "headline-sm": ["20px", {"lineHeight": "1.4","fontWeight": "600"}],
                "label-md": ["14px", {"lineHeight": "1","letterSpacing": "0.01em","fontWeight": "600"}],
                "body-md": ["16px", {"lineHeight": "1.6","fontWeight": "400"}],
                "headline-md": ["24px", {"lineHeight": "1.3","fontWeight": "600"}],
                "headline-lg": ["32px", {"lineHeight": "1.25","letterSpacing": "-0.01em","fontWeight": "600"}],
                "body-sm": ["14px", {"lineHeight": "1.5","fontWeight": "400"}],
                "display-lg": ["48px", {"lineHeight": "1.2","letterSpacing": "-0.02em","fontWeight": "700"}],
                "label-sm": ["12px", {"lineHeight": "1","letterSpacing": "0.02em","fontWeight": "500"}]
            }
        }
    }
}
</script>
<style>
    .primary-gradient { background: linear-gradient(135deg, #712ae2 0%, #1f108e 100%); }
    body { background-color: #F8FAFC; }
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; vertical-align: middle; }
</style>