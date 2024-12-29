<?php
require_once 'core/init.php';
require_once 'view/header.php';
?>

<!-- Include AOS CSS -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<div id="index-banner" class="parallax-container">
  <div class="section no-pad-bot">
    <div class="container">
      <br><br>
      <h1 class="header center black-text text-lighten-2" data-aos="fade-up" data-aos-duration="1000">
        🖇️<br>Printing Convinience at Your Fingertips
      </h1>
      <div class="row center" data-aos="fade-up" data-aos-delay="200">
        <h5 class="header col s12 light">Platform layanan cetak di dekat UPI Cibiru</h5>
      </div>
      <div class="row center" data-aos="zoom-in" data-aos-delay="400">
        <a href="#percetakan" id="download-button" class="btn-large waves-effect waves-light" style="background-color:#363062;">
          Lihat Selengkapnya
        </a>
      </div>
      <br><br>
    </div>
  </div>
  <div class="parallax"><img src="assets/img/bgr2.jpg" alt="Unsplashed background img 1"></div>
</div>

<div class="container" data-aos="fade-up" data-aos-duration="1000">
  <h2 class="header center black-text text-lighten-2">Mengapa Harus Kami?</h2>
</div>

<div class="container">
  <div class="section">
    <div class="row">
      <div class="col s12 m4" data-aos="fade-up" data-aos-duration="800">
        <div class="icon-block hover-box">
          <h2 class="center purpule-text"><i class="fa-solid fa-palette"></i></h2>
          <h5 class="center">Kualitas Cetak Tinggi</h5>
          <p class="light" style="text-align: justify;">
            Kami menggunakan teknologi terkini dan bahan berkualitas untuk memastikan setiap hasil cetakan memiliki detail dan warna yang tajam. Kepuasan Anda dengan kualitas hasil cetak kami adalah prioritas utama.
          </p>
        </div>
      </div>

      <div class="col s12 m4" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
        <div class="icon-block hover-box">
          <h2 class="center purpule-text"><i class="fa-solid fa-truck-fast"></i></h2>
          <h5 class="center">Pengiriman Tepat Waktu</h5>
          <p class="light" style="text-align: justify;">
            Kami memahami bahwa waktu adalah uang. Oleh karena itu, SigmaPrint berkomitmen untuk mengirimkan pesanan Anda tepat waktu, tanpa mengorbankan kualitas.
          </p>
        </div>
      </div>

      <div class="col s12 m4" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
        <div class="icon-block hover-box">
          <h2 class="center purpule-text"><i class="fa-solid fa-phone"></i></h2>
          <h5 class="center">Dukungan Pelanggan yang Responsif</h5>
          <p class="light" style="text-align: justify;">
            Tim dukungan pelanggan kami selalu siap membantu Anda. Baik itu menjawab pertanyaan, memberikan saran, atau menyelesaikan masalah, kami ada untuk Anda setiap langkah.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Tambahkan style CSS -->
<style>
  /* Tambahkan border, padding, dan efek hover untuk box */
  .hover-box {
    border: 2px solid #363062;
    border-radius: 10px;
    padding: 20px;
    transition: background-color 0.3s ease, transform 0.3s ease;
  }

  /* Efek hover: ubah warna dan tambahkan sedikit transformasi */
  .hover-box:hover {
    background-color:rgb(165, 144, 204);
    transform: translateY(-5px);
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
  }

  /* Icon styling */
  .hover-box h2 {
    color: #363062;
  }

  /* Heading styling */
  .hover-box h5 {
    font-weight: bold;
  }
</style>

<div class="container" data-aos="fade-up" data-aos-duration="1000">
  <div class="row">
    <div class="col s12 m12 l12">
      <h2 class="header center black-text text-lighten-2" id="percetakan">Layanan Kami</h2>
    </div>
  </div>
  <div class="row">
    <div class="col s12 m6 l4" data-aos="flip-left" data-aos-duration="800">
      <div class="card small z-depth-3">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="assets/img/warna.jpg">
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4">Print A4<i class="material-icons right">more_vert</i></span>
          <p><a href="login.php" class="btn" style="background-color:#363062;">Pesan</a></p>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">Print A4<i class="material-icons right">close</i></span>
          <p>Print A4: Rp.1000/lembar</p>
            <p><a href="upload.php" class="btn" style="background-color:#363062;">Pesan</a></p>
        </div>
      </div>
    </div>

    <div class="col s12 m6 l4" data-aos="flip-left" data-aos-delay="200" data-aos-duration="800">
      <div class="card small z-depth-3">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="assets/img/keychain.jpeg">
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4">Keychain Custom<i class="material-icons right">more_vert</i></span>
          <p><a href="login.php" class="btn" style="background-color:#363062;">Pesan</a></p>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">Keychain Custom<i class="material-icons right">close</i></span>
          <p>Print Keychain Custom: Rp.6000/pcs</p>
            <p><a href="login.php" class="btn" style="background-color:#363062;">Pesan</a></p>
        </div>
      </div>
    </div>

    <div class="col s12 m6 l4" data-aos="flip-left" data-aos-delay="400" data-aos-duration="800">
      <div class="card small z-depth-3">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="assets/img/chromo.jpg">
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4">Sticker Chromo A4<i class="material-icons right">more_vert</i></span>
          <p><a href="login.php" class="btn" style="background-color:#363062;">Pesan</a></p>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">Sticker Chromo A4<i class="material-icons right">close</i></span>
          <p>Print sticker vinyl A4: Rp. 5000/lembar</p>
            <p><a href="login.php" class="btn" style="background-color:#363062;">Pesan</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Include AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>

<?php require_once 'view/footer.php'; ?>
