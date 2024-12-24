<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\bukti;
use App\Models\detailTransaksi;
use App\Models\pesan;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class TransaksiController extends Controller
{
    //
    public function detailTransaksi(Request $request)
    {
        // Validasi data transaksi
        $request->validate([
            'transaksi_id' => 'required|exists:barangs,id',
            'pesan_id' => 'required|exists:barangs,id',
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Buat transaksi baru
        $transaksi = new detailTransaksi();
        $transaksi->transaksi_id = $request->transaksi_id;
        $transaksi->pesan_id = $request->pesan_id;
        $transaksi->barang_id = $request->barang_id;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->save();

        // Kurangi stok barang
        $barang = barang::findOrFail($request->barang_id);
        $barang->kurangiStok($request->jumlah);

        return redirect()->route('homeMekanik')->with('success', 'Transaksi berhasil ditambahkan dan stok barang dikurangi.');
    }

    public function bukti($id)
    {
          // Mengambil pesan berdasarkan ID
    $pesan = pesan::findOrFail($id);
    
    // Mengambil detail transaksi yang terkait dengan pesan
    $detail = detailTransaksi::with(['barang'])->where('pesan_id', $id)->get();
        // Menghitung total harga
    
        return view('Kasir.bukti', compact('pesan', 'detail'));
        // $pesan = pesan::find($id);
        // // dd($pesan);

        // $transaksi = transaksi::where('pesan_id', $id)->with('pesan.user', 'detailTransaksi.barang')->first();

            

        // $detail = DetailTransaksi::where('pesan_id', $id)->with('barang')->first();

        // $transaksi = transaksi::findOrFail($id);

        // // Temukan bukti pembayaran berdasarkan transaksi_id
        // // $bukti = bukti::where('transaksi_id', $id)->first();

        // // barang sesuai ID pesan
        // // disable
        // $status_pembayaran = $pesan->status_pembayaran;

        // return view('Kasir.Bukti', compact('pesan', 'transaksi', 'detail', 'transaksi', 'status_pembayaran'));
    }

    public function bayar(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $pesan = Pesan::where('id', $request->pesan_id)->first();
        $input = [
            'pesan_id' => $request->pesan_id,
            'user_id' => Auth::id()
        ];
        if ($image = $request->file('foto')) {

            $destinationPath = 'image/';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $input['foto'] = "$profileImage";

        }

    
        $bukti = bukti::create($input);

        $pesan->update(['status_pembayaran' => 'Sedang dikonfirmasi']);

        $user = Auth::user();
        return redirect()->route('profil', $user->id)->with('notifikasi', 'Berhasil Mengupload Bukti, Menunggu dikonfirmasi Kasir');
    }

    function MekanikDT()
    {
        $user = Auth::user();
        $detail = detailTransaksi::with(['user', 'pesan', 'barang', 'transaksi'])->get();

        return view('Mekanik.homeDT', compact('detail', 'user'));
    }
    function DT($id)
    {
        $pesan = pesan::find($id);
        $user = $pesan->user;
        $transaksi = $pesan->transaksi;
        // return $pesan;
        return view('Mekanik.DT', compact('user', 'pesan', 'transaksi'));
    }

    public function tambahDT(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'pesan_id' => 'required|exists:pesans,id',
            'transaksi_id' => 'required|exists:transaksis,id',
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'biaya_penanganan' => 'required|numeric',
        ]);

        // harga barang
        $barang = barang::find($request->input('barang_id'));
        if (!$barang) {
            return redirect()->back()->withErrors(['barang_id' => 'Barang tidak ditemukan.']);
        }

        $harga_barang = $barang->harga_barang;
        $jumlah = $request->input('jumlah');
        $biaya_penanganan = $request->input('biaya_penanganan');

        // Hitung subtotal
        $subtotal = ($harga_barang * $jumlah) + $biaya_penanganan;

        // Kurangi stok barang
        if ($barang->stock < $request->jumlah) {
            return back()->with('error', 'Stok barang tidak mencukupi');
        }

        $barang->stock -= $request->jumlah;
        $barang->save();

        DetailTransaksi::create([
            'user_id' => $request->input('user_id'),
            'pesan_id' => $request->input('pesan_id'),
            'transaksi_id' => $request->input('transaksi_id'),
            'barang_id' => $request->input('barang_id'),
            'jumlah' => $jumlah,
            'biaya_penanganan' => $biaya_penanganan,
            'subtotal' => $subtotal,
        ]);

        $user = Auth::user();
        return redirect()->route('homeMekanik', $user->id)->with('success', 'Detail Transaksi berhasil ditambahkan');
    }
}
