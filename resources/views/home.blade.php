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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&display=swap" rel="stylesheet">
    {{-- carousel --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    {{-- fontawesome --}}
    <link href="https://naramizaru.github.io/awesome/css/all.min.css" rel="stylesheet">


    @include('template.navbar')
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        .div-1 {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            color: rgb(0, 0, 0);
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .div-1::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('img/undrewlew.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 1;
            filter: brightness(60%);
            z-index: -1;
        }

        .div-1 .container {
            position: relative;
            z-index: 1;
        }

        .content {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
        }

        .h1 {
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            height: 450px;
            width: 500px;
            size: 200px;
            padding: 10px;
            font-family: "Noto Serif JP", serif;
            font-optical-sizing: auto;
        }

        .h2 {
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            height: 50px;
            width: 500px;
            padding: 30px;
            margin-left: 1%;
            font-family: 'Courier New', Courier, monospace;
            font-optical-sizing: auto;
            color: rgb(209, 125, 114);
        }

        .h3 {
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            height: 50px;
            width: 500px;
            font-family: 'Courier New', Courier, monospace;
            font-optical-sizing: auto;
            color: rgb(209, 156, 156);
        }

        .b {
            padding: 10px 0;
        }

        .card.g {
            background-color: #182d72;
            border: none;
            border-radius: 5px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card.g:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card-img-top.t {
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .card-title {
            font-size: 20px;
        }

        .card-text {
            font-size: 10px;
        }

        .cover {
            margin-top: 20px;
            background: #227bd4;
            padding: 40px 0;
        }

        .l {
            font-family: 'Noto Sans', sans-serif;
            font-weight: 700;
            font-size: 2.5rem;
            color: #182d72;
        }

        .container-p {
            max-width: 1000px;
            margin: 0 auto;
        }

        .product-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 10px;
        }

        .product-item img {
            width: 100px;
            /* Adjust width as needed */
            height: 100px;
            /* Adjust height as needed */
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        /* .product-item img:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        } */

        .product-item p {
            margin-top: 10px;
            font-size: 16px;
            color: #333;
        }

        h1 {
            font-family: 'Noto Sans', sans-serif;
            font-weight: 700;
            color: #182d72;
        }

        .carousel-item img {
            height: 500px;
            /* Adjust height as needed */
            object-fit: cover;
            /* Ensure the image covers the area */
        }

        .carousel-caption {
            background: rgba(0, 0, 0, 0.5);
            /* Add semi-transparent background for better readability */
            padding: 20px;
            border-radius: 10px;
        }

        .carousel-caption h5 {
            font-size: 24px;
            font-weight: 700;
            color: #FFAF00;
        }

        .carousel-caption p {
            font-size: 16px;
            color: #fff;
        }

        .article {
            display: flex;
            flex-direction: column;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        /* .article:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        } */

        .article-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .article-content {
            padding: 20px;
        }

        .article-content h2 {
            font-size: 24px;
            font-weight: 700;
            color: #182d72;
            margin-bottom: 15px;
        }

        .article-content p {
            font-size: 16px;
            color: #555;
            margin-bottom: 15px;
        }

        .btn-outline-success {
            border-color: #28a745;
            color: #28a745;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-outline-success:hover {
            background-color: #28a745;
            color: #ffffff;
        }

        .card-img-top.t {
            border-top-left-radius: 50px;
            border-bottom-left-radius: 150px;
            border-top-right-radius: ;
            width: 100%;
            height: 200px;
            /* Set a fixed height */
            object-fit: cover;
            /* Ensure the image covers the area */
        }

        .card {
            text-align: center;
        }

        .footer {
            background: #333;
            color: white;
            padding: 40px 0;
            text-align: center;
        }

        .footer h4 {
            margin-bottom: 20px;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .footer .social-links {
            margin: 0 auto;
            display: flex;
            justify-content: center;
        }

        .footer .social-links a {
            margin: 0 10px;
            color: white;
            font-size: 24px;
            transition: color 0.3s;
        }

        .footer .social-links a:hover {
            color: #FFD700;
            /* Gold color on hover */
        }

        .content-f {
            padding-bottom: 60px;
            /* Adjust if needed to create space for footer */
        }

        .row-f {
            justify-content: center;
        }

        .footer-col {
            max-width: 400px;
        }

        .bi {
            font-size: 24px;
        }

        /* @media(max-width: 767px){
            .footer-col{
                width: 50%;
                margin-bottom: 30px;
            }
        }
        @media(max-width: 574px){
            .footer-col{
                width: 100%;
            }
        } */
        /* .btnS {
            margin-right: 45%;
            margin-top: 15px;
            margin-bottom: 20px;
        } */

        .g {
            height: 500px;
        }

        /* .t {
            width: 500px;
            height: 100%;
            object-fit: cover;
        } */

        .ct {
            font-weight: 700;
            font-size: 2.5rem;
            color: #182d72;
            text-transform: inherit;
        }
    </style>
</head>

<body style="background-color: rgb(207, 207, 207)">

    <div class="div-1">
        <div class="container">
            <h1 class="h1">Otsu Garage</h1>
            <h1 class="h2">Welcome to Otsu Garage</h1>
            <p class="h3">take back the best quality of your bike</p>
        </div>
    </div>

    <div class="container b">
        <div class="row">
            <h1 class="mt-5 mb-5 text-center text-dark ct" style="font-family: Noto Sans, sans-serif">Mengapa Otsu
                Garage
            </h1>
            <div class="col-4">
                <div class="card g" style="background-color: #182d72">
                    <img src="{{ asset('img/mekanikMotor.jpg') }}" class="card-img-top t" alt="...">
                    <div class="card-body">
                        <h3 class="card-title text-center" style="color:#FFAF00">Bergaransi</h1>
                            <hr>
                            <p class="card-title text-center text-white">Jika ada kerusakan yang disebabkan oleh pihak
                                mekanik kami,
                                kami akan menjamin perbaikan kembali tanpa perlu biaya
                            </p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card g" style="background-color: #182d72">
                    <img src="{{ asset('img/twintrbo.jpg') }}" class="card-img-top t" alt="...">
                    <div class="card-body">
                        <h3 class="card-title text-center" style="color:#FFAF00">Authorized</h1>
                            <hr>
                            <p class="card-title text-center text-white">JLayanan Bengkel Otsu Garage yang menggunakan
                                peralatan yang canggih dan bekerja sama dengan authorized distributor yang menjamin
                                keaslian dan harga yang bersaing.
                            </p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card g" style="background-color: #182d72">
                    <img src="{{ asset('img/man.jpeg') }}" class="card-img-top t" alt="...">
                    <div class="card-body">
                        <h3 class="card-title text-center" style="color:#FFAF00">Pickup</h1>
                            <hr>
                            <p class="card-title text-center text-white">Kami memberikan pelayanan penuh kepada customer
                                dan kami menyediakan layanan pickup kendaraan
                            </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="cover">
        <h1 class="l mt-3 text-center">Product & Service</h1>
        <div class="row justify-content-center">
            <div class="container-p d-flex flex-wrap justify-content-center align-items-center">
                <div class="product-item">
                    <img src="{{ asset('img/gigiii.png') }}" alt="Gigi">
                    <p>Gigi</p>
                </div>
                <div class="product-item">
                    <img src="{{ asset('img/bann.png') }}" alt="Ban">
                    <p>Ban</p>
                </div>
                <div class="product-item">
                    <img src="{{ asset('img/mesinn.png') }}" alt="Mesin">
                    <p>Mesin</p>
                </div>
                <div class="product-item">
                    <img src="{{ asset('img/bannn.png') }}" alt="Suspensi">
                    <p>Suspensi</p>
                </div>
                <div class="product-item">
                    <img src="{{ asset('img/olii.png') }}" alt="Oli">
                    <p>Oli</p>
                </div>
                <div class="product-item">
                    <img src="{{ asset('img/servis.png') }}" alt="Full Service">
                    <p>Full Service</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">

        <div class="container mt-5">
            <div class="row">
                <h1 class="text-center mb-4">Artikel</h1>
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/crishhaun.jpg') }}" class="d-block w-100"
                                alt="Motor Custom Keren">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Motor Custom Keren</h5>
                                <p>Beberapa rekomendasi Motor custom</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/mandalika.jpg') }}" class="d-block w-100"
                                alt="Motogp Mandalika">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Motogp Mandalika</h5>
                                <p>Balap Motor MotoGP Mandalika 2022 Usai, Ini Agenda Balap Berikutnya</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/merawat.jpg') }}" class="d-block w-100" alt="Merawat Motor">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Merawat Motor yang Baik dan Benar</h5>
                                <p>Ini dia beberapa cara merawat motor dengan baik dan benar ala Otsu Garage</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            @foreach ($artikel as $item)
                <div class="article mb-4">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset($item->gambar) }}" alt="Deskripsi Gambar"
                                class="img-fluid article-image">
                        </div>
                        <div class="col-md-8">
                            <div class="article-content p-4">
                                <h2>{{ $item->judul }}</h2>
                                <p>{{ $item->berita }}</p>
                                <a href="" class="btn btn-outline-success">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <button class="btn btn-primary d-flex ms-auto align-self-start rounded mb-2 btnS" id="targetButton" data-bs-toggle="modal"
                data-bs-target="#tambahMekanikModal">Pesan Sekarang</button>

            <section id="reviews" class="reviews mb-5">
                <h2 class="mb-4"><i class="fa-sharp-duotone fa-solid fa-user"></i> User Reviews</h2>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="row g-0">
                                <div class="col-md-3">
                                    <img src="{{ asset('img/rating1.jpg') }}" class="img-fluid rounded-circle m-3"
                                        alt="User Profile Picture">
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <h5 class="card-title">꧁༺₦Ї₦ℑ₳༻꧂</h5>
                                        <p class="card-text">Saya sangat puas dengan layanan service motor di sini!
                                            Teknisi
                                            sangat profesional dan cekatan, dan mereka menyelesaikan perbaikan motor
                                            saya
                                            lebih
                                            cepat dari yang diharapkan. Harganya juga sangat terjangkau untuk kualitas
                                            pelayanan
                                            yang diberikan. Saya akan merekomendasikan tempat ini kepada teman-teman
                                            saya
                                            dan
                                            pasti akan kembali lagi di masa depan!</p>
                                        <p class="card-text"><small class="text-muted"><i
                                                    class="fa-sharp-duotone fa-solid fa-star"></i> Rated 5
                                                stars</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="row g-0">
                                <div class="col-md-3">
                                    <img src="{{ asset('img/rating2.jpg') }}" class="img-fluid rounded-circle m-3"
                                        alt="User Profile Picture">
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <h5 class="card-title">RRQ Bruno {fikri}</h5>
                                        <p class="card-text">Secara keselururahan, pengalaman saya dengan layanan
                                            service
                                            motor
                                            ini sangat memuaskan. Mereka cukup cepat dalam menyelesaikan pekerjaan dan
                                            hasilnya
                                            memuaskan. Namun, ada sedikit masalah dengan komunikasi mengenai biaya
                                            tambahan
                                            yang
                                            muncul. Meskipun demikian, teknisi sangat terampil dan saya merasa motor
                                            saya
                                            dalam
                                            kondisi yang lebih baik. Akan kembali untuk layanan berikutnya.</p>
                                        <p class="card-text"><small class="text-muted"><i
                                                    class="fa-sharp-duotone fa-solid fa-star"></i> Rated 4
                                                stars</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="row g-0">
                                <div class="col-md-3">
                                    <img src="{{ asset('img/rating3.jpg') }}" class="img-fluid rounded-circle m-3"
                                        alt="User Profile Picture">
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <h5 class="card-title">Hannnn`</h5>
                                        <p class="card-text">Layanan di bengkel ini benar-benar luar biasa! Stafnya
                                            sangat
                                            ramah dan jujur, dan mereka menjelaskan setiap langkah dari perbaikan yang
                                            dilakukan
                                            pada motor saya. Selain itu, mereka juga memberikan tips berguna untuk
                                            perawatan
                                            motor di rumah. Motor saya sekarang berfungsi dengan sangat baik. Sangat
                                            merekomendasikan bengkel ini untuk semua kebutuhan service motor Anda!</p>
                                        <p class="card-text"><small class="text-muted"><i
                                                    class="fa-sharp-duotone fa-solid fa-star"></i> Rated 5
                                                stars</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="row g-0">
                                <div class="col-md-3">
                                    <img src="{{ asset('img/rating4.jpg') }}" class="img-fluid rounded-circle m-3"
                                        alt="User Profile Picture">
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <h5 class="card-title">Keromatsu</h5>
                                        <p class="card-text">Layanan service motor di sini cukup standar. Meskipun
                                            teknisi
                                            mampu memperbaiki masalah utama pada motor saya, saya merasa prosesnya agak
                                            lambat
                                            dan harga yang dikenakan sedikit lebih tinggi dari yang saya perkirakan.
                                            Saya
                                            juga
                                            mengalami beberapa masalah dengan komunikasi, dan tidak semua pertanyaan
                                            saya
                                            terjawab dengan baik. Ini mungkin tempat yang baik jika Anda tidak keberatan
                                            menunggu sedikit lebih lama dan membayar sedikit lebih banyak.</p>
                                        <p class="card-text"><small class="text-muted"><i
                                                    class="fa-sharp-duotone fa-solid fa-star"></i> Rated 3
                                                stars</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <div class="content content-f">
                <div class="footer">
                    <div class="row row-f">
                        <div class="footer-col">
                            <h4>Ikuti Kami</h4>
                            <div class="social-links">
                                <a href=""><i class="bi bo bi-facebook"></i></a>
                                <a href=""><i class="bi bo bi-twitter-x"></i></a>
                                <a href=""><i class="bi bo bi-instagram"></i></a>
                                <a href=""><i class="bi bo bi-github"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="tambahMekanikModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Booking</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('postTambahMekanik') }}" method="POST" class="form-group"
                                enctype="multipart/form-data">
                                @csrf
                                <label for="merek_motor" class="text-dark">Merek Motor</label>
                                <input style="background-color: rgba(255, 255, 255, 0.582)" type="text"
                                    id="disabledInput" class="form-control" placeholder="tidak bisa kalo tidak login"
                                    disabled>
                                <label for="email" class="text-dark">Seri Motor</label>
                                <input style="background-color: rgba(255, 255, 255, 0.582)" type="email"
                                    id="disabledInput" class="form-control" placeholder="tidak bisa kalo tidak login"
                                    disabled>
                                <label for="password" class="text-dark">Mesin Motor</label>
                                <input style="background-color: rgba(255, 255, 255, 0.582)" type="pasword"
                                    id="disabledInput" class="form-control" placeholder="tidak bisa kalo tidak login"
                                    disabled>
                                <label for="kontak" class="text-dark">Plat Motor</label>
                                <input style="background-color: rgba(255, 255, 255, 0.582)" type="text"
                                    id="disabledInput" class="form-control" placeholder="tidak bisa kalo tidak login"
                                    disabled>
                                <label for="jenis_service" class="text-dark">Jenis Service</label>
                                <input style="background-color: rgba(255, 255, 255, 0.582)" type="text"
                                    id="disabledInput" class="form-control" placeholder="tidak bisa kalo tidak login"
                                    disabled>
                                <label for="alamat" class="text-dark">Tanggal Booking</label>
                                <input style="background-color: rgba(255, 255, 255, 0.582)" type="text"
                                    id="disabledInput" class="form-control" placeholder="tidak bisa kalo tidak login"
                                    disabled>
                                <label for="alamat" class="text-dark">Deskripsi</label>
                                <input style="background-color: rgba(255, 255, 255, 0.582)" type="text"
                                    id="disabledInput" class="form-control" placeholder="tidak bisa kalo tidak login"
                                    disabled>
                                <label for="alamat" class="text-dark">Status</label>
                                <input style="background-color: rgba(255, 255, 255, 0.582)" type="text"
                                    id="disabledInput" class="form-control" placeholder="tidak bisa kalo tidak login"
                                    disabled>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>


                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
                </script>
                <!-- jQuery -->
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <!-- Bootstrap JS -->
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
                <!-- Slick Carousel JS -->
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
                {{-- button auto bawah --}}
                <script>
                    document.getElementById('scrollButton').addEventListener('click', function() {
                        document.getElementById('targetButton').scrollIntoView({ behavior: 'smooth' });
                    });
                </script>

</body>

</html>
