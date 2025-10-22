<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-6">
                        <h1 class="text-2xl font-semibold text-purple-900">Edit Buku</h1>
                        <a href="{{ route('books.index') }}" class="bg-purple-100 text-purple-600 px-4 py-2 rounded-lg hover:bg-purple-200 transition-all duration-300 flex items-center gap-2">
                            <i class="fas fa-arrow-left"></i>
                            <span>Kembali</span>
                        </a>
                    </div>
                    
                    <form action="{{ route('books.update', $book) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Left Column -->
                            <div class="space-y-6">
                                <div>
                                    <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                                    <input type="text" 
                                           id="judul" 
                                           name="judul" 
                                           required
                                           value="{{ old('judul', $book->judul) }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                                </div>

                                <div>
                                    <label for="pengarang" class="block text-sm font-medium text-gray-700">Pengarang</label>
                                    <input type="text" 
                                           id="pengarang" 
                                           name="pengarang" 
                                           required
                                           value="{{ old('pengarang', $book->pengarang) }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                                </div>

                                <div>
                                    <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                                    <input type="text" 
                                           id="kategori" 
                                           name="kategori" 
                                           required
                                           value="{{ old('kategori', $book->kategori) }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                                </div>

                                <div>
                                    <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
                                    <input type="number" 
                                           id="stok" 
                                           name="stok" 
                                           min="0" 
                                           required
                                           value="{{ old('stok', $book->stok) }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="space-y-6">
                                <div>
                                    <label for="cover_image" class="block text-sm font-medium text-gray-700">Cover Image URL</label>
                                    <input type="url" 
                                           id="cover_image" 
                                           name="cover_image" 
                                           value="{{ old('cover_image', $book->cover_image) }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                           placeholder="https://example.com/book-cover.jpg">
                                    <p class="mt-1 text-sm text-gray-500">Masukkan URL gambar cover buku (opsional)</p>
                                    
                                    @if($book->cover_image)
                                        <div class="mt-2">
                                            <span class="text-sm font-medium text-gray-700">Cover Saat Ini:</span>
                                            <div class="mt-1 w-40 h-56 rounded-lg overflow-hidden border border-gray-200">
                                                <img src="{{ $book->cover_image }}" 
                                                     alt="Cover {{ $book->judul }}" 
                                                     class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div>
                                    <label for="sinopsis" class="block text-sm font-medium text-gray-700">Sinopsis</label>
                                    <textarea id="sinopsis" 
                                              name="sinopsis" 
                                              rows="8" 
                                              required
                                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">{{ old('sinopsis', $book->sinopsis) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 pt-4">
                            <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 active:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition-all duration-200 gap-2">
                                <i class="fas fa-save"></i>
                                <span>Update</span>
                            </button>
                            <a href="{{ route('books.index') }}" 
                               class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-200 gap-2">
                                <i class="fas fa-times"></i>
                                <span>Batal</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>