@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Buku</h1>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $book->judul }}</h3>
            <h5 class="card-subtitle mb-2 text-muted">{{ $book->pengarang }}</h5>
            <p class="card-text"><strong>Kategori:</strong> {{ $book->kategori }}</p>
            <p class="card-text"><strong>Sinopsis:</strong> {{ $book->sinopsis }}</p>
            <p class="card-text"><strong>Stok:</strong> {{ $book->stok }}</p>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection