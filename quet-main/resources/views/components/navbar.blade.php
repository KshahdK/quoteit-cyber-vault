@props(['page' => ''])

@php
    $userName = session('user_name', request('name', 'Shahad'));
    $isLoggedIn = !in_array($page, ['Sign Up', 'Log In']) && (session()->has('user_name') || request()->has('name') || !request()->has('guest'));
@endphp

<header class="sticky top-0 z-40 w-full border-b border-white/10 bg-[#0d091a]/90 backdrop-blur-xl">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
        
        <div class="flex items-center gap-4">
            @if ($page === 'Sign Up')
                <a href="{{ route('login') }}" class="px-5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white font-medium text-sm border border-white/15 transition-all">
                    Log In
                </a>
            @elseif ($page === 'Log In')
                <a href="{{ route('signup') }}" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-[#432a80] to-[#53398f] hover:brightness-110 text-white font-medium text-sm shadow-md transition-all">
                    Sign Up
                </a>
            @else
                @if ($isLoggedIn)
                    <div class="flex items-center gap-3">
                        <form method="GET" action="{{ route('home') }}">
                            <input type="hidden" name="guest" value="1">
                            <button type="submit" class="px-4 py-2 rounded-xl bg-white/5 hover:bg-rose-500/20 hover:text-rose-300 text-slate-300 font-medium text-xs border border-white/10 transition-all">
                                Log Out
                            </button>
                        </form>
                        <div class="flex items-center gap-2.5 pl-2 border-l border-white/10">
                            <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-[#f2a54a] to-[#4fc9b0] text-[#0d091a] flex items-center justify-center text-xs font-black ring-1 ring-white/20 shadow">
                                {{ strtoupper(substr($userName, 0, 1)) }}
                            </div>
                            <span class="text-xs font-semibold text-slate-200 hidden sm:inline">{{ $userName }}</span>
                        </div>
                    </div>
                @else
                    <div class="flex items-center gap-2">
                        <a href="{{ route('login') }}" class="px-4 py-2 rounded-xl text-slate-300 hover:text-white text-xs font-medium transition-all">
                            Log In
                        </a>
                        <a href="{{ route('signup') }}" class="px-4 py-2 rounded-xl bg-[#432a80] hover:bg-[#53398f] text-white text-xs font-semibold shadow transition-all">
                            Sign Up
                        </a>
                    </div>
                @endif
            @endif
        </div>

        <div class="absolute left-1/2 -translate-x-1/2">
            <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-[#432a80] via-[#53398f] to-[#4fc9b0] flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform border border-white/20">
                    <span class="text-sm">🛡️</span>
                </div>
                <span class="text-xl font-bold tracking-tight bg-gradient-to-r from-white via-slate-100 to-[#4fc9b0] bg-clip-text text-transparent">
                    QuoteIt
                </span>
            </a>
        </div>

        <div class="flex items-center gap-3">
            <div class="flex items-center gap-2 text-right">
                <div class="hidden md:block">
                    <p class="text-[11px] font-bold text-white tracking-wide">Tuwaiq CLUB</p>
                    <p class="text-[9px] text-[#4fc9b0] uppercase tracking-wider font-semibold">Academy • UQU</p>
                </div>
                <div class="w-8 h-8 rounded-lg bg-[#432a80]/60 border border-[#4fc9b0]/30 flex items-center justify-center">
                    <span class="text-xs font-extrabold text-[#f2a54a]">T</span>
                </div>
            </div>
        </div>

    </div>
</header>