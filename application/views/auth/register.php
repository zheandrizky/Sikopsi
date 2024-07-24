<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url('assets/auth/fonts'); ?>/icomoon/style.css">

  <link rel="stylesheet" href="<?php echo base_url('assets/auth/css'); ?>/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/auth/css'); ?>/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/auth/css'); ?>/style.css">

  <title>SIKOPSI-Register</title>
</head>

<body>

  <div class="d-lg-flex half">
    <div class="bg order-2 order-md-1">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <!-- tambahkan indikator sesuai jumlah gambar yang kamu miliki -->
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo base_url('assets/auth'); ?>/images/img1.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo base_url('assets/auth'); ?>/images/img2.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo base_url('assets/auth'); ?>/images/img3.jpg" alt="Second slide">
          </div>
          <!-- tambahkan item carousel sesuai jumlah gambar yang kamu miliki -->
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <div class="contents order-1 order-md-2">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Create New Account</h3>
            <p class="mb-4">Selamat datang, silahkan buat akun Anda</p>
            <?php if (isset($error)) { ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
              </div>
            <?php } elseif ($this->session->flashdata('success')) { ?>
              <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
              </div>
            <?php } ?>
            <?php echo form_open('auth/register'); ?>
            <div class="form-group first">
              <label for="username">NIK</label>
              <input type="number" name="nik" class="form-control" placeholder="Masukkan NIK" id="username">
            </div>
            <div class="form-group last mb-3">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Masukkan Password" id="password">
            </div>

            <!-- <div class="d-flex mb-5 align-items-center"> -->
            <!-- <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                <input type="checkbox" checked="checked" />
                <div class="control__indicator"></div>
              </label> -->
            <!-- <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> -->
            <!-- </div> -->

            <input type="submit" value="Register" class="btn btn-block btn-primary">
            <?php echo form_close(); ?>

            <div class="text-center mt-3">
              <p>Already have an account? <a href="<?php echo site_url('auth/login'); ?>">Sign In</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo base_url('assets/auth/js'); ?>/jquery-3.3.1.min.js"></script>
  <script src="<?php echo base_url('assets/auth/js'); ?>/popper.min.js"></script>
  <script src="<?php echo base_url('assets/auth/js'); ?>/bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets/auth/js'); ?>/main.js"></script>
</body>

</html>