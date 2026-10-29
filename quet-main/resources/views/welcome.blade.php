@php
    $currentUser = Auth::user();
    $userName = $currentUser ? $currentUser->name : 'Agent';
    $userId = $currentUser ? $currentUser->id : 0;
    $dbQuotes = isset($quotes) ? $quotes : [];

    $cyberQuotes = [
        [
            'id' => 'sec_1',
            'text' => 'Security is not a product, but a continuous process.',
            'author' => 'Bruce Schneier',
            'role' => 'Cryptographer & Security Fellow',
            'date' => '2026-10-18',
            'likes' => 38,
            'tag' => 'Defense',
        ],
        [
            'id' => 'sec_2',
            'text' => 'There is no patch for human stupidity; awareness is the first firewall.',
            'author' => 'Kevin Mitnick',
            'role' => 'Legendary Hacker & Author',
            'date' => '2026-10-19',
            'likes' => 64,
            'tag' => 'Social Engineering',
        ],
        [
            'id' => 'sec_3',
            'text' => 'The only truly secure system is one that is powered off and buried in concrete.',
            'author' => 'Gene Spafford',
            'role' => 'Computer Scientist',
            'date' => '2026-10-20',
            'likes' => 51,
            'tag' => 'Architecture',
        ],
        [
            'id' => 'sec_4',
            'text' => 'The quieter you become, the more you are able to hear.',
            'author' => 'Cyber Doctrine',
            'role' => 'Defensive Intelligence',
            'date' => '2026-10-20',
            'likes' => 45,
            'tag' => 'Mindset',
        ],
    ];
