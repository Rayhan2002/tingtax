<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            {{-- <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form> --}}
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <a href=""><img src="{{ asset('assets/img/tingtax.png') }}" alt="tingtax Logo"></a>
            <p>
                Jl. Dupak Rukun Barat No.18 <br>
                Surabaya, Jawa Timur<br><br>

                <strong>Telepon:</strong> 085932919792<br>
                <strong>Email:</strong> tingtax2023@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Tautan Berguna</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Beranda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#tentang">Tentang</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#pelayanan">Pelayanan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Portofolio</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Pelayanan Kami</h4>
            <ul>
                @foreach($services as $service)
                <li><i class="bx bx-chevron-right"></i> <a href="#pelayanan">{{ $service->name }}</a></li>
                @endforeach
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Sosial Media Kami</h4>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>TingTax</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->
