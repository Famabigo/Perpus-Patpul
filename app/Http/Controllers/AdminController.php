<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalBuku = \App\Models\Book::count();
        $totalPeminjaman = \App\Models\Peminjaman::where('status', 'approved')->count();
        $totalTerlambat = \App\Models\Peminjaman::where('status', 'approved')
            ->whereDate('tanggal_kembali', '<', \Carbon\Carbon::today())
            ->count();
        $totalUser = \App\Models\User::where('role', 'siswa')->count();

        // Statistik peminjaman per bulan (12 bulan terakhir)
        $statistikPeminjaman = \App\Models\Peminjaman::selectRaw('MONTH(tanggal_pinjam) as bulan, COUNT(*) as total')
            ->where('status', 'approved')
            ->whereYear('tanggal_pinjam', now()->year)
            ->groupByRaw('MONTH(tanggal_pinjam)')
            ->orderByRaw('MONTH(tanggal_pinjam)')
            ->pluck('total', 'bulan')->toArray();

        // Siapkan array 12 bulan, isi 0 jika tidak ada data
        $dataPeminjaman = [];
        for ($i = 1; $i <= 12; $i++) {
            $dataPeminjaman[] = $statistikPeminjaman[$i] ?? 0;
        }

        return view('admin.dashboard', compact('totalBuku', 'totalPeminjaman', 'totalTerlambat', 'totalUser', 'dataPeminjaman'));
    }

    public function siswaMenunggu()
    {
        // Ambil siswa yang belum disetujui beserta permintaan peminjaman pending miliknya
        $siswa = \App\Models\User::where('role', 'siswa')
            ->where('is_approved', false)
            ->with(['peminjamanPending' => function($q) {
                $q->with('book');
            }])
            ->get();
        return view('admin.siswa_menunggu', compact('siswa'));
    }

    public function setujuiSiswa($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->is_approved = true;
        $user->save();
        return back()->with('success', 'Siswa berhasil disetujui!');
    }

    public function daftarSiswa()
    {
        $siswa = \App\Models\User::where('role', 'siswa')->get();
        return view('admin.siswa.index', compact('siswa'));
    }
}
