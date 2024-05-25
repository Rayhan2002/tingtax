<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href=""><img src="{{ asset('assets/img/tingtax.png') }}" alt="tingtax Logo"></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        @if(session('is_logged_in'))
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                <li><a class="nav-link scrollto" href="#pelayanan">Pelayanan</a></li>
                <li><a class="nav-link scrollto " href="#portfolio">Portofolio</a></li>
                <li><a class="nav-link scrollto " href="#rekan">Rekan</a></li>
                <li><a class="nav-link scrollto" href="#kontak">Kontak</a></li>
            </ul>
            <a class="btn-login" href="/logout">Keluar</a>
        @else
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                <li><a class="nav-link scrollto" href="#tentang">Tentang</a></li>
                <li><a class="nav-link scrollto" href="#pelayanan">Pelayanan</a></li>
                <li><a class="nav-link scrollto " href="#portfolio">Portofolio</a></li>
                <li><a class="nav-link scrollto " href="#rekan">Rekan</a></li>
                <li><a class="nav-link scrollto" href="#kontak">Kontak</a></li>
            </ul>
            <a class="btn-login" href="/login">Admin</a>
        @endif

        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
