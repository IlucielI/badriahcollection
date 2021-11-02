<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login || Daftar</title>
  <link rel="icon" href="<?= base_url() ?>asset/img/logo.png">
  <link rel="stylesheet" href="<?= base_url() ?>asset/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>asset/css/Login.css">
  <link rel="stylesheet" href="<?= base_url() ?>asset/css/costumalert.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body class="bgLog" style="background-image: url(<?= base_url('asset/img/background.jpg') ?>);">
  <div class="hero">
    <div class="form-box" data-aos="fade-right" data-aos-duration="1500" data-aos-once="false">
      <div class="button-box">
        <div id="btn"></div>
        <button type="button" class="toggle-btn" onclick="login()">Masuk</button>
        <button type="button" class="toggle-btn" onclick="daftar()">Daftar</button>
      </div>
      <form id="login" class="input-group" action="<?= base_url('authen/login') ?>" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="checkbox" class=check-box><span class="rem">Remember Me</span>
        <button type="submit" name="masuk" class="submit-btn">Masuk</button>
      </form>
      <form id="daftar" class="input-group" action="<?= base_url('authen/daftar') ?>" method="POST">
        <input type="text" name="UserDaftar" placeholder="Username" required>
        <input type="password" name="PasswordDaftar" placeholder="Password" required>
        <input type="password" name="KonfirmasiPassword" placeholder="Konfirmasi Password" required>
        <input type="email" name="EmailDaftar" placeholder="Email" required>
        <input type="checkbox" class=check-box1 required><span class="rem">I agree to the terms & conditions</span>
        <button type="submit" name="register" class="submit-btn">Daftar</button>
      </form>
    </div>
  </div>

  <div class="costumalert" style="min-width: 180px;">
    <span class="exclamation"><img src="<?= base_url() ?>asset/img/exclamation.png" width="25px"></span>
    <span class="msg">
      <p style="min-width: 150px;">Warning: This is a warning alert !</p>
    </span>
    <div class="close-btn">
      <span class="close"><img src="<?= base_url() ?>asset/img/close.png" width="20px"></span>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>

  <script src="<?= base_url() ?>asset/js/login.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 3000,
      once: true,
    });
  </script>
  <?php if ($this->session->flashdata('flash')) : ?>
    <script>
      $('.costumalert .msg p').text('<?= $this->session->flashdata('flash') ?>');
      $('.costumalert').addClass('show');
      setTimeout(function() {
        $('.costumalert').removeClass('show');
      }, 5000);
      $('.close-btn').click(function() {
        $('.costumalert').removeClass("show");
      })
    </script>
  <?php endif; ?>
</body>

</html>