<?php
require_once 'core/init.php';

$error ='';

//redirect kalau user sudah login
if(isset($_SESSION['user'])) {
  header('Location: profile.php');
}

//validasi register
if (isset($_POST['login'])) {
  $nama = $_POST['email'];
  $pass = $_POST['password'];

  if(!empty(trim($nama)) && !empty(trim($pass)) ){

    if ( cek_nama($nama) != 0) {
      // die('nama tersedia');
      if(cek_data($nama, $pass)) redirect_login($nama);
      else $error = "nama atau password ada yang salah";

    }else $error = "nama belum terdaftar";

  }else $error = "nama atau password tidak boleh kosong";
}

require_once 'view/header.php';
?>

<br><br>
<div class="container" style="margin-top: 50px;">
  <div class="row" data-aos="zoom-in" data-aos-duration="1000">
    <div class="col s12 m6 offset-m3">
      <div class="card z-depth-3"> <!-- Membuat kotak -->
        <div class="card-content">
          <h5 class="center">Login ke SigmaPrint</h5>
          <p class="center">Agar dapat membuat pesanan, login terlebih dahulu.</p>
          <p class="center">Belum punya akun? <a href="register.php">Klik di sini</a></p>
          <br>
          <?php if($error != ''): ?>
            <div id="error" class="red-text center">
              <?= $error; ?>
            </div>
          <?php endif; ?>
          <form action="" method="post">
            <div class="row">
              <!-- Email -->
              <div class="input-field col s12">
                <input id="email" type="email" name="email" required>
                <label for="email">Email</label>
              </div>
              <!-- Password -->
              <div class="input-field col s12">
                <input id="password" type="password" name="password" required>
                <label for="password">Password</label>
              </div>
              <!-- Login Button -->
              <div class="input-field col s12 center">
                <input class="btn waves-effect waves-light" style="background-color:#363062;" type="submit" name="login" value="Login">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<br><br>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>



<?php require_once 'view/footer.php' ?>
