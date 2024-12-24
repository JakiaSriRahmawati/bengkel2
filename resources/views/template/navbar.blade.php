{{-- <div class="nav nav-bar fixed-top" >

    <li class="nav-item">
        <a href="{{ route('homePengguna') }}" class="d-flex ms-auto align-items-center nav-link  active">Home</a>
    </li>
    <li class="nav-item">
        <a href="" class="d-flex ms-auto align-items-center nav-link  active">About Us</a>
    </li>
       <li class="login nav-item ms-auto d-flex align-items-center">
        <a href="{{ route('login') }}" class="nav-link active"><i class="bi bi-box-arrow-in-right"></i>Login</a>
    </li>
    <div class="profil d-flex ms-auto align-items-center nav-link" data-bs-toggle="dropdown">
        <i class="bi bi-person-circle"></i>
        {{-- <img src="{{ asset( Auth::User()->profil) }}" alt="Profile" class="rounded-circle" width="40" height="40"> --}}
    {{-- </div> --}}
{{-- </div> --}}

<nav class="navbar">
    <div class="logo"></div>
    <ul class="nav-links">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="#">About</a></li>
         <button class="btn bc mt-1" id="scrollButton">Service Sekarang yuk!</button>
            <li class="login nav-item ms-auto d-flex align-items-center">
                <a href="{{ route('login') }}" class="nav-link text-white active"><i class="bi bi-box-arrow-in-right"></i>Login</a>
                        <i class="bi bi-person-circle"></i>
            </li>
    </ul>
</nav>

<style>
    .bc {
    font-size: 14px; /* Smaller font size */
    padding: 8px 16px; /* Adjust padding for a smaller button */
    border-radius: 50px; /* Rounded button */
    background-color: #007bff; /* Primary blue color */
    color: #fff; /* White text */
    border: none; /* Remove default border */
    transition: background-color 0.3s, transform 0.3s;
}

.navbar {
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.5); /* Transparent background */
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    z-index: 1000;
}

.logo {
    font-size: 24px;
    font-weight: bold;
}

.nav-links {
    list-style: none;
    display:contents;
    margin: 0;
    padding: 0;
}

.nav-links li {
    margin: 0 15px;
}

.nav-links a {
    text-decoration: none;
    color: rgb(255, 255, 255);
    font-size: 18px;
    transition: color 0.3s;
}

.nav-links a:hover {
    color: #FFD700; /* Gold color on hover */
}

.content {
    margin-top: 80px; /* Adjust based on navbar height */
    text-align: center;
    color: white;
    padding: 20px;
}
    </style>


{{-- <style>
        .login{
            margin-left: 1000px
        }
        .navbar {
            background-color: transparent;
        }

        .profil img {
            cursor: pointer;
        }

        .nav-item {
            margin-left: auto;
        }
        .t{
            margin-right: 10px
        }
        .nav-link{
            color:bisque
        }
</style> --}}