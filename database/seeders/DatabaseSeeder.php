<?php

namespace Database\Seeders;

use App\Models\artikel;
use App\Models\barang;
use App\Models\booking;
use App\Models\bukti;
use App\Models\detailTransaksi;
use App\Models\mekanik;
use App\Models\pesan;
use App\Models\rating;
use App\Models\transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'nama' => 'Rimuru',
            'email' => 'slime@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'Admin',
            'kontak' => '0895746128',
            'profil' => 'rimuru',
            'alamat' => 'Tempest'
        ]);
        User::create([
            'nama' => 'Milim',
            'email' => 'milim@gmail.com',
            'password' => bcrypt('3456'),
            'role' => 'Pengguna',
            'kontak' => '0890846128',
            'profil' => 'img/rimuru.jpg',
            'alamat' => 'Tempest'
        ]);
        User::create([
            'nama' => 'Veldora',
            'email' => 'veldora@gmail.com',
            'password' => bcrypt('7890'),
            'role' => 'Owner',
            'kontak' => '0870643854384',
            'profil' => 'veldora',
            'alamat' => 'Tempest'
        ]);
        User::create([
            'nama' => 'Ramiris',
            'email' => 'ramiris@gmail.com',
            'password' => bcrypt('0987'),
            'role' => 'Mekanik',
            'kontak' => '0845474332200',
            'profil' => 'ramiris',
            'alamat' => 'Tempest'
        ]);
        User::create([
            'nama' => 'Gobta',
            'email' => 'gobta@gmail.com',
            'password' => bcrypt('6543'),
            'role' => 'Mekanik',
            'kontak' => '0874642544',
            'profil' => 'ramiris',
            'alamat' => 'Tempest'
        ]);
        User::create([
            'nama' => 'Shuna',
            'email' => 'shuna@gmail.com',
            'password' => bcrypt('myluv'),
            'role' => 'Kasir',
            'kontak' => '0888753445',
            'profil' => 'shuna.jpg',
            'alamat' => 'Tempest'
        ]);
        pesan::create([
            'user_id' => 2,
            'merek_motor' => 'Honda',
            'mesin_motor' => '150cc',
            'seri_motor' => 'Vario',
            'no_plat' => 'F 4B4D UBD',
            'jenis_service' => 'Ganti Oli Mesin dan Oli Gardan',
            'tgl_service' => '2024-07-03',
            // 'foto'=> 'img/rimuru.jpg',
            'status_orderan' => 'diterima',
            'deskripsi' => 'mau ganti oli dengan oli yang berkualitas',
        ]);
        rating::create([
            'user_id' => 1,
            'rating' => '9/10',
            'deskripsi' => 'pelayanan yang sangat cepat dan sempurna'
        ]);
        artikel::create([
            'user_id' => 1,
            'gambar' => 'img/motor.jpg',
            'judul' => 'Cara Merawat Motor dengan Baik dan Benar',
            'berita' => 'yaitu dengan datang ke bengkel kami'
        ]);
        barang::create([
            'pesan_id' => 1,
            'nama_barang' => 'oli mesin yamaha blue',
            'harga_barang' => '50000',
            'stock' => '100',
        ]);
        barang::create([
            'pesan_id' => 1,
            'nama_barang' => 'Kanvas Rem',
            'harga_barang' => '70000',
            'stock' => '100',
        ]);
        transaksi::create([
            'user_id' => 1,
            'pesan_id' => 1,
            'tgl_transaksi' => Carbon::now()->subDays(10),
            'keterangan' => 'Service Oli Mesin dan Gardan',
            'pemasukan' => 100000,
            'pengeluaran' => 0,
        ]);
        detailTransaksi::create([
            'pesan_id' => 1,
            'user_id' => 2,
            'barang_id' => 1,
            'transaksi_id' => 1,
            'jumlah' => 1,
            'biaya_penanganan' => 20000,
            'subtotal' => 70000
        ]);
        artikel::create([
            'user_id' => 1,
            'gambar' => 'img/teriosmamank.jpeg',
            'judul' => 'Terios Mamang Project bergaya Racing Stance. Makin keren & ciamik!',
            'berita' => 'Mobil Daihatsu Terios TS Extra keluaran tahun 2008 atau biasa disebut Gen 1 besutan Mamang, yang terkenal dengan Mamang Project-nya ini berhasil membuat mobil keluarga itu kelihatan gahar namun tetap elegan sporty dengan tampilan dengan lapisan stiker wrap warna dandelion yellow by  Good Fix Sticker'
        ]);

        bukti::create([
            'user_id'=>2,
            'pesan_id'=>1,
            'foto'=> 'img/rimuru.jpg'
        ]);
    }
}
