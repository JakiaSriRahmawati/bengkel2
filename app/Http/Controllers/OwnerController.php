<?php

namespace App\Http\Controllers;

use App\Charts\ServiceBulananChart;
use App\Models\pesan;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
    //
    public function homeOwner()
    {
        return view('Owner.homeOwner');
    }

    public function kelolaOwner(ServiceBulananChart $chart, Request $request)
    {
        // untuk transaksi
        $transaksi = transaksi::with('User')->get();
        $transaksi = transaksi::all();
        $totalPemasukan = transaksi::totalPemasukan();
        $totalPengeluaran = transaksi::totalPengeluaran();


        //untuk grafik
        $servisPerBulan = pesan::select(DB::raw('MONTH(tgl_service) as bulan'), DB::raw('count(*) as jumlah_servis'))
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $labels = $servisPerBulan->pluck('bulan')->map(function ($bulan) {
            return date('F', mktime(0, 0, 0, $bulan, 10));
        });

        $jumlahServis = $servisPerBulan->pluck('jumlah_servis');


        return view('Admin.kelolaOwner', compact('transaksi', 'totalPemasukan', 'totalPengeluaran', 'labels', 'jumlahServis'));
    }
}
