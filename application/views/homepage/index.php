<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Scaffold Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url('assets/homepage/assets/img')?>/favicon.png" rel="icon">
  <link href="<?php echo base_url('assets/homepage/assets/img')?>/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('assets/homepage/assets/vendor')?>/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/homepage/assets/vendor')?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/homepage/assets/vendor')?>/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/homepage/assets/vendor')?>/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/homepage/assets/vendor')?>/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/homepage/assets/vendor')?>/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('assets/homepage/assets/css')?>/style.css" rel="stylesheet">

  <style>
   

  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">
        <h1><a href="index.html">SIKOPSI</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="<?php echo base_url('assets/homepage/assets/img')?>/logo.png" alt="" class="img-fluid"></a>-->
      </div>
      

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="nav-link scrollto" href="#about">About Us</a></li>
              <li><a class="nav-link scrollto" href="#team">Team</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="<?php echo site_url('auth/login')?>" class="get-started-btn">Login</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center"
          data-aos="fade-up">
          <div>
            <h1>SIKOPSI membantu koperasi simpan pinjam berjalan lebih efektif dan efisien</h1>
            <h2>Tim kami siap membantu meningkatkan efisiensi operasional koperasi dengan teknologi terkini.</h2>
            <!-- <a href="#about" class="btn-get-started scrollto">Get Started</a> -->
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
          <img src="<?php echo base_url('assets/homepage/assets/img')?>/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6" data-aos="zoom-in">
            <img src="<?php echo base_url('assets/homepage/assets/img')?>/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 d-flex flex-column justify-contents-center" data-aos="fade-left">
            <div class="content pt-4 pt-lg-0">
              <h3>Learn more about us</h3>
              <p class="fst-italic">
                SIKOPSI
              </p>
              <p>
                Sistem Informasi Koperasi Desa Sidokerto adalah aplikasi yang dirancang untuk memudahkan pengelolaan
                operasional koperasi di Desa Sidokerto. Aplikasi ini bertujuan untuk meningkatkan efisiensi administrasi
                dan transparansi dalam pengelolaan koperasi, sehingga memberikan manfaat maksimal kepada anggota
                koperasi.
              </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->



    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Services</h2>
          <p>Di dalam aplikasi ini, tersedia berbagai fitur yang dapat membantu Anda dalam efektivitas kegiatan koperasi
            simpan pinjam.
          </p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in">
            <div class="icon-box icon-box-pink">
              <div class="icon"><i class="bi bi-cash"></i></div>
              <h4 class="title"><a href="">Saham</a></h4>
              <p class="description">Uang saham digunakan sebagai persyaratan jika ingin melakukan peminjaman</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
            data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
              <div class="icon"><i class='bx bx-money-withdraw'></i></div>
              <h4 class="title"><a href="">Tabungan</a></h4>
              <p class="description">Persiapkan dana daruratmu dengan menabung</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
            data-aos-delay="200">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="bi bi-credit-card"></i></div>
              <h4 class="title"><a href="">Pinjam</a></h4>
              <p class="description">Ada kebutuhan yang harus dipenuhi? jangan risau kamu bisa pinjam</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in"
            data-aos-delay="300">
            <div class="icon-box icon-box-blue">
              <div class="icon"><i class="bx bx-repeat"></i></div>
              <h4 class="title"><a href="">Pengembalian</a></h4>
              <p class="description">Setelah pinjam jangan lupa balikin ya</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
            consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit
            in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row justify-content-center">

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in">
              <div class="pic"><img src="<?php echo base_url('assets/homepage/assets/img')?>/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Suhar Nanik</h4>
                <span>Ketua</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="<?php echo base_url('assets/homepage/assets/img')?>/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Reni Yuliati</h4>
                <span>Pengurus</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact Us</h2>
        </div>

        <div class="row justify-content-center">

          <div class="col-lg-8 d-flex align-items-stretch" data-aos="fade-right">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Jl. Sono Indah Utara 3 Gang 10, Rt. 04, Rw. 05, Sidokerto Buduran, Sidoarjo</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>zheandrizky@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>(+62)8993326813</p>
              </div>

              <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d247.2727075353069!2d112.71283177158723!3d-7.424983964590207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sid!4v1718724620575!5m2!1sen!2sid"
                frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen>
              </iframe>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>SIKOPSI</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://github.com/zheandrizky">Me</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url('assets/homepage/assets/vendor')?>/aos/aos.js"></script>
  <script src="<?php echo base_url('assets/homepage/assets/vendor')?>/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url('assets/homepage/assets/vendor')?>/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url('assets/homepage/assets/vendor')?>/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url('assets/homepage/assets/vendor')?>/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url('assets/homepage/assets/vendor')?>/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/homepage/assets/js/main.js"></script>

</body>

</html>