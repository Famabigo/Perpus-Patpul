<x-app-layout>
    <div class="bg-gradient-to-b from-purple-50/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="max-w-4xl mx-auto">
                <a href="{{ route('katalog') }}" 
                   class="inline-flex items-center text-purple-600 hover:text-purple-700 mb-6 group">
                    <i class="fas fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform"></i>
                    <span>Kembali ke Katalog</span>
                </a>

                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 border-2 border-green-200 rounded-xl text-green-700 flex items-center shadow-sm">
                        <i class="fas fa-check-circle mr-3 text-green-500 text-lg"></i>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-50 border-2 border-red-200 rounded-xl text-red-700 flex items-center shadow-sm">
                        <i class="fas fa-exclamation-circle mr-3 text-red-500 text-lg"></i>
                        <span class="font-medium">{{ session('error') }}</span>
                    </div>
                @endif

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-purple-100">
                    <div class="p-8">
                        <div class="flex flex-col md:flex-row gap-8">
                            <!-- Cover Image -->
                            <div class="flex-shrink-0">
                                @if($book->cover_image)
                                    <img src="{{ $book->cover_image }}" 
                                         alt="Cover {{ $book->judul }}"
                                         class="w-48 h-64 object-cover rounded-lg shadow-lg">
                                @else
                                    <div class="w-48 h-64 bg-purple-100 rounded-lg flex items-center justify-center shadow-lg">
                                        <i class="fas fa-book text-4xl text-purple-400"></i>
                                    </div>
                                @endif
                            </div>

                            <!-- Book Details -->
                            <div class="flex-grow">
                                <h1 class="text-3xl font-bold text-purple-900 mb-3">{{ $book->judul }}</h1>
                                <p class="text-gray-600 text-lg mb-4">oleh {{ $book->pengarang }}</p>

                                <div class="flex flex-wrap gap-2 mb-4">
                                    <span class="px-3 py-1.5 bg-purple-100 text-purple-700 rounded-full text-sm font-medium inline-flex items-center">
                                        <i class="fas fa-bookmark mr-1.5 text-xs"></i>
                                        {{ $book->kategori }}
                                    </span>
                                    <span class="px-3 py-1.5 rounded-full text-sm font-medium inline-flex items-center 
                                        {{ $book->stok > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        <i class="fas {{ $book->stok > 0 ? 'fa-check' : 'fa-times' }} mr-1.5 text-xs"></i>
                                        {{ $book->stok > 0 ? 'Tersedia' : 'Habis' }}
                                    </span>
                                    <span class="px-3 py-1.5 bg-purple-50 text-purple-700 rounded-full text-sm font-medium inline-flex items-center">
                                        <i class="fas fa-book-open mr-1.5 text-xs"></i>
                                        Stok: {{ $book->stok }}
                                    </span>
                                </div>

                            <div class="mt-6 prose max-w-none">
                                <div class="p-6 bg-purple-50/50 rounded-xl border border-purple-100">
                                    <h3 class="text-lg font-semibold text-purple-900 mb-3">Sinopsis</h3>
                                    <p class="text-gray-600 leading-relaxed">{{ $book->sinopsis }}</p>
                                </div>
                            </div>

                            @if(auth()->user() && auth()->user()->role === 'siswa')
                                @if($book->stok > 0)
                                    <form method="POST" action="{{ route('pinjam', $book->id) }}" class="mt-6 bg-purple-50/50 rounded-xl p-6 border border-purple-100">
                                        @csrf
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                                            <div>
                                                <label class="block text-purple-900 text-sm font-medium mb-2">
                                                    <i class="fas fa-calendar-plus mr-2 w-4 text-center"></i>Tanggal Pinjam
                                                </label>
                                                <input type="date" 
                                                       name="tanggal_pinjam" 
                                                       class="w-full px-4 py-2.5 rounded-lg border border-purple-200 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 bg-white" 
                                                       value="{{ date('Y-m-d') }}" 
                                                       min="{{ date('Y-m-d') }}" 
                                                       required>
                                            </div>
                                            <div>
                                                <label class="block text-purple-900 text-sm font-medium mb-2">
                                                    <i class="fas fa-calendar-check mr-2 w-4 text-center"></i>Tanggal Kembali (Maksimal 7 Hari)
                                                </label>
                                                <input type="date" 
                                                       name="tanggal_kembali" 
                                                       class="w-full px-4 py-2.5 rounded-lg border border-purple-200 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 bg-white" 
                                                       min="{{ date('Y-m-d') }}" 
                                                       required>
                                                <p class="text-xs text-gray-500 mt-1">
                                                    <i class="fas fa-info-circle mr-1"></i>Otomatis diset 7 hari dari tanggal pinjam
                                                </p>
                                            </div>
                                        </div>
                                        <button type="submit" 
                                                class="w-full bg-gradient-to-r from-purple-600 to-purple-700 text-white font-medium py-3 px-4 rounded-lg hover:from-purple-700 hover:to-purple-800 transition-all duration-300 flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed shadow-sm hover:shadow-md">
                                            <i class="fas fa-bookmark"></i>
                                            Pinjam Buku
                                        </button>
                                    </form>
                                    <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var tglPinjam = document.querySelector('input[name="tanggal_pinjam"]');
                                        var tglKembali = document.querySelector('input[name="tanggal_kembali"]');

                                        function setTanggalKembali() {
                                            if (tglPinjam.value) {
                                                var pinjamDate = new Date(tglPinjam.value);
                                                
                                                // Set tanggal kembali otomatis 7 hari dari tanggal pinjam
                                                var kembaliDate = new Date(pinjamDate);
                                                kembaliDate.setDate(kembaliDate.getDate() + 7);
                                                
                                                var yyyy = kembaliDate.getFullYear();
                                                var mm = String(kembaliDate.getMonth() + 1).padStart(2, '0');
                                                var dd = String(kembaliDate.getDate()).padStart(2, '0');
                                                tglKembali.value = `${yyyy}-${mm}-${dd}`;
                                                
                                                // Set min tanggal kembali = tanggal pinjam
                                                tglKembali.min = tglPinjam.value;
                                                
                                                // Set max tanggal kembali = 7 hari dari tanggal pinjam
                                                tglKembali.max = `${yyyy}-${mm}-${dd}`;
                                            }
                                        }

                                        tglPinjam.addEventListener('change', setTanggalKembali);
                                        setTanggalKembali();
                                    });
                                    </script>
                                @else
                                    <div class="bg-red-50 border-2 border-red-100 rounded-xl p-6 text-red-600">
                                        <div class="flex items-center gap-3 mb-2">
                                            <i class="fas fa-exclamation-circle text-xl"></i>
                                            <h4 class="font-medium">Buku Tidak Tersedia</h4>
                                        </div>
                                        <p class="text-red-500">Maaf, stok buku ini sedang habis. Silahkan cek kembali nanti.</p>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
