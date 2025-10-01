@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Buku</h1>
    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $book->judul }}" required>
        </div>
        <div class="mb-3">
            <label for="pengarang" class="form-label">Pengarang</label>
            <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{ $book->pengarang }}" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $book->kategori }}" required>
        </div>
        <div class="mb-3">
            <label for="sinopsis" class="form-label">Sinopsis</label>
            <textarea class="form-control" id="sinopsis" name="sinopsis" rows="3" required>{{ $book->sinopsis }}</textarea>
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" min="0" value="{{ $book->stok }}" required>
        </div>
        <div class="flex items-center gap-3">
            <button type="submit" class="btn btn-primary flex items-center gap-2">
                <i class="fas fa-save"></i>
                <span>Update</span>
            </button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary flex items-center gap-2">
                <i class="fas fa-times"></i>
                <span>Batal</span>
            </a>
        </div>
    </form>
</div>
@endsection