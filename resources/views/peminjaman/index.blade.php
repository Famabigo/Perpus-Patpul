<x-app-layout>
<div class="container">
    <div class="d-flex align-items-center gap-2 mb-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-link p-0 d-flex align-items-center" style="font-size:1.5em; text-decoration:none; color:#D98324;">
            &larr; <span class="ms-1" style="font-size:0.7em;">Kembali</span>
        </a>
        <h1 class="mb-0">Daftar Peminjaman Buku</h1>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th>Nama Siswa</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th style="width: 120px;">Status</th>
                <th style="width: 200px;" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($peminjaman as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->name ?? '-' }}</td>
                <td>{{ $item->book->judul ?? '-' }}</td>
                <td>{{ $item->tanggal_pinjam }}</td>
                <td>{{ $item->tanggal_kembali ?? '-' }}</td>
                <td>
                    @if($item->status == 'pending')
                        <span class="badge bg-warning text-dark">Menunggu</span>
                    @elseif($item->status == 'approved')
                        <span class="badge bg-success">Dipinjam</span>
                    @elseif($item->status == 'returned')
                        <span class="badge bg-primary">Dikembalikan</span>
                    @elseif($item->status == 'rejected')
                        <span class="badge bg-danger">Ditolak</span>
                    @endif
                </td>
                <td>
                    @if($item->status == 'pending')
                        <form action="{{ route('peminjaman.approve', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button class="btn btn-success btn-sm" onclick="return confirm('Setujui peminjaman ini?')">Setujui</button>
                        </form>
                        <form action="{{ route('peminjaman.reject', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Tolak peminjaman ini?')">Tolak</button>
                        </form>
                    @elseif($item->status == 'approved')
                        <form action="{{ route('peminjaman.kembali', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button class="btn btn-primary btn-sm" onclick="return confirm('Konfirmasi pengembalian buku?')">Kembali</button>
                        </form>
                    @else
                        <span>-</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Tidak ada data peminjaman.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>
