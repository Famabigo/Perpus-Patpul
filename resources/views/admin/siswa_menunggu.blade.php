<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Daftar Siswa Menunggu Persetujuan
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800">Total Siswa</h2>
                        <a href="{{ route('admin.dashboard') }}" class="text-purple-600 hover:text-purple-700 flex items-center gap-2">
                            <i class="fas fa-arrow-left"></i>
                            <span>Kembali</span>
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-purple-600 text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Nama</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Status Akun</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($siswa as $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Menunggu
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <div class="flex gap-2">
                                                <form action="{{ route('admin.siswa.setujui', $item->id) }}" method="POST">
                                                    @csrf
                                                    <button class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 transition-colors duration-200">
                                                        SETUJUI
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.siswa.tolak', $item->id) }}" method="POST">
                                                    @csrf
                                                    <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition-colors duration-200">
                                                        TOLAK
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                            Tidak ada siswa menunggu persetujuan
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
