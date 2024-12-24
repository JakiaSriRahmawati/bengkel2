<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Pengguna</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <style>
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            color: #fff;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h4 {
            color: #007bff;
        }

        .sidebar .nav-link {
            color: #adb5bd;
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar .nav-link:hover {
            color: #fff;
            background-color: #495057;
        }

        .sidebar .nav-link.active {
            color: #fff;
            background-color: #007bff;
        }

        .content {
            margin-left: 270px;
            padding: 20px;
        }

        .card {
            width: 100%;
        }

        .table-container {
            margin: 0 auto;
        }

        .table {
            width: 100%;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .nav-link.active {
            color: white !important;
            background-color: #007bff;
        }

        img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h4 class="text-center">Dashboard</h4>
        <hr class="hr">
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('homeAdmin') }}">
                    <i class="bi bi-house-door-fill"></i> Home
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('kelolaOwner') }}">
                    <i class="bi bi-person-up"></i> Owner
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link active" href="{{ route('kelolaPengguna') }}">
                    <i class="bi bi-person-fill"></i> Pengguna
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('kelolaMekanik') }}">
                    <i class="bi bi-person-gear"></i> Mekanik
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link " href="{{ route('kelolaKasir') }}">
                    <i class="bi bi-clipboard2-check"></i> Kasir
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('kelolaPesanan') }}">
                    <i class="bi bi-basket2"></i> Booking
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('detailBooking') }}">
                    <i class="bi bi-clipboard2-check"></i> Detail Booking
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="bi bi-box-arrow-left"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <div class="content">
        <div class="card shadow-sm p-3 mb-5 bg-body rounded">
            <div class="card-body">
                <h5 class="card-title text-center mb-3">Tabel User</h5>
                <div class="mb-3 text-end">
                    <button class="btn btn-primary ms-auto align-self-start rounded" data-bs-toggle="modal" data-bs-target="#tambahMekanikModal">Tambah Pengguna</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>ID</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Kontak</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($d as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><img src="{{ asset($item->profil) }}" alt="Profil"></td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->kontak }}</td>
                                <td>{{ $item->role }}</td>
                                <td class="actions">
                                    <a href="{{ route('editPengguna', $item->id) }}" class="btn btn-outline-primary">Edit
                                        <i class="bi bi-pencil-square"></i></a>
                                    <a href="" class="btn btn-outline-danger"
                                        onclick="return confirm('Yakin Mau Hapus?')">Hapus <i
                                            class="bi bi-trash2-fill"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal --}}
    <div class="modal fade" id="tambahMekanikModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Mekanik</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('postTambahUser') }}" method="POST" class="form-group" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="text-dark">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="text-dark">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="text-dark">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="kontak" class="text-dark">Kontak</label>
                            <input type="text" name="kontak" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="profil" class="text-dark">Profil</label>
                            <input type="file" accept="image/*" name="profil" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="text-dark">Alamat</label>
                            <input type="text" name="alamat" class="form-control" required>
                        </div>
                        <input type="hidden" name="role" value="Mekanik">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
