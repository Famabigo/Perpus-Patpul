<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800">Laporan Peminjaman Buku</h2>
                        <a href="{{ route('admin.dashboard') }}" class="text-purple-600 hover:text-purple-700 flex items-center gap-2">
                            <i class="fas fa-arrow-left"></i>
                            <span>Kembali</span>
                        </a>
                    </div>

                    <div class="bg-purple-50 border border-purple-200 rounded-lg p-6 mb-6">
                        <form action="{{ route('laporan.export.pdf') }}" method="GET" class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                <div>
                                    <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-calendar mr-1"></i>Tanggal Mulai
                                    </label>
                                    <input type="date" 
                                           id="tanggal_mulai" 
                                           name="tanggal_mulai" 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-purple-500 focus:border-purple-500">
                                </div>

                                <div>
                                    <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-calendar mr-1"></i>Tanggal Selesai
                                    </label>
                                    <input type="date" 
                                           id="tanggal_selesai" 
                                           name="tanggal_selesai" 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-purple-500 focus:border-purple-500">
                                </div>

                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-filter mr-1"></i>Status
                                    </label>
                                    <select id="status" 
                                            name="status" 
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-purple-500 focus:border-purple-500">
                                        <option value="all">Semua Status</option>
                                        <option value="pending">Menunggu</option>
                                        <option value="approved">Dipinjam</option>
                                        <option value="returned">Dikembalikan</option>
                                        <option value="rejected">Ditolak</option>
                                    </select>
                                </div>

                                <div class="flex items-end">
                                    <button type="submit" 
                                            class="w-full px-4 py-2 bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-md hover:from-purple-700 hover:to-purple-800 transition-all duration-200 flex items-center justify-center gap-2">
                                        <i class="fas fa-file-pdf"></i>
                                        <span>Export PDF</span>
                                    </button>
                                </div>
                            </div>

                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-info-circle text-purple-500"></i>
                                <span>Kosongkan tanggal untuk mengekspor semua data</span>
                            </div>
                        </form>
                    </div>

                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <h3 class="font-semibold text-blue-800 mb-2">
                            <i class="fas fa-chart-bar mr-2"></i>Informasi
                        </h3>
                        <ul class="text-sm text-blue-700 space-y-1">
                            <li>• Laporan akan digenerate dalam format PDF</li>
                            <li>• Anda dapat memfilter berdasarkan periode waktu dan status peminjaman</li>
                            <li>• Laporan mencakup data peminjam, buku, tanggal, dan status peminjaman</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
