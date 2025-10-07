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
                    
                    <form action="{{ route('books.update', $book) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="space-y-6">
                            <div>
                                <x-input-label for="judul" :value="__('Judul')" class="text-purple-900" />
                                <x-text-input id="judul" name="judul" type="text" class="mt-1 block w-full" :value="old('judul', $book->judul)" required />
                                <x-input-error :messages="$errors->get('judul')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="pengarang" :value="__('Pengarang')" class="text-purple-900" />
                                <x-text-input id="pengarang" name="pengarang" type="text" class="mt-1 block w-full" :value="old('pengarang', $book->pengarang)" required />
                                <x-input-error :messages="$errors->get('pengarang')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="kategori" :value="__('Kategori')" class="text-purple-900" />
                                <x-text-input id="kategori" name="kategori" type="text" class="mt-1 block w-full" :value="old('kategori', $book->kategori)" required />
                                <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="sinopsis" :value="__('Sinopsis')" class="text-purple-900" />
                                <textarea id="sinopsis" name="sinopsis" rows="4" 
                                    class="mt-1 block w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm"
                                    required>{{ old('sinopsis', $book->sinopsis) }}</textarea>
                                <x-input-error :messages="$errors->get('sinopsis')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="stok" :value="__('Stok')" class="text-purple-900" />
                                <x-text-input id="stok" name="stok" type="number" class="mt-1 block w-full" :value="old('stok', $book->stok)" required min="0" />
                                <x-input-error :messages="$errors->get('stok')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    <i class="fas fa-save mr-2"></i>
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>