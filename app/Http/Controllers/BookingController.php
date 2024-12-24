<?php

namespace App\Http\Controllers;

use App\Models\detailTransaksi;
use App\Models\pesan;
use App\Models\transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    //
    public function kelolaPesanan(){
        $p = pesan::all();
        $p = pesan::with('User')->get();

        return view('Admin.kelolaPesan',compact('p'));
    }

    function postPesan(Request $request)
    {
        $data = $request->validate([
            'merek_motor' => 'required',
            'mesin_motor' => 'required',
            'seri_motor' => 'required',
            'no_plat' => 'required',
            'jenis_service' => 'required',
            'tgl_service' => 'required|date',
            'deskripsi' => 'required',
            'status_service' => 'required',
            'status_pembayaran' => 'required',
            'status_orderan' => 'required',
        ]);
    
        $pesan = new pesan();
        $pesan->user_id = Auth::user()->id;
        $pesan->merek_motor = $request->merek_motor;
        $pesan->mesin_motor = $request->mesin_motor;
        $pesan->seri_motor = $request->seri_motor;
        $pesan->no_plat = $request->no_plat;
        $pesan->tgl_service = $request->tgl_service;
        $pesan->deskripsi = $request->deskripsi;
        $pesan->status_service = $request->status_service;
        $pesan->status_pembayaran = $request->status_pembayaran;
        $pesan->status_orderan = $request->status_orderan;
        $pesan->save();
    
        // $transaksi = new transaksi();
        // $transaksi->user_id = Auth::id();
        // $transaksi->pesan_id = $pesan->id;
        // $transaksi->tgl_transaksi = Carbon::now();
        // $transaksi->save();
    
        // // Redirect or return a response after saving
        return redirect()->route('homePengguna')->with('success', 'Data has been saved successfully!');
    }

    function postVerify($id){
        $pesan = pesan::find($id);

        $transaksi = new transaksi();
        $transaksi->user_id = Auth::id();
        $transaksi->pesan_id = $pesan->id;
        $transaksi->tgl_transaksi = Carbon::now();
        $transaksi->save();
    }


    public function detailBooking(){
        $dp = detailTransaksi::all();
        $dp = detailTransaksi::with('User')->get();
        $dp = detailTransaksi::with('barang')->get();

        return view('Admin.detailTransaksi',compact('dp'));
    }
}
