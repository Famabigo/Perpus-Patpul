<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Daftar Buku
        </h2>
    </x-slot>
    <div class="container py-4">
        <div class="d-flex align-items-center gap-4 mb-6">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary text-sm flex items-center gap-2 hover:bg-light">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali</span>
            </a>
            <a href="{{ route('books.create') }}" class="btn btn-primary flex items-center gap-2">
                <i class="fas fa-plus"></i>
                <span>Tambah Buku</span>
            </a>
        </div>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Cover</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td class="w-24">
                        @if($book->cover_image)
                            <img src="{{ $book->cover_image }}" 
                                 alt="Cover {{ $book->judul }}" 
                                 class="w-20 h-28 object-cover rounded shadow">
                        @else
                            <div class="w-20 h-28 bg-gray-100 flex items-center justify-center rounded shadow">
                                <span class="text-gray-400">No Cover</span>
                            </div>
                        @endif
                    </td>
                    <td>{{ $book->judul }}</td>
                    <td>{{ $book->pengarang }}</td>
                    <td>{{ $book->kategori }}</td>
                    <td>{{ $book->stok }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>