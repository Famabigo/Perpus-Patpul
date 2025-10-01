<x-app-layout>
    <div class="container py-4">
        <div class="d-flex align-items-center gap-2 mb-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary text-sm flex items-center gap-2 hover:bg-light">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali</span>
            </a>
            <h1 class="mb-0">Daftar Peminjaman Aktif</h1>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Nama Siswa</th>
                    <th>Judul Buku</th>
                    <th style="width: 150px;">Tanggal Pinjam</th>
                    <th style="width: 150px;">Tanggal Kembali</th>
                    <th style="width: 120px;">Status</th>
                    <th style="width: 180px;">No. Antrian</th>
                    <th style="width: 180px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($aktif as $item)
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
                        @endif
                    </td>
                    <td>{{ $item->queue_number ?? '-' }}</td>
                    <td>
                        @if($item->status == 'pending')
                            <form action="{{ route('peminjaman.approve', $item->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button class="btn btn-success btn-sm" onclick="return confirm('Setujui peminjaman ini?')">Setujui</button>
                            </form>
                        @elseif($item->status == 'approved')
                            <form action="{{ route('peminjaman.kembali', $item->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button class="btn btn-primary text-sm flex items-center gap-2" onclick="return confirm('Konfirmasi pengembalian buku?')">
                                    <i class="fas fa-check"></i>
                                    <span>Kembalikan</span>
                                </button>
                            </form>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada peminjaman aktif.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
