<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QuoteIt — Cyber Security Vault</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        @theme {
            --font-sans: 'Instrument Sans', sans-serif;
            --color-tuwaiq-purple: #432a80;
            --color-tuwaiq-purple-light: #53398f;
            --color-tuwaiq-purple-dark: #2c1a5b;
            --color-tuwaiq-orange: #f2a54a;
            --color-tuwaiq-teal: #4fc9b0;
        }
    </style>
</head>
<body class="min-h-full flex flex-col bg-[#0d091a] text-slate-100 font-sans selection:bg-[#4fc9b0] selection:text-[#0d091a]">

    <x-navbar :page="$page ?? ''" />

    <main class="flex-1">
        @yield('content')
    </main>

    <footer class="border-t border-white/5 py-6 text-center text-xs text-slate-500">
        <div class="max-w-4xl mx-auto px-4 flex flex-col sm:flex-row items-center justify-between gap-3">
            <div class="flex items-center gap-2">
                <span class="font-semibold text-slate-300">QuoteIt • Cyber Vault</span>
                <span>•</span>
                <span>Tuwaiq Academy</span>
            </div>
            <p>Designed by Shahad — Laravel & Blade</p>
        </div>
    </footer>

</body>
</html>