
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Buku
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('books.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Left Column -->
                            <div class="space-y-6">
                                <div>
                                    <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                                    <input type="text" 
                                           id="judul" 
                                           name="judul" 
                                           required
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                                </div>

                                <div>
                                    <label for="pengarang" class="block text-sm font-medium text-gray-700">Pengarang</label>
                                    <input type="text" 
                                           id="pengarang" 
                                           name="pengarang" 
                                           required
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                                </div>

                                <div>
                                    <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                                    <input type="text" 
                                           id="kategori" 
                                           name="kategori" 
                                           required
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                                </div>

                                <div>
                                    <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
                                    <input type="number" 
                                           id="stok" 
                                           name="stok" 
                                           min="0" 
                                           required
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
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                           placeholder="https://example.com/book-cover.jpg">
                                    <p class="mt-1 text-sm text-gray-500">Masukkan URL gambar cover buku (opsional)</p>
                                </div>

                                <div>
                                    <label for="sinopsis" class="block text-sm font-medium text-gray-700">Sinopsis</label>
                                    <textarea id="sinopsis" 
                                              name="sinopsis" 
                                              rows="8" 
                                              required
                                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 pt-4">
                            <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 active:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition-all duration-200 gap-2">
                                <i class="fas fa-save"></i>
                                <span>Simpan</span>
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