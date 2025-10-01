<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data dummy (nanti bisa diganti dengan query database)
        $totalLaporan = 120;
        $laporanSelesai = 80;
        $laporanProses = 30;
        $laporanBaru = 10;

        // contoh data array laporan
        $laporanTerbaru = [
            [
                'judul' => '🚧 Jalan Rusak di Jalan Sudirman',
                'status' => 'Diproses',
                'tanggal' => '01 Oktober 2025'
            ],
            [
                'judul' => '♻️ Sampah Menumpuk di Pasar Pagi',
                'status' => 'Selesai',
                'tanggal' => '29 September 2025'
            ],
            [
                'judul' => '💡 Penerangan Jalan Padam',
                'status' => 'Baru',
                'tanggal' => '30 September 2025'
            ],
        ];

        // Passing data ke view
        return view('dashboard', [
            'total' => $totalLaporan,
            'selesai' => $laporanSelesai,
            'proses' => $laporanProses,
            'baru' => $laporanBaru,
            'laporan' => $laporanTerbaru
        ]);
    }
}
