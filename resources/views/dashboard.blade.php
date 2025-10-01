<x-app-layout>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Welcome Section -->
        <div class="bg-gradient-to-r from-purple-600 to-purple-700 p-8 rounded-2xl shadow-lg mb-8 backdrop-blur-sm">
            <h1 class="text-3xl font-bold text-white mb-3">Selamat Datang di Perpustakaan!</h1>
            <p class="text-white/90 text-lg">Mulai petualangan membacamu hari ini.</p>
        </div>

        @if(auth()->user()->role === 'siswa')
        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Card 1: Peminjaman Aktif -->
            <a href="{{ route('siswa.peminjaman.index') }}" class="transform transition-all duration-300 hover:-translate-y-1">
                <div class="bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl shadow-lg h-full p-6 relative overflow-hidden group">
                    <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-5 transition-opacity duration-300"></div>
                    <div class="relative text-center">
                        <div class="mb-4 inline-flex p-3 bg-white/10 rounded-full">
                            <i class="fas fa-book-reader text-3xl text-white"></i>
                        </div>
                        <h5 class="text-lg font-semibold text-white mb-2">Peminjaman Aktif</h5>
                        <p class="text-white/80">Lihat buku yang sedang kamu pinjam</p>
                    </div>
                </div>
            </a>

            <!-- Card 2: Riwayat Peminjaman -->
            <a href="{{ route('riwayat') }}" class="transform transition-all duration-300 hover:-translate-y-1">
                <div class="bg-gradient-to-br from-purple-600 to-purple-700 rounded-xl shadow-lg h-full p-6 relative overflow-hidden group">
                    <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-5 transition-opacity duration-300"></div>
                    <div class="relative text-center">
                        <div class="mb-4 inline-flex p-3 bg-white/10 rounded-full">
                            <i class="fas fa-history text-3xl text-white"></i>
                        </div>
                        <h5 class="text-lg font-semibold text-white mb-2">Riwayat Peminjaman</h5>
                        <p class="text-white/80">Lihat catatan peminjaman kamu</p>
                    </div>
                </div>
            </a>

            <!-- Card 3: Katalog -->
            <a href="{{ route('katalog') }}" class="transform transition-all duration-300 hover:-translate-y-1">
                <div class="bg-white rounded-xl shadow-lg h-full p-6 relative overflow-hidden group border border-purple-100">
                    <div class="absolute inset-0 bg-purple-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative text-center">
                        <div class="mb-4 inline-flex p-3 bg-purple-100 rounded-full">
                            <i class="fas fa-search text-3xl text-purple-600"></i>
                        </div>
                        <h5 class="text-lg font-semibold text-purple-900 mb-2">Cari Buku</h5>
                        <p class="text-gray-600">Jelajahi koleksi buku kami</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Tips Section -->
        <div class="bg-white rounded-2xl shadow-lg border border-purple-100">
            <div class="p-8">
                <h4 class="text-2xl font-bold text-purple-900 mb-6 flex items-center">
                    Tips Peminjaman Buku
                    <span class="ml-2 text-2xl">📚</span>
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="p-3 bg-purple-100 rounded-full">
                                <i class="fas fa-check-circle text-2xl text-purple-600"></i>
                            </div>
                        </div>
                        <div>
                            <h6 class="text-lg font-semibold text-purple-900 mb-2">Pilih Buku</h6>
                            <p class="text-gray-600">Cari buku yang kamu inginkan di katalog perpustakaan</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="p-3 bg-purple-100 rounded-full">
                                <i class="fas fa-clock text-2xl text-purple-600"></i>
                            </div>
                        </div>
                        <div>
                            <h6 class="text-lg font-semibold text-purple-900 mb-2">Waktu Peminjaman</h6>
                            <p class="text-gray-600">Jangka waktu peminjaman maksimal 7 hari</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="p-3 bg-purple-100 rounded-full">
                                <i class="fas fa-undo text-2xl text-purple-600"></i>
                            </div>
                        </div>
                        <div>
                            <h6 class="text-lg font-semibold text-purple-900 mb-2">Pengembalian</h6>
                            <p class="text-gray-600">Kembalikan buku tepat waktu untuk menghindari denda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <style>
        .dashboard-card {
            border-radius: 16px;
            transition: all 0.3s ease;
            border: none;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .dashboard-icon {
            background: rgba(255,255,255,0.2);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }
    </style>
</x-app-layout>
