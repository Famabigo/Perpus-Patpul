<x-app-layout>
    <div class="container py-4">
        <div class="d-flex align-items-center gap-2 mb-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary text-sm flex items-center gap-2 hover:bg-light">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali</span>
            </a>
            <h1 class="mb-0">Daftar Peminjaman Aktif</h1>
        </div>
        
        <!-- Form Pencarian -->
        <div class="card mb-3">
            <div class="card-body">
                <form method="GET" action="{{ route('admin.peminjaman.aktif') }}" class="row g-3">
                    <div class="col-md-4">
                        <label for="search" class="form-label">
                            <i class="fas fa-search mr-1"></i>Cari
                        </label>
                        <input type="text" 
                               id="search" 
                               name="search" 
                               class="form-control" 
                               placeholder="Nama siswa, judul buku, atau no. pesanan..."
                               value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="status" class="form-label">
                            <i class="fas fa-filter mr-1"></i>Status
                        </label>
                        <select id="status" name="status" class="form-control">
                            <option value="">Semua Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu</option>
                            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Dipinjam</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="tanggal" class="form-label">
                            <i class="fas fa-calendar mr-1"></i>Tanggal Pinjam
                        </label>
                        <input type="date" 
                               id="tanggal" 
                               name="tanggal" 
                               class="form-control"
                               value="{{ request('tanggal') }}">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-search mr-1"></i>Cari
                        </button>
                    </div>
                </form>
                @if(request('search') || request('status') || request('tanggal'))
                    <div class="mt-2">
                        <a href="{{ route('admin.peminjaman.aktif') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-times mr-1"></i>Reset Filter
                        </a>
                    </div>
                @endif
            </div>
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
                    <th style="width: 180px;">No. Pesanan</th>
                    <th style="width: 180px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($aktif as $item)
                @php
                    $tanggalKembali = \Carbon\Carbon::parse($item->tanggal_kembali)->startOfDay();
                    $today = \Carbon\Carbon::now()->startOfDay();
                    $isLate = $item->status == 'approved' && $tanggalKembali && $today->isAfter($tanggalKembali);
                    $hariTerlambat = $isLate ? $today->diffInDays($tanggalKembali) : 0;
                @endphp
                <tr class="{{ $isLate ? 'table-danger' : '' }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->name ?? '-' }}</td>
                    <td>{{ $item->book->judul ?? '-' }}</td>
                    <td>{{ $item->tanggal_pinjam }}</td>
                    <td>{{ $item->tanggal_kembali ?? '-' }}</td>
                    <td>
                        @if($item->status == 'pending')
                            <span class="badge bg-warning text-dark">Menunggu</span>
                        @elseif($item->status == 'approved')
                            @if($isLate)
                                <span class="badge bg-danger">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>Terlambat {{ $hariTerlambat }} Hari
                                </span>
                            @else
                                <span class="badge bg-success">
                                    <i class="fas fa-check-circle mr-1"></i>Dipinjam
                                </span>
                            @endif
                        @endif
                    </td>
                    <td>{{ $item->queue_number ?? '-' }}</td>
                    <td>
                        @if($item->status == 'pending')
                            <div class="flex gap-2">
                                <form action="{{ route('peminjaman.approve', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-success btn-sm" onclick="return confirm('Setujui peminjaman ini?')">
                                        <i class="fas fa-check mr-1"></i>Setujui
                                    </button>
                                </form>
                                <form action="{{ route('peminjaman.reject', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Tolak peminjaman ini?')">
                                        <i class="fas fa-times mr-1"></i>Tolak
                                    </button>
                                </form>
                            </div>
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