@endphp
<!DOCTYPE html>
<html lang="en" class="h-full">
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

    <!-- Navigation Bar -->
    <header class="sticky top-0 z-40 w-full border-b border-white/10 bg-[#0d091a]/90 backdrop-blur-xl">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="<?= url('/logout') ?>" class="px-4 py-2 rounded-xl bg-white/5 hover:bg-rose-500/20 hover:text-rose-300 text-slate-300 font-medium text-xs border border-white/10 transition-all">
                    Log Out 🚪
                </a>
                <div class="flex items-center gap-2.5 pl-2 border-l border-white/10">
                    <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-[#f2a54a] to-[#4fc9b0] text-[#0d091a] flex items-center justify-center text-xs font-black ring-1 ring-white/20 shadow">
                        <?= strtoupper(substr($userName, 0, 1)) ?>
                    </div>
                    <span class="text-xs font-semibold text-slate-200 hidden sm:inline"><?= htmlspecialchars($userName) ?></span>
                </div>
            </div>

            <div class="absolute left-1/2 -translate-x-1/2">
                <a href="<?= url('/') ?>" class="flex items-center gap-2 group">
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

    <!-- Main Content -->
    <main class="flex-1">
        <div class="max-w-4xl mx-auto px-4 py-8 sm:py-12">

            <!-- Cyber Hero Card -->
            <div class="relative rounded-3xl p-6 sm:p-8 bg-gradient-to-r from-[#1f1238] via-[#160f2b] to-[#0f172a] border border-[#4fc9b0]/30 shadow-2xl mb-8 overflow-hidden">
                <div class="absolute -top-20 -right-20 w-64 h-64 bg-[#4fc9b0]/15 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-[#f2a54a]/15 rounded-full blur-3xl pointer-events-none"></div>

                <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                    <div class="space-y-3">
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#4fc9b0]/15 text-[#4fc9b0] text-xs font-bold border border-[#4fc9b0]/30">
                                <span class="w-2 h-2 rounded-full bg-[#4fc9b0] animate-ping"></span>
                                Cyber Security Vault
                            </span>
                            <span class="text-xs text-slate-400">Authenticated Session</span>
                        </div>
                        <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                            Welcome, <span class="bg-gradient-to-r from-[#4fc9b0] via-[#f2a54a] to-purple-300 bg-clip-text text-transparent"><?= htmlspecialchars($userName) ?></span> 🛡️
                        </h1>
                        <p class="text-xs sm:text-sm text-slate-300 max-w-xl leading-relaxed">
                            Explore curated cyber defense insights, share your security philosophy, and save valuable threat intelligence to your private playbook.
                        </p>
                    </div>

                    <div class="flex items-center gap-3">
                        <button 
                            type="button" 
                            onclick="triggerRandomInspire()"
                            class="px-4 py-3 rounded-2xl bg-white/10 hover:bg-[#4fc9b0]/20 text-white hover:text-[#4fc9b0] border border-white/15 hover:border-[#4fc9b0]/40 text-xs font-bold transition flex items-center gap-2 shadow-lg cursor-pointer"
                        >
                            <span>🎲</span>
                            <span>Daily Cyber Intel</span>
                        </button>
                    </div>
                </div>

                <div class="mt-6 pt-5 border-t border-white/10 flex flex-wrap items-center justify-between gap-3 text-xs">
                    <div class="flex items-center gap-4 text-slate-400">
                        <span class="flex items-center gap-1.5"><span class="text-[#4fc9b0]">●</span> Active Protection</span>
                        <span class="flex items-center gap-1.5"><span class="text-[#f2a54a]">●</span> Verified Identity</span>
                    </div>
                    
                    <div class="flex items-center p-1 rounded-xl bg-black/40 border border-white/10 font-semibold">
                        <button type="button" onclick="filterFeed('all')" id="tab-all" class="filter-tab px-3.5 py-1.5 rounded-lg bg-[#432a80] text-white transition cursor-pointer">
                            All Intel
                        </button>
                        <button type="button" onclick="filterFeed('my')" id="tab-my" class="filter-tab px-3.5 py-1.5 rounded-lg text-slate-300 hover:text-white transition cursor-pointer">
                            My Quotes
                        </button>
                        <button type="button" onclick="filterFeed('favorites')" id="tab-favorites" class="filter-tab px-3.5 py-1.5 rounded-lg text-slate-300 hover:text-white transition flex items-center gap-1.5 cursor-pointer">
                            <span>Saved Vault</span>
                            <span id="fav-badge" class="w-4 h-4 rounded-full bg-[#f2a54a] text-[#0d091a] text-[10px] font-bold flex items-center justify-center">0</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Decrypted Intel Box -->
            <div id="random-intel-box" class="hidden mb-6 p-4 rounded-2xl bg-gradient-to-r from-[#4fc9b0]/20 via-[#432a80]/30 to-black/40 border border-[#4fc9b0]/50 text-white text-xs sm:text-sm flex items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <span class="text-xl">⚡</span>
                    <div>
                        <span class="font-bold text-[#4fc9b0] block text-[11px] uppercase tracking-wider">Cyber Tip Decrypted:</span>
                        <span id="random-intel-text" class="italic">"Think before you click. Verification saves systems."</span>
                    </div>
                </div>
                <button onclick="document.getElementById('random-intel-box').classList.add('hidden')" class="text-slate-400 hover:text-white text-base cursor-pointer">✕</button>
            </div>

            <!-- Quotes Feed -->
            <div class="space-y-4" id="quotes-container">

                <!-- Database Quotes Created by Users -->
                <?php if (count($dbQuotes) > 0): ?>
                    <?php foreach ($dbQuotes as $quote): ?>
                        <?php $isMyQuote = ($quote->user_id == $userId); ?>
                        <div class="quote-wrapper <?= $isMyQuote ? 'my-quote-item' : 'community-quote-item' ?>" data-id="db_<?= $quote->id ?>">
                            <blockquote class="relative rounded-2xl p-6 <?= $isMyQuote ? 'bg-gradient-to-br from-[#3b206f] to-[#231245] border border-white/20' : 'bg-[#18112c] border border-white/10' ?> shadow-xl text-white">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center gap-2.5">
                                        <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-[#f2a54a] to-[#4fc9b0] text-[#0d091a] flex items-center justify-center font-extrabold text-xs shadow">
                                            <?= strtoupper(substr($quote->author ?? 'A', 0, 1)) ?>
                                        </div>
                                        <div>
                                            <div class="flex items-center gap-2">
                                                <span class="text-xs font-bold text-white"><?= htmlspecialchars($quote->author ?? 'Agent') ?></span>
                                                <span class="px-2 py-0.5 rounded-full bg-[#4fc9b0]/20 border border-[#4fc9b0]/40 text-[#4fc9b0] text-[10px] font-semibold"><?= htmlspecialchars($quote->tag ?? 'Cyber Intel') ?></span>
                                                <?php if ($isMyQuote): ?>
                                                    <span class="px-2 py-0.5 rounded-full bg-purple-500/20 border border-purple-400/40 text-purple-300 text-[10px] font-medium">You</span>
                                                <?php endif; ?>
                                            </div>
                                            <span class="text-[10px] text-slate-400"><?= $quote->created_at ? $quote->created_at->diffForHumans() : 'Just now' ?></span>
                                        </div>
                                    </div>
                                    
                                    <?php if ($isMyQuote): ?>
                                        <div class="flex items-center gap-1.5">
                                            <form method="POST" action="<?= url('/quotes/' . $quote->id . '/delete') ?>" onsubmit="return confirm('Delete this quote?');" style="display:inline;">
                                                <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                                                <button type="submit" title="Delete your quote" class="p-1.5 rounded-lg hover:bg-rose-500/20 text-rose-300 transition cursor-pointer">
                                                    🗑️
                                                </button>
                                            </form>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <p class="text-base sm:text-lg font-medium leading-relaxed mb-4 text-slate-100">
                                    "<?= htmlspecialchars($quote->text) ?>"
                                </p>

                                <div class="pt-3 border-t border-white/10 flex items-center justify-between text-xs">
                                    <div class="flex items-center gap-3">
                                        <button type="button" onclick="toggleLike('db_<?= $quote->id ?>')" id="like-btn-db_<?= $quote->id ?>" class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 transition font-semibold text-white cursor-pointer">
                                            <span id="heart-icon-db_<?= $quote->id ?>">🤍</span>
                                            <span id="like-count-db_<?= $quote->id ?>">1</span>
                                        </button>
                                        <button type="button" onclick="toggleBookmark('db_<?= $quote->id ?>')" id="fav-btn-db_<?= $quote->id ?>" class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 transition font-semibold text-white cursor-pointer">
                                            <span id="fav-icon-db_<?= $quote->id ?>">🔖</span>
                                            <span id="fav-text-db_<?= $quote->id ?>">Save</span>
                                        </button>
                                    </div>
                                    <span class="text-[11px] text-[#4fc9b0]/80"><?= htmlspecialchars($quote->author) ?>'s Vault</span>
                                </div>
                            </blockquote>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <!-- Curated Cyber Security Doctrine Quotes -->
                <?php foreach ($cyberQuotes as $quote): ?>
                    <div class="quote-wrapper community-quote-item" data-id="<?= $quote['id'] ?>">
                        <blockquote class="rounded-2xl p-6 bg-white border border-slate-200 shadow-md text-slate-800 hover:shadow-xl transition-all duration-200">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-9 h-9 rounded-xl bg-[#432a80]/10 text-[#432a80] flex items-center justify-center font-bold text-xs border border-[#432a80]/20">
                                        🛡️
                                    </div>
                                    <div>
                                        <span class="text-xs font-bold block text-slate-900"><?= htmlspecialchars($quote['author']) ?></span>
                                        <span class="text-[10px] text-slate-400"><?= $quote['role'] ?> • <?= $quote['date'] ?></span>
                                    </div>
                                </div>
                                <span class="px-2.5 py-0.5 rounded-full bg-slate-100 text-[#432a80] text-[10px] font-bold border border-slate-200">
                                    <?= $quote['tag'] ?>
                                </span>
                            </div>

                            <p class="text-base sm:text-lg font-medium leading-relaxed text-[#2c1a5b] mb-4">
                                "<?= htmlspecialchars($quote['text']) ?>"
                            </p>

                            <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                                <div class="flex items-center gap-3">
                                    <button type="button" onclick="toggleLike('<?= $quote['id'] ?>')" id="like-btn-<?= $quote['id'] ?>" class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-slate-100 hover:bg-rose-50 text-slate-700 transition font-semibold cursor-pointer">
                                        <span id="heart-icon-<?= $quote['id'] ?>">🤍</span>
                                        <span id="like-count-<?= $quote['id'] ?>"><?= $quote['likes'] ?></span>
                                    </button>
                                    <button type="button" onclick="toggleBookmark('<?= $quote['id'] ?>')" id="fav-btn-<?= $quote['id'] ?>" class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-slate-100 hover:bg-amber-50 text-slate-700 transition font-semibold cursor-pointer">
                                        <span id="fav-icon-<?= $quote['id'] ?>">🔖</span>
                                        <span id="fav-text-<?= $quote['id'] ?>">Save</span>
                                    </button>
                                </div>
                                <span class="text-[11px] text-slate-400">Verified Doctrine</span>
                            </div>
                        </blockquote>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </main>

    <!-- Floating Action Button (+ Transmit Intel) -->
    <button 
        popovertarget="quote-popup" 
        class="fixed bottom-8 right-8 w-14 h-14 rounded-full bg-gradient-to-tr from-[#432a80] via-[#53398f] to-[#4fc9b0] text-white text-2xl font-bold shadow-2xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all z-40 border-2 border-white/30 cursor-pointer"
        title="Transmit new cyber intel"
    >
        +
    </button>

    <!-- PopUp Modal -->
    <div 
        id="quote-popup" 
        popover 
        class="m-auto rounded-3xl p-6 sm:p-8 bg-[#18112c] text-white border border-[#4fc9b0]/30 shadow-2xl max-w-lg w-[92vw] backdrop:bg-black/70 backdrop:backdrop-blur-sm"
    >
        <div class="flex items-center justify-between mb-4 pb-3 border-b border-white/10">
            <h3 class="text-lg font-bold flex items-center gap-2">
                <span>🛡️</span>
                <span>Transmit Security Intel</span>
            </h3>
            <button popovertarget="quote-popup" popovertargetaction="hide" class="text-slate-400 hover:text-white text-xl cursor-pointer">✕</button>
        </div>

        <form method="POST" action="<?= url('/quotes') ?>" class="space-y-4">
            <input type="hidden" name="_token" value="<?= csrf_token() ?>">

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">Author Identity:</label>
                <div class="px-4 py-2.5 rounded-xl bg-white/5 border border-white/10 text-xs text-[#4fc9b0] font-bold flex items-center gap-2">
                    <span>👤</span>
                    <span><?= htmlspecialchars($userName) ?> (You)</span>
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-2">Security Advice or Quote:</label>
                <textarea 
                    name="text" 
                    rows="4" 
                    required 
                    minlength="3" 
                    maxlength="155" 
                    placeholder="Share a cybersecurity tip, defensive rule, or inspiring thought (3 to 155 chars)..." 
                    class="w-full p-4 rounded-xl bg-black/40 border border-white/20 text-white placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-[#4fc9b0] text-sm leading-relaxed"
                    oninput="updateCharCount(this)"
                ></textarea>
                <div class="flex justify-between text-[11px] text-slate-400 mt-1">
                    <span>Min 3 chars</span>
                    <span id="char-counter">0 / 155</span>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-2">
                <button type="button" popovertarget="quote-popup" popovertargetaction="hide" class="px-5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-xs font-medium text-white transition cursor-pointer">
                    Cancel
                </button>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-[#432a80] via-[#53398f] to-[#4fc9b0] hover:brightness-110 text-white text-xs font-bold shadow-lg transition cursor-pointer">
                    Transmit Intel 🚀
                </button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <footer class="border-t border-white/5 py-6 text-center text-xs text-slate-500">
        <div class="max-w-4xl mx-auto px-4 flex flex-col sm:flex-row items-center justify-between gap-3">
            <div class="flex items-center gap-2">
                <span class="font-semibold text-slate-300">QuoteIt • Cyber Vault</span>
                <span>•</span>
                <span>Tuwaiq Academy</span>
            </div>
            <p>Designed by Shahad — Laravel & SQLite</p>
        </div>
    </footer>

    <!-- JavaScript Logic -->
    <script>
        let favorites = JSON.parse(localStorage.getItem('quoteit_cyber_favs') || '[]');
        let likes = JSON.parse(localStorage.getItem('quoteit_cyber_likes') || '{}');

        const randomTips = [
            "Passwords are like keys: never leave them where anyone can see them.",
            "Zero Trust Principle: Never trust, always verify every single request.",
            "Backups you haven't tested are not real backups.",
            "Multi-Factor Authentication (MFA) stops over 99% of automated attacks.",
            "The best cyber defense starts with curiosity and continuous learning."
        ];

        document.addEventListener('DOMContentLoaded', () => {
            updateFavoritesBadge();
            favorites.forEach(id => applyBookmarkState(id, true));
            Object.keys(likes).forEach(id => applyLikeState(id, true, likes[id]));
        });

        function triggerRandomInspire() {
            const box = document.getElementById('random-intel-box');
            const text = document.getElementById('random-intel-text');
            const randomIndex = Math.floor(Math.random() * randomTips.length);
            text.textContent = `"${randomTips[randomIndex]}"`;
            box.classList.remove('hidden');
        }

        function toggleLike(id) {
            const countSpan = document.getElementById(`like-count-${id}`);
            let currentLikes = parseInt(countSpan.textContent) || 0;

            if (likes[id]) {
                delete likes[id];
                currentLikes = Math.max(0, currentLikes - 1);
                applyLikeState(id, false, currentLikes);
            } else {
                likes[id] = currentLikes + 1;
                currentLikes = likes[id];
                applyLikeState(id, true, currentLikes);
            }
            localStorage.setItem('quoteit_cyber_likes', JSON.stringify(likes));
        }

        function applyLikeState(id, isLiked, count) {
            const countSpan = document.getElementById(`like-count-${id}`);
            const iconSpan = document.getElementById(`heart-icon-${id}`);
            const btn = document.getElementById(`like-btn-${id}`);
            if (!countSpan) return;

            countSpan.textContent = count;
            if (isLiked) {
                iconSpan.textContent = '❤️';
                btn.classList.add('bg-rose-500/20', 'text-rose-400');
            } else {
                iconSpan.textContent = '🤍';
                btn.classList.remove('bg-rose-500/20', 'text-rose-400');
            }
        }

        function toggleBookmark(id) {
            const index = favorites.indexOf(id);
            if (index > -1) {
                favorites.splice(index, 1);
                applyBookmarkState(id, false);
            } else {
                favorites.push(id);
                applyBookmarkState(id, true);
            }
            localStorage.setItem('quoteit_cyber_favs', JSON.stringify(favorites));
            updateFavoritesBadge();
        }

        function applyBookmarkState(id, isBookmarked) {
            const btn = document.getElementById(`fav-btn-${id}`);
            const icon = document.getElementById(`fav-icon-${id}`);
            const text = document.getElementById(`fav-text-${id}`);
            if (!btn) return;

            if (isBookmarked) {
                icon.textContent = '⭐';
                text.textContent = 'Saved';
                btn.classList.add('bg-amber-500/25', 'text-amber-400', 'border', 'border-amber-400/40');
            } else {
                icon.textContent = '🔖';
                text.textContent = 'Save';
                btn.classList.remove('bg-amber-500/25', 'text-amber-400', 'border', 'border-amber-400/40');
            }
        }

        function updateFavoritesBadge() {
            const badge = document.getElementById('fav-badge');
            if (badge) badge.textContent = favorites.length;
        }

        function filterFeed(tab) {
            document.querySelectorAll('.filter-tab').forEach(b => {
                b.classList.remove('bg-[#432a80]', 'text-white');
                b.classList.add('text-slate-300');
            });
            const activeBtn = document.getElementById(`tab-${tab}`);
            if (activeBtn) {
                activeBtn.classList.add('bg-[#432a80]', 'text-white');
                activeBtn.classList.remove('text-slate-300');
            }

            const items = document.querySelectorAll('.quote-wrapper');
            items.forEach(el => {
                const id = el.getAttribute('data-id');
                const isMy = el.classList.contains('my-quote-item');
                if (tab === 'all') {
                    el.style.display = 'block';
                } else if (tab === 'my') {
                    el.style.display = isMy ? 'block' : 'none';
                } else if (tab === 'favorites') {
                    el.style.display = favorites.includes(id) ? 'block' : 'none';
                }
            });
        }

        function updateCharCount(textarea) {
            document.getElementById('char-counter').textContent = `${textarea.value.length} / 155`;
        }
    </script>
</body>
</html>