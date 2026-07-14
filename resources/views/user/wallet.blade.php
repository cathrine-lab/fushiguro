<!DOCTYPE html>
<html class="light" lang="en">
<head>
    @include('user.partials.head', ['pageTitle' => 'Points Wallet | Tukar Jasa'])
    <style>
        .balance-card-3d {
            transition: transform 0.2s ease-out;
            transform-style: preserve-3d;
        }
    </style>
</head>
<body class="bg-background text-on-surface font-body-md overflow-x-hidden flex flex-col min-h-screen">
    
    <!-- Sidebar Tetap Menggunakan Partial Sistem -->
    @include('user.partials.sidebar')
    
    <!-- Main Content Canvas -->
    <main class="md:ml-[280px] min-h-screen p-margin-mobile md:p-margin-desktop pt-12 pb-3xl flex-1">
        
        <!-- Header Global Baru -->
        @include('user.partials.header', ['title' => 'Points Wallet'])

        <!-- Page Header Section (BARU) -->
        <div class="mt-xl mb-2xl">
            <h1 class="font-headline-lg text-headline-lg text-on-surface mb-xs">Poin</h1>
            <p class="font-body-md text-body-md text-on-surface-variant max-w-2xl">
                Kelola poin yang Anda peroleh serta riwayat pertukaran keterampilan. Gunakan saldo poin Anda untuk meminta layanan dari anggota lain.
            </p>
        </div>

        <!-- Stats Cards (Bento Style Layout) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-lg mb-3xl">
            
            <!-- Total Balance (Featured Card with 3D Hover) -->
            <div id="balanceCard" class="primary-gradient p-xl rounded-2xl text-on-primary flex flex-col justify-between shadow-xl relative overflow-hidden group balance-card-3d cursor-default">
                <div class="z-10">
                    <p class="text-label-md font-label-md opacity-80 mb-sm">Total Saldo</p>
                    <div class="flex items-baseline gap-sm">
                        <span class="font-display-lg text-display-lg">{{ number_format($user->poin) }}</span>
                        <span class="font-headline-sm text-headline-sm opacity-90">pts</span>
                    </div>
                </div>
                <div class="mt-xl flex justify-between items-center z-10">
                    <span class="font-label-sm text-label-sm bg-on-primary/20 px-sm py-xs rounded-full backdrop-blur-sm">Available to Spend</span>
                    <span class="material-symbols-outlined text-4xl opacity-20">account_balance_wallet</span>
                </div>
                <!-- Abstract visual element -->
                <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-700"></div>
            </div>

            <!-- Total Earned -->
            <div class="bg-surface-container-lowest p-xl rounded-2xl border border-outline-variant flex flex-col justify-between shadow-sm hover:shadow-md transition-shadow">
                <div>
                    <p class="text-label-md font-label-md text-on-surface-variant mb-sm">Total Diperoleh</p>
                    <div class="flex items-baseline gap-sm">
                        <span class="font-headline-lg text-headline-lg text-on-surface">{{ number_format($totalEarned) }}</span>
                        <span class="font-headline-sm text-headline-sm text-on-surface-variant">pts</span>
                    </div>
                </div>
                <div class="mt-xl flex items-center gap-sm text-primary">
                    <span class="material-symbols-outlined">trending_up</span>
                    <span class="text-label-sm font-label-sm">Lifetime earnings</span>
                </div>
            </div>

            <!-- Total Spent -->
            <div class="bg-surface-container-lowest p-xl rounded-2xl border border-outline-variant flex flex-col justify-between shadow-sm hover:shadow-md transition-shadow">
                <div>
                    <p class="text-label-md font-label-md text-on-surface-variant mb-sm">Total Digunakan</p>
                    <div class="flex items-baseline gap-sm">
                        <span class="font-headline-lg text-headline-lg text-on-surface">{{ number_format($totalSpent) }}</span>
                        <span class="font-headline-sm text-headline-sm text-on-surface-variant">pts</span>
                    </div>
                </div>
                <div class="mt-xl flex items-center gap-sm text-error">
                    <span class="material-symbols-outlined">trending_down</span>
                    <span class="text-label-sm font-label-sm">Lifetime spending</span>
                </div>
            </div>
        </div>

        <!-- Transaction History Section -->
        <section class="bg-surface-container-lowest rounded-2xl border border-outline-variant shadow-sm overflow-hidden">
            <div class="p-lg border-b border-outline-variant flex flex-col sm:flex-row justify-between items-start sm:items-center gap-md">
                <h2 class="font-headline-sm text-headline-sm text-on-surface">Riwayat Transaksi</h2>
                <div class="flex gap-md w-full sm:w-auto">
                    <div class="relative flex-1 sm:flex-none">
                        <span class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
                        <input id="searchTx" type="text" 
                            class="pl-10 pr-xl py-xs bg-surface-container-low border-none rounded-xl text-label-md focus:ring-2 focus:ring-secondary w-full sm:w-64 h-[40px] outline-none transition-all" 
                            placeholder=" Cari Aktivitas..." />
                    </div>
                    <!-- Filter button placeholder -->
                    <button class="p-xs bg-surface-container-low rounded-xl text-on-surface-variant hover:text-primary transition-colors h-[40px] w-[40px] flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined">filter_list</span>
                    </button>
                </div>
            </div>

            <!-- Data Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-surface-container-low/50">
                        <tr>
                            <th class="px-xl py-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Tanggal</th>
                            <th class="px-xl py-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Aktivitas</th>
                            <th class="px-xl py-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Poin</th>
                            <th class="px-xl py-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Status</th>
                            <th class="px-xl py-lg font-label-md text-label-md text-on-surface-variant uppercase tracking-wider text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant" id="txTableBody">
                        @forelse($riwayat as $r)
                            @php
                                $isPenyedia = $r->id_penyedia_jasa === $user->id_pengguna;
                                $isSelesai = $r->status === 'selesai';
                                
                                // Logic Poin Dinamis
                                $poinSign = $isPenyedia && $isSelesai ? '+' : ($isSelesai ? '-' : '');
                                $poinColor = $poinSign === '+' ? 'text-primary' : ($poinSign === '-' ? 'text-error' : 'text-on-surface-variant');
                                
                                // Badge Status
                                $statusBadge = match($r->status) {
                                    'pending'    => ['bg-amber-100 text-amber-700', 'Pending'],
                                    'proses'     => ['bg-blue-100 text-blue-700',    'In Progress'],
                                    'selesai'    => ['bg-emerald-100 text-emerald-700','Completed'],
                                    'dibatalkan' => ['bg-red-100 text-red-700',      'Cancelled'],
                                };
                                
                                // Icon & Label Activity
                                $icon = $isPenyedia ? 'handyman' : 'design_services';
                                $iconBg = $isPenyedia ? 'bg-secondary-fixed text-secondary' : 'bg-tertiary-fixed text-tertiary';
                                $lawan = $isPenyedia ? $r->penerima->nama : $r->penyedia->nama;
                                $activityTitle = $isPenyedia ? 'Earned from ' . $r->jasa->nama_jasa : 'Spent on ' . $r->jasa->nama_jasa;
                                $activitySub = 'Exchange with ' . $lawan;
                            @endphp
                            <tr class="hover:bg-primary/5 transition-colors group cursor-pointer tx-row" onclick="window.location.href='{{ route('user.transaksi.show', $r->id_transaksi) }}'">
                                <td class="px-xl py-lg whitespace-nowrap">
                                    <span class="font-body-sm text-body-sm text-on-surface">
                                        {{ \Carbon\Carbon::parse($r->tgl_transaksi)->format('M d, Y') }}
                                    </span>
                                </td>
                                <td class="px-xl py-lg">
                                    <div class="flex items-center gap-md">
                                        <div class="w-10 h-10 rounded-lg {{ $iconBg }} flex items-center justify-center shrink-0">
                                            <span class="material-symbols-outlined">{{ $icon }}</span>
                                        </div>
                                        <div>
                                            <p class="font-label-md text-label-md text-on-surface">{{ $activityTitle }}</p>
                                            <p class="text-label-sm font-label-sm text-on-surface-variant">{{ $activitySub }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-xl py-lg whitespace-nowrap">
                                    <span class="font-headline-sm text-headline-sm {{ $poinColor }}">
                                        {{ $poinSign }}{{ $r->jumlah_poin }}
                                    </span>
                                </td>
                                <td class="px-xl py-lg whitespace-nowrap">
                                    <span class="px-sm py-xs {{ $statusBadge[0] }} rounded-full font-label-sm text-label-sm">
                                        {{ $statusBadge[1] }}
                                    </span>
                                </td>
                                <td class="px-xl py-lg text-right">
                                    <button class="material-symbols-outlined text-on-surface-variant hover:text-primary transition-colors p-1 rounded-full hover:bg-surface-container-low">
                                        more_vert
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-xl py-2xl text-center text-on-surface-variant">
                                    <div class="flex flex-col items-center gap-md">
                                        <span class="material-symbols-outlined text-4xl opacity-40">receipt_long</span>
                                        <p>Belum ada transaksi</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($riwayat->hasPages())
            <div class="px-xl py-lg bg-surface-container-low/30 border-t border-outline-variant flex flex-col sm:flex-row justify-between items-center gap-md">
                <span class="text-label-sm font-label-sm text-on-surface-variant">
                    Showing {{ $riwayat->firstItem() }}–{{ $riwayat->lastItem() }} of {{ $riwayat->total() }} transactions
                </span>
                <div class="flex items-center gap-sm">
                    {{ $riwayat->links() }}
                </div>
            </div>
            @endif
        </section>
    </main>

    {{-- Footer Partial --}}
    @include('user.partials.footer')

    <!-- Scripts -->
    <script>
        // 3D Hover Effect for Balance Card
        const balanceCard = document.getElementById('balanceCard');
        if (balanceCard) {
            balanceCard.addEventListener('mousemove', (e) => {
                const { left, top, width, height } = balanceCard.getBoundingClientRect();
                const x = (e.clientX - left) / width;
                const y = (e.clientY - top) / height;
                
                balanceCard.style.transform = `perspective(1000px) rotateY(${(x - 0.5) * 5}deg) rotateX(${(y - 0.5) * -5}deg) scale(1.02)`;
            });

            balanceCard.addEventListener('mouseleave', () => {
                balanceCard.style.transform = 'perspective(1000px) rotateY(0) rotateX(0) scale(1)';
            });
        }

        // Client-side Search for Transactions
        const searchInput = document.getElementById('searchTx');
        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                const query = e.target.value.toLowerCase();
                const rows = document.querySelectorAll('.tx-row');
                
                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(query) ? '' : 'none';
                });
            });
        }
    </script>
</body>
</html>