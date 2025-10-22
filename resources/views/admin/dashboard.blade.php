<x-app-layout>


    {{-- Seluruh isi dashboard di sini --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-purple-900 dark:text-purple-100 mb-8">Dashboard Admin</h1>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Buku -->
            <a href="{{ route('books.index') }}" class="transform transition-all duration-300 hover:-translate-y-1">
                <div class="bg-gradient-to-br from-purple-600 to-purple-700 rounded-xl shadow-lg p-6 relative overflow-hidden group">
                    <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-5 transition-opacity duration-300"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-white/10 rounded-lg">
                                <i class="fas fa-book text-2xl text-white"></i>
                            </div>
                            <span class="text-4xl font-bold text-white">{{ $totalBuku }}</span>
                        </div>
                        <h5 class="text-sm font-semibold text-white/90 uppercase tracking-wider">Total Buku</h5>
                    </div>
                </div>
            </a>

            <!-- Peminjaman Aktif -->
            <a href="{{ route('admin.peminjaman.aktif') }}" class="transform transition-all duration-300 hover:-translate-y-1">
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 relative overflow-hidden group">
                    <!-- Notifikasi Badge -->
                    @if($peminjamanBaru > 0)
                        <div class="absolute top-2 right-2 z-10">
                            <div class="relative">
                                <span class="flex h-6 w-6">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-6 w-6 bg-red-500 items-center justify-center text-white text-xs font-bold shadow-lg">
                                        {{ $peminjamanBaru }}
                                    </span>
                                </span>
                            </div>
                        </div>
                    @endif
                    
                    <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-5 transition-opacity duration-300"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-white/10 rounded-lg">
                                <i class="fas fa-clock text-2xl text-white"></i>
                            </div>
                            <span class="text-4xl font-bold text-white">{{ $totalPeminjaman }}</span>
                        </div>
                        <h5 class="text-sm font-semibold text-white/90 uppercase tracking-wider">Peminjaman Aktif</h5>
                    </div>
                </div>
            </a>

            <!-- Terlambat -->
            <a href="{{ route('admin.peminjaman.terlambat') }}" class="transform transition-all duration-300 hover:-translate-y-1">
                <div class="bg-gradient-to-br from-red-500 to-red-600 rounded-xl shadow-lg p-6 relative overflow-hidden group">
                    <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-5 transition-opacity duration-300"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-white/10 rounded-lg">
                                <i class="fas fa-exclamation-triangle text-2xl text-white"></i>
                            </div>
                            <span class="text-4xl font-bold text-white">{{ $totalTerlambat }}</span>
                        </div>
                        <h5 class="text-sm font-semibold text-white/90 uppercase tracking-wider">Terlambat</h5>
                    </div>
                </div>
            </a>

            <!-- Total Siswa -->
            <a href="{{ route('admin.siswa') }}" class="transform transition-all duration-300 hover:-translate-y-1">
                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 relative overflow-hidden group">
                    <!-- Notifikasi Badge -->
                    @if($siswaMenunggu > 0)
                        <div class="absolute top-2 right-2 z-10">
                            <div class="relative">
                                <span class="flex h-6 w-6">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-6 w-6 bg-red-500 items-center justify-center text-white text-xs font-bold shadow-lg">
                                        {{ $siswaMenunggu }}
                                    </span>
                                </span>
                            </div>
                        </div>
                    @endif
                    
                    <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-5 transition-opacity duration-300"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-white/10 rounded-lg">
                                <i class="fas fa-users text-2xl text-white"></i>
                            </div>
                            <span class="text-4xl font-bold text-white">{{ $totalUser }}</span>
                        </div>
                        <h5 class="text-sm font-semibold text-white/90 uppercase tracking-wider">Total Siswa</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="mt-8 p-6 bg-white rounded-2xl shadow-lg border border-purple-100">
            <h4 class="text-2xl font-bold text-purple-900 mb-4">Selamat datang di Dashboard Admin Perpustakaan SMK 40!</h4>
            <p class="text-gray-600 mb-6">Gunakan menu di atas untuk mengelola buku, peminjaman, dan data siswa.</p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('admin.riwayat.peminjaman') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-lg hover:from-purple-700 hover:to-purple-800 transition-all duration-300 shadow-md hover:shadow-lg">
                    <i class="fas fa-history mr-2"></i>
                    <span>Riwayat Peminjaman</span>
                </a>
                <a href="{{ route('laporan.index') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-300 shadow-md hover:shadow-lg">
                    <i class="fas fa-file-pdf mr-2"></i>
                    <span>Laporan PDF</span>
                </a>
            </div>
        </div>

        <!-- Statistik Diagram -->
        <div class="mt-8 p-6 bg-white rounded-2xl shadow-lg border border-purple-100">
            <h3 class="text-2xl font-bold text-purple-900 mb-6 flex items-center">
                <i class="fas fa-chart-line mr-3"></i>
                Statistik Peminjaman per Bulan
            </h3>
            <div class="relative" style="height: 400px;">
                <canvas id="peminjamanChart"></canvas>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
        // Siapkan data dari PHP
        const peminjamanData = @json($dataPeminjaman);

        const ctx = document.getElementById('peminjamanChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Jumlah Peminjaman',
                    data: peminjamanData,
                    borderColor: 'rgba(107, 70, 193, 1)',
                    backgroundColor: 'rgba(147, 51, 234, 0.05)',
                    borderWidth: 2,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: 'rgba(107, 70, 193, 1)',
                    pointBorderWidth: 2,
                    pointRadius: 6,
                    pointHoverRadius: 8,
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { 
                        display: false 
                    },
                    tooltip: {
                        backgroundColor: 'rgba(107, 70, 193, 0.9)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        padding: 12,
                        displayColors: false,
                        cornerRadius: 8
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(107, 70, 193, 0.1)',
                            drawBorder: false
                        },
                        ticks: {
                            color: 'rgba(107, 70, 193, 0.8)',
                            font: {
                                family: "'Figtree', sans-serif",
                                size: 12
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: 'rgba(107, 70, 193, 0.8)',
                            font: {
                                family: "'Figtree', sans-serif",
                                size: 12
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        });
        </script>
    </div>
</x-app-layout>
