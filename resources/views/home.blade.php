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
      <h1>Selamat Datang di <span><img src="{{ asset('assets/img/tingtax.png') }}" alt="tingtax Logo"></span></h1>
      <h2>Kami merupakan jasa Perpajakan dan Keuangan</h2>
      <div class="d-flex">
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
        <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
      </div>
    </div>
</section><!-- End Hero -->

  <!-- ======= About Section ======= -->
  <section id="tentang" class="about section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Tentang</h2>
        <h3>Pelajari Lebih Lanjut <span>Tentang Kami</span></h3>
      </div>

      <div class="row">
        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
          <img src="assets/img/about.jpg" class="img-fluid" alt="" style="border-radius:20px">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <p class="fst-italic">
                Kami merupakan jasa Perpajakan dan Keuangan yang berdomisili di
                Surabaya, Jawa timur yang memiliki fokus dalam bidang perpajakan,
                keuangan dan edukasi. Berdiri sejak 2021, kami berkomitmen dalam
                memberikan pelayanan terbaik terkait pelaporan pajak dan pembukuan
                yang sesuai dengan peraturan perpajakan dan penerapan prinsip
                akuntansi di Indonesia.
            </p>
            <div class="visi">
                <h3>VISI</h3>
                <p>“Menjadi penyedia jasa pelaporan pajak dan keuangan yang
                    profesional serta edukasi penyuluhan dalam pengembangan
                    praktik akuntansi dan pajak yang berorientasi pada etika
                    profesionalisme dan tanggung jawab sosial dalam sudut
                    pandang global”</p>
            </div>
        </div>
        <div class="col-lg-12 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <div class="misi">
                <h3>MISI</h3>
                <ul>
                    <li>Sebagai pusat informasi perpajakan dan keuangan yang membantu pelaku UMKM atau masyarakat umum dalam pengetahuan dasar perpajakan dan keuangan.</li>
                    <li>Menjalin kemitraan dengan pihak-pihak yang terkait dengan jasa yang kami berikan.</li>
                    <li>Mengembangkan dan mengkaji isu-isu perpajakan yang berhubungan dengan pencatatan keuangan melalui ruang diskusi.</li>
                    <li>Menyelenggarakan seminar atau workshop di bidang perpajakan untuk meningkatkan pengetahuan perpajakan bagi civitas akademika dan masyarakat.</li>
                    <li>Turut membantu dan mensosialisasikan program pemerintah di sektor perpajakan dan keuangan.</li>
                </ul>
            </div>
        </div>
    </div>
  </section><!-- End About Section -->

  <!-- ======= Services Section ======= -->
  <section id="pelayanan" class="services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Pelayanan</h2>
        <h3>Cek <span>Pelayanan Kami</span></h3>
      </div>

      <div class="row">
        @foreach($services as $service)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i><img src="{{ Storage::url($service->logo) }}" class="img-fluid"></i></div>
            <h4><a href="#" data-bs-toggle="modal" data-bs-target="#serviceModal{{ $service->id }}">{{ $service->name }}</a></h4>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="serviceModal{{ $service->id }}" tabindex="-1" aria-labelledby="serviceModalLabel{{ $service->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="serviceModalLabel{{ $service->id }}">{{ $service->name }}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! nl2br(e($service->description)) !!}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                </div>
              </div>
            </div>
        </div>
        @endforeach
      </div>
</section><!-- End Services Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Portofolio</h2>
        <h3>Cek <span>Portofolio Kami</span></h3>
      </div>

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
                    <a href="{{ Storage::url($portfolio->img) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{ $portfolio->service->name }} : {{ $portfolio->description }}"><i class="bx bxs-show"></i></a>
                </div>
            </div>
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
        <h2>Kontak</h2>
        <h3><span>Kontak Kami</span></h3>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-6">
          <div class="info-box mb-4">
            <i class="bx bx-map"></i>
            <h3>Alamat</h3>
            <p>Jl. Dupak Rukun Barat No.18 Surabaya</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-envelope"></i>
            <h3>Email</h3>
            <p>tingtax2023@gmail.com</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-phone-call"></i>
            <h3>Telepon</h3>
            <p>085932919792</p>
          </div>
        </div>

      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-6 ">
          <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.9197033871487!2d112.70703937357092!3d-7.24997937121514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7feb5de9cffff%3A0xae0431bcc199974e!2sJl.%20Dupak%20Rukun%20Barat%20No.18%2C%20Asem%20Rowo%2C%20Kec.%20Asem%20Rowo%2C%20Surabaya%2C%20Jawa%20Timur%2060184!5e0!3m2!1sid!2sid!4v1716544351833!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
        </div>

        <div class="col-lg-6">
          <form action="{{ route('contact.store') }}" method="POST" class="email-form">
            @csrf
            <div class="row">
              <div class="col form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nama Anda" required>
              </div>
              <div class="col form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" required>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Tujuan" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" placeholder="Pesan" required></textarea>
            </div>

            <div class="text-center"><button type="submit">Kirim Pesan</button></div>
          </form>
        </div>

      </div>

    </div>
</section><!-- End Contact Section -->

<footer>
    @include('navbar.footer')
</footer>

@endsection
