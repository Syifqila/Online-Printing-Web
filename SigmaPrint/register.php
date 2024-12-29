<?php
require_once 'core/init.php';

$error = '';

// Redirect jika user sudah login
if (isset($_SESSION['user'])) {
    header('Location: profile.php');
    exit();
}

// Validasi register
if (isset($_POST['daftar'])) {
    $nama = $_POST['email'];
    $namauser = $_POST['nama']; // Input nama
    $pass = $_POST['password'];
    $alamat = $_POST['alamat']; // Input alamat

    if (!empty(trim($nama)) && !empty(trim($namauser)) && !empty(trim($pass)) && !empty(trim($alamat))) {
        if (cek_nama($nama) == 0) {
            // Memasukkan ke database
            if (register_user($nama, $namauser, $pass, $alamat)) {
                redirect_login($nama);
            } else {
                $error = "Gagal daftar.";
            }
        } else {
            $error = "Nama sudah dipakai user lain.";
        }
    } else {
        $error = "Nama, password, atau alamat tidak boleh kosong.";
    }
}

require_once 'view/header.php';
?>
<br><br>
<div class="container" style="margin-top: 50px;">
  <div class="row" data-aos="zoom-in" data-aos-duration="1000">
    <div class="col s12 m6 offset-m3">
      <div class="card z-depth-3">
        <div class="card-content">
          <h5 class="center">Daftar ke SigmaPrint</h5>
          <p class="center">Harap mengisi field dengan lengkap.</p>
          <br>
          <?php if ($error != '') : ?>
            <div id="error" class="red-text center">
              <?= $error; ?>
            </div>
          <?php endif; ?>
          <form action="" method="post">
            <div class="row">
               <!-- Nama Lengkap -->
               <div class="input-field col s12">
                <input id="nama" type="text" name="nama" required>
                <label for="nama">Nama Lengkap</label>
              </div>
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
              <!-- Address -->
              <div class="input-field col s12">
                <textarea id="alamat" class="materialize-textarea" name="alamat" required></textarea>
                <label for="alamat">Alamat</label>
              </div>
              <!-- Daftar Button -->
              <div class="input-field col s12 center">
                <input class="btn waves-effect waves-light" style="background-color:#363062;" type="submit" name="daftar" value="Daftar">
              </div>
            </div>
          </form>
        </div>
        <div class="card-action center">
          <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
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

<?php require_once 'view/footer.php'; ?>
