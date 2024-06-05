@extends('layouts.main')
@section('content')

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Selamat Datang Admin<span><img src="{{ asset('assets/img/tingtax.png') }}" alt="tingtax Logo"></span></h1>
      <h2>Kami merupakan jasa Perpajakan dan Keuangan</h2>
      <div class="d-flex">
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
        <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
      </div>
    </div>
</section><!-- End Hero -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Pelayanan</h2>
        <h3>Cek <span>Pelayanan Kami</span></h3>
      </div>

    <div class="row mb-4">
        <div class="col-lg-12 d-flex justify-content-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createServicesModal">
                + Tambah Pelayanan
            </button>
        </div>
    </div>
      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
            <ul id="services-flters">
                <li data-filter="*" class="filter-active">Semua</li>
                @foreach($categories as $category)
                    <li data-filter=".filter-{{ $category->id }}">{{ $category->name }}</li>
                @endforeach
            </ul>
        </div>
      </div>
      <div class="row services-container" data-aos="fade-up" data-aos-delay="200">
        @foreach($services as $service)
        <div class="col-lg-4 col-md-6 mb-4 services-item filter-{{ $service->category->id }}">
            <div class="icon-box">
              <div class="icon"><i><img src="{{ Storage::url($service->logo) }}" class="img-fluid"></i></div>
              <h4><a href="#" data-bs-toggle="modal" data-bs-target="#editServiceModal{{ $service->id }}">{{ $service->name }}</a></h4>
            </div>
        </div>
          @include('Admin.services.edit')
        @endforeach
      </div>
    </div>
    @include('Admin.services.create')
</section><!-- End Services Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Portofolio</h2>
        <h3>Cek <span>Portofolio Kami</span></h3>
      </div>

      <div class="row mb-4">
        <div class="col-lg-12 d-flex justify-content-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPortfolioModal">
                + Tambah Portofolio
            </button>
        </div>
    </div>
    @include('Admin.portfolio.create')

    <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
                @foreach($categories as $category)
                    <li data-filter=".filter-{{ $category->id }}">{{ $category->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

        @foreach($portfolios as $portfolio)
            <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $portfolio->service->category->id }}">
                <img src="{{ Storage::url($portfolio->img) }}" class="img-fluid">
                <div class="portfolio-info">
                    <h4>{{ $portfolio->service->name }}</h4>
                    <p>{{ $portfolio->description }}</p>
                    <a href="#" class="details-link" title="More Details" data-bs-toggle="modal" data-bs-target="#editPortfolioModal{{ $portfolio->id }}"><i class="bx bxs-edit"></i></a>
                </div>
            </div>
            @include('admin.portfolio.edit', ['portfolio' => $portfolio, 'services' => $services])
        @endforeach

      </div>
    </div>
  </section><!-- End Portfolio Section -->

    <!-- ======= Clients Section ======= -->
    <section id="rekan" class="clients section-bg">
        <div class="container" data-aos="zoom-in">
            <div class="section-title">
                <h2>Rekan - Rekan Kami</h2>
            </div>
          <div class="row">

            <div class="col-lg-3 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
            </div>

            <div class="col-lg-3 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
            </div>

            <div class="col-lg-3 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
            </div>

            <div class="col-lg-3 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
            </div>

            <div class="col-lg-3 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
            </div>

            <div class="col-lg-3 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
            </div>

          </div>

        </div>
      </section><!-- End Clients Section -->

  <!-- ======= Contact Section ======= -->
  <section id="kontak" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Pesan</h2>
        <h3><span>Pesan Masuk</span></h3>
      </div>

      <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewModal{{ $contact->id }}">Lihat</button>
                        <form action="{{ route('admin.contact.destroy', $contact->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @include('Admin.message.view')
            @endforeach
        </tbody>
    </table>

    </div>
</section><!-- End Contact Section -->

<footer>
    @include('navbar.footer')
</footer>

@endsection
