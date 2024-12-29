<?php
require_once 'core/init.php';
require_once 'view/header.php';
?>

<!-- header center teal-text text-lighten-2 -->
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h2 class="header center black-text text-lighten-2" id="percetakan">Pilih Layanan</h2>
      </div>
    </div>
    <div class="row">

      <div class="col s12 m6 l4">
        <div class="card small z-depth-3">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="assets/img/warna.jpg">
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">Print A4<i class="material-icons right">more_vert</i></span>
            <p><a href="upload.php" class="btn" style="background-color:#363062;">Pesan</a></p>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Print A4<i class="material-icons right">close</i></span>
            <p>Print A4: Rp.1000/lembar</p>
            <p><a href="upload.php" class="btn" style="background-color:#363062;">Pesan</a></p>
          </div>
        </div>
      </div>

      <div class="col s12 m6 l4">
        <div class="card small z-depth-3">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="assets/img/keychain.jpeg">
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">Keychain Custom<i class="material-icons right">more_vert</i></span>
            <p><a href="upload.php" class="btn" style="background-color:#363062;">Pesan</a></p>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Keychain Custom<i class="material-icons right">close</i></span>
            <p>Print Keychain Custom: Rp.6000/pcs</p>
            <p><a href="upload.php" class="btn" style="background-color:#363062;">Pesan</a></p>
          </div>
        </div>
      </div>

<!--end of column-->

<div class="col s12 m6 l4">
        <div class="card small z-depth-3">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="assets/img/chromo.jpg">
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">Sticker Vinyl A4<i class="material-icons right">more_vert</i></span>
            <p><a href="upload.php" class="btn" style="background-color:#363062;">Pesan</a></p>
          </div>
          <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Sticker Chromo A4<i class="material-icons right">close</i></span>
            <p>Print sticker vinyl A4: Rp. 5000/lembar</p>
            <p><a href="upload.php" class="btn" style="background-color:#363062;">Pesan</a></p>
          </div>
        </div>
      </div><!--end of column-->
    </div><!--end of row-->


  </div><!--end of container-->








<?php require_once 'view/footer.php' ?>
