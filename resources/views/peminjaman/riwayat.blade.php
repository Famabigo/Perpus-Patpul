<x-app-layout>

    <div class="container py-4">
        <h1 class="mb-4">Riwayat Peminjaman Buku</h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <table class="table table-bordered table-striped">
            <thead style="background:#D98324;color:#fff;">
                <tr>
                    <th>#</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($riwayat as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->book->judul ?? '-' }}</td>
                    <td>{{ $item->tanggal_pinjam }}</td>
                    <td>{{ $item->tanggal_kembali ?? '-' }}</td>
                    <td>
                        @if($item->status == 'pending')
                            <span class="badge bg-warning text-dark">Menunggu Persetujuan</span>
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
                                <button class="btn btn-info btn-sm" disabled>Menunggu Persetujuan Admin</button>
                            </form>
                        @elseif($item->status == 'approved')
                            <span class="text-success">Sudah Disetujui</span>
                        @elseif($item->status == 'returned')
                            <span class="text-primary">Selesai</span>
                        @elseif($item->status == 'rejected')
                            <span class="text-danger">Ditolak</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada riwayat peminjaman.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
