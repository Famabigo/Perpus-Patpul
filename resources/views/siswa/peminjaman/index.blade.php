<x-app-layout>

    <div class="container py-4">
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center gap-4">
                <a href="{{ route('katalog') }}" 
                   class="inline-flex items-center px-4 py-2 bg-white border-2 border-purple-200 text-purple-700 rounded-xl hover:bg-purple-50 transition-all duration-300 font-medium shadow-sm hover:shadow group">
                    <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform duration-300"></i>
                    <span>Kembali</span>
                </a>
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-purple-100 rounded-lg">
                        <i class="fas fa-book-reader text-2xl text-purple-600"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-purple-900 mb-0">Peminjaman Aktif</h1>
                </div>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th class="text-center">Judul Buku</th>
                    <th style="width: 150px;" class="text-center">Tanggal Pinjam</th>
                    <th style="width: 150px;" class="text-center">Tanggal Kembali</th>
                    <th style="width: 150px;" class="text-center">Status</th>
                    <th style="width: 200px;" class="text-center">No. Pesanan</th>
                </tr>
            </thead>
            <tbody>
            @forelse($aktif as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $item->book->judul ?? '-' }}</td>
                    <td class="text-center">{{ $item->tanggal_pinjam }}</td>
                    <td class="text-center">{{ $item->tanggal_kembali ?? '-' }}</td>
                    <td class="text-center">
                        @if($item->status == 'pending')
                            <span class="badge bg-warning text-dark d-inline-block w-100">Menunggu Persetujuan</span>
                        @elseif($item->status == 'approved')
                            @php
                                $tanggalKembali = \Carbon\Carbon::parse($item->tanggal_kembali);
                                $today = \Carbon\Carbon::now();
                                $isLate = $tanggalKembali && $today->diffInDays($tanggalKembali, false) < -1;
                            @endphp
                            @if($isLate)
                                <span class="badge bg-danger d-inline-block w-100">Terlambat {{ abs($today->diffInDays($tanggalKembali)) }} Hari</span>
                            @else
                                <span class="badge bg-success d-inline-block w-100">Dipinjam</span>
                            @endif
                        @endif
                    </td>
                    <td class="text-center">
                        @if($item->status == 'approved' && $item->queue_number)
                            <span class="badge d-inline-block w-100" style="background: var(--primary);">{{ $item->queue_number }}</span>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-8">
                        <div class="flex flex-col items-center justify-center gap-4">
                            <i class="fas fa-book-open text-4xl text-gray-400"></i>
                            <p class="text-gray-500 font-medium">Tidak ada peminjaman aktif.</p>
                        </div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
