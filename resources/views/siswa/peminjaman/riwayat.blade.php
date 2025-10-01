<x-app-layout>

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('katalog') }}" class="btn btn-secondary text-sm flex items-center gap-2 hover:bg-light">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali</span>
                </a>
                <h1 class="mb-0">Riwayat Peminjaman Buku</h1>
            </div>
        </div>
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
                            @php
                                $tanggalKembali = \Carbon\Carbon::parse($item->tanggal_kembali);
                                $today = \Carbon\Carbon::now();
                                $isLate = $tanggalKembali && $today->diffInDays($tanggalKembali, false) < -1;
                            @endphp
                            @if($isLate)
                                <span class="badge bg-danger">Terlambat {{ abs($today->diffInDays($tanggalKembali)) }} Hari</span>
                            @else
                                <span class="badge bg-success">Dipinjam</span>
                            @endif
                        @elseif($item->status == 'returned')
                            <span class="badge bg-primary">Dikembalikan</span>
                        @elseif($item->status == 'rejected')
                            <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada riwayat peminjaman.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
