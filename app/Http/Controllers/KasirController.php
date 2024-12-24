<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\bukti;
use App\Models\pesan;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasirController extends Controller
{
    //

    public function kelolaKasir(Request $request)
    {
        if ($request->has('search')) {
            $m = User::where('nama', 'LIKE', '%' . $request->search . '%')->where('role', 'Kasir')->get();
        } else {
            $m = User::where('role', 'Kasir')->get();
        }

        return view('Admin.kelolaMekanik', compact('m'));
    }
    public function homeKasir($id)
    {
        $user = User::findOrFail($id);
        // $bukti = bukti::all();
        $barangs = barang::all();
    //     $pesans = Pesan::all();
        $p = pesan::with('User')->get();
        $p = pesan::with('bukti')->get();
        $o = pesan::where('user_id', $id)->first(); 
    
        return view('Kasir.homeKasir', compact('user', 'p', 'o'));
    }
    

    public function confirm($id)
    {
        $p = pesan::with('User')->get();
        $pesan = pesan::find($id);
        // $o = pesan::where('user_id', $id)->first();
        return view('Kasir.confirm', compact('pesan', 'p'));
    }
    public function editconfirm(Pesan $pesan, Request $request)
    {
        $data = $request->validate([
            'status_pembayaran' => 'required|string'
        ]);
        $pesan->update($data);
        dump($data);
        return redirect()->route('homeKasir', ['id' => $pesan->user_id])->with('notifikasi', 'berhasil dikonifrmasi');
    }

    public function postTambahKasir(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'kontak' => 'required',
            'profil' => 'required',
            'alamat' => 'required'
        ]);

        $user = new User();
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('default_password');
        $user->alamat = $request->alamat;
        $user->kontak = $request->kontak;
        $user->profil = $request->profil->store('img');
        $user->role = 'Kasir';
        $user->save();

        return redirect()->route('kelolaPengguna')->with('success', 'Pengguna berhasil ditambahkan.');
    }
}
