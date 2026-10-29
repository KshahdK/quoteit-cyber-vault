<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up — QuoteIt Cyber Vault</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        @theme {
            --font-sans: 'Instrument Sans', sans-serif;
            --color-tuwaiq-purple: #432a80;
            --color-tuwaiq-purple-light: #53398f;
            --color-tuwaiq-orange: #f2a54a;
            --color-tuwaiq-teal: #4fc9b0;
        }
    </style>
</head>
<body class="min-h-full flex items-center justify-center bg-[#0d091a] text-slate-100 font-sans p-4 selection:bg-[#4fc9b0] selection:text-[#0d091a]">

    <div class="w-full max-w-4xl rounded-3xl overflow-hidden shadow-2xl border border-white/10 grid grid-cols-1 lg:grid-cols-12 min-h-[550px] bg-[#140e26]">
        
        <!-- Form Section -->
        <div class="lg:col-span-7 p-8 sm:p-12 flex flex-col justify-center">
            <div class="mb-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#4fc9b0]/15 text-[#4fc9b0] text-xs font-bold border border-[#4fc9b0]/30 mb-3">
                    <span class="w-2 h-2 rounded-full bg-[#4fc9b0] animate-ping"></span>
                    <span>New Agent Registration</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">Create Account 🛡️</h2>
                <p class="text-xs sm:text-sm text-slate-400 mt-1">Join QuoteIt Cyber Vault and publish your defensive security insights.</p>
            </div>

            @if ($errors->any())
                <div class="mb-4 p-3 rounded-xl bg-rose-500/20 border border-rose-500/40 text-rose-300 text-xs">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ url('/signup') }}" class="space-y-4">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div>
                    <label for="name" class="block text-xs font-semibold text-slate-300 mb-1">Agent Name / Call-sign</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        required 
                        minlength="2" 
                        maxlength="50"
                        value="{{ old('name') }}"
                        placeholder="e.g. Shahad, Cipher, Alex"
                        class="w-full px-4 py-3 rounded-xl bg-black/40 border border-white/15 text-white placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-[#4fc9b0] text-sm"
                    >
                </div>

                <div>
                    <label for="email" class="block text-xs font-semibold text-slate-300 mb-1">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        required 
                        value="{{ old('email') }}"
                        placeholder="agent@tuwaiq.edu.sa"
                        class="w-full px-4 py-3 rounded-xl bg-black/40 border border-white/15 text-white placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-[#4fc9b0] text-sm"
                    >
                </div>

                <div>
                    <label for="password" class="block text-xs font-semibold text-slate-300 mb-1">Security Key (Password)</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        minlength="6"
                        placeholder="••••••••"
                        class="w-full px-4 py-3 rounded-xl bg-black/40 border border-white/15 text-white placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-[#4fc9b0] text-sm"
                    >
                </div>

                <button 
                    type="submit" 
                    class="w-full py-3.5 rounded-xl bg-gradient-to-r from-[#432a80] via-[#53398f] to-[#4fc9b0] hover:brightness-110 text-white font-bold text-sm shadow-xl transition-all cursor-pointer mt-2"
                >
                    Register & Enter Vault 🚀
                </button>

                <div class="text-center pt-4 border-t border-white/10 text-xs text-slate-400">
                    Already registered? 
                    <a href="{{ url('/login') }}" class="text-[#f2a54a] font-bold hover:underline ml-1">
                        Sign In
                    </a>
                </div>
            </form>
        </div>

        <!-- Visual Side -->
        <div class="lg:col-span-5 relative hidden lg:flex flex-col justify-between p-10 bg-gradient-to-br from-[#432a80] via-[#2c1854] to-[#120a24] text-white">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-[#4fc9b0]">Tuwaiq CLUB • UQU</span>
                <span class="text-xs text-slate-400">Project 2026</span>
            </div>
            <div>
                <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center text-2xl mb-4 border border-white/20">
                    🛡️
                </div>
                <h3 class="text-xl font-bold mb-2">QuoteIt Cyber Vault</h3>
                <p class="text-xs text-slate-300 leading-relaxed">
                    A secure repository for sharing cybersecurity wisdom, threat intelligence rules, and defensive best practices.
                </p>
            </div>
            <div class="text-[11px] text-slate-400 pt-4 border-t border-white/10">
                Designed by Shahad — Laravel & SQLite
            </div>
        </div>

    </div>

</body>
</html>