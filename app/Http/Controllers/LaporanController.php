<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Peminjaman;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function exportPdf(Request $request)
    {
        $query = Peminjaman::with(['user', 'book']);

        // Filter berdasarkan tanggal jika ada
        if ($request->tanggal_mulai && $request->tanggal_selesai) {
            $query->whereBetween('tanggal_pinjam', [$request->tanggal_mulai, $request->tanggal_selesai]);
        }

        // Filter berdasarkan status jika ada
        if ($request->status && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        $peminjaman = $query->orderBy('tanggal_pinjam', 'desc')->get();

        $data = [
            'peminjaman' => $peminjaman,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status' => $request->status,
            'tanggal_cetak' => Carbon::now()->format('d/m/Y')
        ];

        $pdf = Pdf::loadView('laporan.pdf', $data);
        $pdf->setPaper('A4', 'landscape');
        
        return $pdf->download('laporan-peminjaman-' . date('Y-m-d') . '.pdf');
    }
}
