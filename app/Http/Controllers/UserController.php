<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\detailTransaksi;
use App\Models\pesan;
use App\Models\rating;
use App\Models\transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // home tnpa login
    public function home()
    {
        $artikel = artikel::all();
        $rating = rating::with("user");

        return view("home", compact("artikel", "rating"));
    }

    // control pengguna
    public function homePengguna()
    {
        $user = Auth::user();
        $artikel = artikel::all();
        $rating = rating::with("user");

        return view("Pengguna.homePengguna", compact("user", "artikel", "rating"));
    }

    public function kelolaPengguna()
    {
        $d = User::where('role', 'Pengguna')->get();

        return view('Admin.kelolaPengguna', compact('d'));
    }

    public function postTambahUser(Request $request)
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
        $user->role = 'Pengguna';
        $user->save();

        return redirect()->route('kelolaPengguna')->with('success', 'Pengguna berhasil ditambahkan.');
    }
    // belom bisa wak
    // public function postEditUser(User $user, Request $request)
    // {
    //     $request->validate([
    //         'nama' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email,' . $user->id,
    //         'password' => 'nullable|string|min:8|confirmed',
    //         'kontak' => 'required|string|max:20',
    //         'alamat' => 'required|string',
    //         'profil' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    //     ]);

    //     $user->name = $request->input('nama');
    //     $user->email = $request->input('email');

    //     if ($request->filled('password')) {
    //         $user->password = Hash::make($request->input('password'));
    //     }

    //     $user->kontak = $request->input('kontak');
    //     $user->alamat = $request->input('alamat');

    //     if ($request->hasFile('profil')) {
    //         // Hapus gambar lama jika ada
    //         if ($user->profil) {
    //             Storage::delete('public/profiles/' . $user->profil);
    //         }

    //         $file = $request->file('profil');
    //         $path = $file->store('public/profiles');
    //         $user->profil = basename($path);
    //     }

    //     $user->save();

    //     return redirect()->route('kelolaPengguna', $user->id)->with('success', 'Pengguna berhasil diperbarui.');
    // }

    // pesanan
    function postPesan(Request $request)
    {
        $data = $request->validate([
            'merek_motor' => 'required',
            'seri_motor' => 'required',
            'mesin_motor' => 'required',
            'no_plat' => 'required',
            'jenis_service' => 'required',
            'tgl_service' => 'required',
            'deskripsi' => 'required',
            // 'status_service' => 'required',
            // 'status_pembayaran' => 'required'
        ]);

        // dd($data);

        $pesan = pesan::create([
            'user_id' => Auth::id(),
            'merek_motor' => $request->merek_motor,
            'seri_motor' => $request->seri_motor,
            'mesin_motor' => $request->mesin_motor,
            'no_plat' => $request->no_plat,
            'jenis_service' => $request->jenis_service,
            'tgl_service' => $request->tgl_service,
            'deskripsi' => $request->deskripsi,
            // 'status' => $request->status
        ]);
        $pesan->save();

        $transaksi = new transaksi();
        $transaksi->user_id = Auth::id();
        $transaksi->pesan_id = $pesan->id;
        $transaksi->tgl_transaksi = Carbon::now();
        $transaksi->save();

        return redirect()->route('homePengguna')->with('notifikasi', 'Berhasil Memesan');
    }

    public function profil($id)
    {
        $user = Auth::user();
        $pesan = pesan::where('user_id', $user->id)->get();
        
        
        return view("Pengguna.profil", compact( "user", "pesan"));
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route("home");
    }
}
