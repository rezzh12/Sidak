<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <h1 class="text-light">
                <a href="index.html">
                    <img src="{{asset('asset_user/img/logo-putih.png')}}" alt="logo">
                    <small>SIAK SALAMNUNGGAL</small>
                </a>
            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="getstarted scrollto" href="{{ url('masuk/'.$nik)}}" style="background-color:blue">Pelayanan</a></li>
                <li><a class="getstarted scrollto" href="{{ url('pendatang/'.$nik)}}" style="background-color:green">Surat</a></li>
                <li><a class="getstarted scrollto" href="{{ url('login')}}">Keluar</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->