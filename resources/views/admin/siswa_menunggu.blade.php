<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Daftar Siswa Menunggu Persetujuan
        </h2>
    </x-slot>
    <div class="container py-4">
        <h1 class="mb-4">Siswa Belum Disetujui</h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered table-striped">
            <thead style="background:#D98324;color:#fff;">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($siswa as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        @if($item->peminjamanPending->count())
                            <ul style="margin-bottom:8px;">
                                @foreach($item->peminjamanPending as $pinjam)
                                    <li>Buku: <b>{{ $pinjam->book->judul ?? '-' }}</b></li>
                                @endforeach
                            </ul>
                        @else
                            <span class="text-muted">Belum ada permintaan pinjam</span><br>
                        @endif
                        <form action="{{ route('admin.siswa.setujui', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button class="btn btn-success btn-sm" onclick="return confirm('Setujui siswa ini?')">Setujui</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada siswa menunggu persetujuan.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
