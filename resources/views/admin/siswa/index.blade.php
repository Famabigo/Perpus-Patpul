<x-app-layout>

    <div class="container py-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-link mb-3" style="font-size:1.2em; text-decoration:none; color:#D98324;">
            &larr; Kembali
        </a>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Status Akun</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($siswa as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->is_approved)
                                                <span class="badge bg-success">Disetujui</span>
                                            @else
                                                <span class="badge bg-warning text-dark">Menunggu</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$user->is_approved)
                                                <div style="display: flex; gap: 8px;">
                                                    <form action="{{ route('admin.siswa.setujui', $user->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        <button class="btn btn-success btn-sm" onclick="return confirm('Setujui siswa ini?')">Setujui</button>
                                                    </form>
                                                    <form action="{{ route('admin.siswa.tolak', $user->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Tolak dan hapus akun siswa ini?')">Tolak</button>
                                                    </form>
                                                </div>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
