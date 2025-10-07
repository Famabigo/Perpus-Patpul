<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    // Untuk siswa: daftar peminjaman aktif
    public function indexSiswa()
    {
        $aktif = Peminjaman::where('user_id', auth()->id())
            ->whereIn('status', ['pending', 'approved'])
            ->with('book')
            ->orderByDesc('created_at')
            ->get();
        return view('siswa.peminjaman.index', compact('aktif'));
    }

    // Untuk siswa: riwayat peminjaman
    public function riwayatSiswa()
    {
        $riwayat = Peminjaman::where('user_id', auth()->id())
            ->with('book')
            ->orderByDesc('created_at')
            ->get();
        return view('siswa.peminjaman.riwayat', compact('riwayat'));
    }

    // Untuk admin: riwayat semua peminjaman
    public function riwayatAdmin()
    {
        $riwayat = Peminjaman::with('user', 'book')->orderByDesc('created_at')->get();
        return view('peminjaman.riwayat_admin', compact('riwayat'));
    }

    // Untuk admin: daftar peminjaman aktif
    public function aktifAdmin()
    {
        $aktif = Peminjaman::with('user', 'book')
            ->whereIn('status', ['pending', 'approved'])
            ->orderByDesc('created_at')
            ->get();
        return view('peminjaman.aktif_admin', compact('aktif'));
    }

    // Untuk admin: daftar peminjaman terlambat
    public function terlambatAdmin()
    {
        // Hanya tampilkan yang status masih 'approved' (belum returned) dan sudah lewat tanggal_kembali
        $terlambat = Peminjaman::with('user', 'book')
            ->where('status', 'approved')
            ->whereDate('tanggal_kembali', '<', now())
            ->orderByDesc('created_at')
            ->get();
        return view('peminjaman.terlambat_admin', compact('terlambat'));
    }

    public function index()
    {
        $peminjaman = Peminjaman::with('user', 'book')->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function store(Book $book)
    {
        if ($book->stok < 1) {
            return back()->with('error', 'Stok buku habis!');
        }
        $tanggal_pinjam = request('tanggal_pinjam') ?? now();
        $tanggal_kembali = request('tanggal_kembali') ?? null;
        Peminjaman::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'tanggal_pinjam' => $tanggal_pinjam,
            'tanggal_kembali' => $tanggal_kembali,
            'status' => 'pending',
        ]);
        return back()->with('success', 'Request peminjaman dikirim, tunggu persetujuan admin.');
    }

    public function approve($id)
    {
        $p = Peminjaman::findOrFail($id);
        $p->status = 'approved';
        // Generate random queue number: PMJ-YYYYMMDD-XXXX
        $date = now()->format('Ymd');
        $random = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
        $p->queue_number = "PMJ-{$date}-{$random}";
        $p->book->decrement('stok');
        $p->save();
        return back()->with('success', 'Peminjaman disetujui dengan no pesanan: ' . $p->queue_number);
    }

    public function reject($id)
    {
        $p = Peminjaman::findOrFail($id);
        $p->status = 'rejected';
        $p->save();
        return back()->with('success', 'Peminjaman ditolak.');
    }

    public function kembali($id)
    {
        $p = Peminjaman::findOrFail($id);
        $p->status = 'returned';
        $p->tanggal_kembali = now();
        $p->book->increment('stok');
        $p->save();
        return back()->with('success', 'Buku dikembalikan.');
    }

    public function riwayat()
    {
        $riwayat = Peminjaman::where('user_id', auth()->id())->with('book')->get();
        return view('peminjaman.riwayat', compact('riwayat'));
    }
}
