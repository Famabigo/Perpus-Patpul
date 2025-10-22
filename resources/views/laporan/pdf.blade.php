<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Peminjaman Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #7c3aed;
            padding-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            color: #7c3aed;
            font-size: 24px;
        }
        .header h2 {
            margin: 5px 0;
            color: #333;
            font-size: 18px;
        }
        .info {
            margin-bottom: 20px;
        }
        .info table {
            width: 100%;
        }
        .info td {
            padding: 5px;
        }
        table.data {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table.data th {
            background-color: #7c3aed;
            color: white;
            padding: 10px 5px;
            text-align: left;
            font-size: 11px;
        }
        table.data td {
            border: 1px solid #ddd;
            padding: 8px 5px;
            font-size: 10px;
        }
        table.data tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .badge {
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 9px;
            font-weight: bold;
        }
        .badge-warning {
            background-color: #fef3c7;
            color: #92400e;
        }
        .badge-success {
            background-color: #d1fae5;
            color: #065f46;
        }
        .badge-info {
            background-color: #dbeafe;
            color: #1e40af;
        }
        .badge-danger {
            background-color: #fee2e2;
            color: #991b1b;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>PERPUSTAKAAN SMKN 40 JAKARTA</h1>
        <h2>Laporan Peminjaman Buku</h2>
    </div>

    <div class="info">
        <table>
            <tr>
                <td width="150"><strong>Tanggal Cetak</strong></td>
                <td>: {{ $tanggal_cetak }}</td>
                <td width="150"><strong>Status</strong></td>
                <td>: {{ $status == 'all' ? 'Semua Status' : ucfirst($status) }}</td>
            </tr>
            @if($tanggal_mulai && $tanggal_selesai)
            <tr>
                <td><strong>Periode</strong></td>
                <td colspan="3">: {{ \Carbon\Carbon::parse($tanggal_mulai)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($tanggal_selesai)->format('d/m/Y') }}</td>
            </tr>
            @endif
            <tr>
                <td><strong>Total Data</strong></td>
                <td>: {{ $peminjaman->count() }} Peminjaman</td>
                <td><strong>Terlambat</strong></td>
                <td>: 
                    @php
                        $today = \Carbon\Carbon::now()->startOfDay();
                        $terlambatCount = $peminjaman->filter(function($item) use ($today) {
                            if ($item->status == 'approved' && $item->tanggal_kembali) {
                                $tanggalKembali = \Carbon\Carbon::parse($item->tanggal_kembali)->startOfDay();
                                return $today->isAfter($tanggalKembali);
                            }
                            return false;
                        })->count();
                    @endphp
                    {{ $terlambatCount }} Peminjaman
                </td>
            </tr>
        </table>
    </div>

    <table class="data">
        <thead>
            <tr>
                <th width="30">No</th>
                <th width="150">Nama Siswa</th>
                <th width="200">Judul Buku</th>
                <th width="80">Tgl Pinjam</th>
                <th width="80">Tgl Kembali</th>
                <th width="120">No. Pesanan</th>
                <th width="80">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($peminjaman as $index => $item)
            @php
                $tanggalKembali = $item->tanggal_kembali ? \Carbon\Carbon::parse($item->tanggal_kembali)->startOfDay() : null;
                $today = \Carbon\Carbon::now()->startOfDay();
                $isLate = $item->status == 'approved' && $tanggalKembali && $today->isAfter($tanggalKembali);
                $hariTerlambat = $isLate ? $today->diffInDays($tanggalKembali) : 0;
            @endphp
            <tr>
                <td style="text-align: center;">{{ $index + 1 }}</td>
                <td>{{ $item->user->name ?? '-' }}</td>
                <td>{{ $item->book->judul ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d/m/Y') }}</td>
                <td>{{ $item->tanggal_kembali ? \Carbon\Carbon::parse($item->tanggal_kembali)->format('d/m/Y') : '-' }}</td>
                <td>{{ $item->queue_number ?? '-' }}</td>
                <td>
                    @if($item->status == 'pending')
                        <span class="badge badge-warning">Menunggu</span>
                    @elseif($item->status == 'approved')
                        @if($isLate)
                            <span class="badge badge-danger">Terlambat {{ $hariTerlambat }} Hari</span>
                        @else
                            <span class="badge badge-success">Dipinjam</span>
                        @endif
                    @elseif($item->status == 'returned')
                        <span class="badge badge-info">Dikembalikan</span>
                    @else
                        <span class="badge badge-danger">Ditolak</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center;">Tidak ada data peminjaman</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak pada: {{ $tanggal_cetak }}</p>
    </div>
</body>
</html>
