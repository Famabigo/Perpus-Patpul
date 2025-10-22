<x-app-layout>
<div class="bg-gradient-to-b from-purple-50/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-4">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-purple-100 rounded-lg">
                    <i class="fas fa-books text-2xl text-purple-600"></i>
                </div>
                <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-purple-800 bg-clip-text text-transparent">Katalog Buku</h1>
            </div>
            @if(auth()->user() && auth()->user()->role === 'siswa')
                <div class="flex gap-3 items-center">
                    <a href="{{ route('siswa.peminjaman.index') }}" 
                       class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-amber-500 to-amber-600 text-white rounded-xl hover:from-amber-600 hover:to-amber-700 transition-all duration-300 shadow hover:shadow-lg font-medium">
                        <i class="fas fa-book-reader mr-2"></i>
                        <span>Peminjaman Aktif</span>
                    </a>
                    <a href="{{ route('riwayat') }}" 
                       class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-xl hover:from-purple-700 hover:to-purple-800 transition-all duration-300 shadow hover:shadow-lg font-medium">
                        <i class="fas fa-history mr-2"></i>
                        <span>Riwayat</span>
                    </a>
                </div>
            @endif
        </div>
    
        <!-- Search Section -->
        <div class="max-w-4xl mx-auto mb-8">
            <form method="GET" action="" class="relative">
                <div class="flex items-center">
                    <div class="relative flex-1">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-search text-purple-400"></i>
                        </div>
                        <input type="text" 
                               name="search" 
                               class="block w-full pl-11 pr-4 py-3.5 border-2 border-purple-200 rounded-l-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 bg-white shadow-sm"
                               placeholder="Cari judul, pengarang, atau kategori..." 
                               value="{{ request('search') }}">
                    </div>
                    <button type="submit" 
                            class="px-8 py-3.5 bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-r-xl hover:from-purple-700 hover:to-purple-800 transition-all duration-300 shadow-sm hover:shadow-md font-medium">
                        <i class="fas fa-search mr-2"></i>
                        <span>Cari</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Alert Messages -->
        <div class="max-w-4xl mx-auto">
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
        </div>

        <!-- Book Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
            @forelse($books as $book)
                <a href="{{ route('katalog.show', $book) }}" class="block">
                    <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1 cursor-pointer overflow-hidden">
                        <div class="p-4">
                            <div class="flex gap-4">
                                <!-- Cover Image -->
                                <div class="flex-shrink-0 w-24">
                                    @if($book->cover_image)
                                        <img src="{{ $book->cover_image }}" 
                                             alt="Cover {{ $book->judul }}"
                                             class="w-full h-32 object-cover rounded-lg shadow-sm">
                                    @else
                                        <div class="w-full h-32 bg-purple-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-book text-3xl text-purple-400"></i>
                                        </div>
                                    @endif
                                </div>

                                <!-- Book Info -->
                                <div class="flex-grow min-w-0">
                                    <h3 class="text-lg font-bold text-gray-900 mb-1 line-clamp-2">{{ $book->judul }}</h3>
                                    <p class="text-gray-600 text-sm mb-2">oleh {{ $book->pengarang }}</p>
                                    
                                    <div class="flex flex-wrap gap-2 mb-2">
                                        <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium inline-flex items-center">
                                            <i class="fas fa-bookmark mr-1 text-xs"></i>
                                            {{ $book->kategori }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 pt-3 border-t border-gray-100">
                                <div class="flex items-center justify-between">
                                    <span class="px-2 py-1 rounded-full text-xs font-medium inline-flex items-center 
                                        {{ $book->stok > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        <i class="fas {{ $book->stok > 0 ? 'fa-check' : 'fa-times' }} mr-1"></i>
                                        {{ $book->stok > 0 ? 'Tersedia' : 'Habis' }}
                                    </span>
                                    <span class="inline-flex items-center gap-1 text-purple-600 text-sm">
                                        <i class="fas fa-book-open text-xs"></i>
                                        Stok: {{ $book->stok }}
                                    </span>
                                </div>
                            </div>

                            <p class="mt-3 text-gray-600 text-sm line-clamp-2">
                                {{ Str::limit($book->sinopsis, 100) }}
                            </p>

                            <!-- View Detail Button -->
                            <button type="button"
                                    class="mt-4 w-full bg-gradient-to-r from-purple-600 to-purple-700 text-white font-medium py-2 px-4 rounded-lg hover:from-purple-700 hover:to-purple-800 transition-all duration-300 flex items-center justify-center gap-2 text-sm">
                                <i class="fas fa-eye"></i>
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full">
                    <div class="bg-blue-50 border-2 border-blue-200 rounded-xl p-6 text-blue-700 flex items-center shadow-sm">
                        <i class="fas fa-info-circle mr-3 text-blue-500 text-lg"></i>
                        <span class="font-medium">Tidak ada buku yang ditemukan.</span>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
</x-app-layout>