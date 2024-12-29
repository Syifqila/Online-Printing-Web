<?php
require_once "core/init.php";

// Redirect jika pengguna belum login
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

require_once "view/header.php";

// Inisialisasi variabel
$super_user = false;
$user_data = [];
$email = $_SESSION['user'];
$success_message = $error_message = "";

// Periksa apakah user adalah super user
if (cek_status($email) == 1) {
    $super_user = true;
}

// Ambil detail user dari database
$query = "SELECT * FROM tbl_user WHERE email = :email";
$stmt = $db->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->execute();
$user_data = $stmt->fetch(PDO::FETCH_ASSOC);

// Simpan alamat ke session jika tersedia
if ($user_data) {
    $_SESSION['alamat'] = $user_data['alamat'];
}

// Proses pembaruan alamat
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_address'])) {
    $new_address = trim($_POST['alamat']);

    if (!empty($new_address)) {
        $query = "UPDATE tbl_user SET alamat = :alamat WHERE email = :email";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':alamat', $new_address);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            $_SESSION['alamat'] = $new_address; // Perbarui session
            $user_data['alamat'] = $new_address;
            $success_message = "Alamat berhasil diperbarui.";
        } else {
            $error_message = "Gagal memperbarui alamat. Coba lagi nanti.";
        }
    } else {
        $error_message = "Alamat tidak boleh kosong.";
    }
}
?>

<div class="container" style="margin-top: 50px;">
  <div class="row">
    <!-- Sidebar -->
    <div class="col s12 m4 l3" data-aos="fade-right" data-aos-duration="1000">
      <div class="card z-depth-3">
        <div class="card-content">
          <span class="card-title">Menu</span>
          <div class="collection">
            <a href="edit.php" class="collection-item">Buat Pesanan</a>
            <a href="payment.php" class="collection-item">Pembayaran</a>
            <a href="logout.php" class="collection-item">Logout</a>
            <a href="delete_account.php" class="collection-item red-text" 
               onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?');">Delete Account</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <div class="col s12 m8 l9" data-aos="fade-left" data-aos-duration="1000">
      <div class="card z-depth-3">
        <div class="card-content">
          <h4>Halo, <?= htmlspecialchars($_SESSION['user']); ?>!</h4>
          <p>Selamat datang di SigmaPrint! Silakan pilih salah satu menu di samping untuk melanjutkan aktivitas Anda.</p>

          <!-- Address Section -->
          <h5>Alamat Anda</h5>
          <?php if (!empty($success_message)): ?>
            <div class="green-text"> <?= htmlspecialchars($success_message); ?> </div>
          <?php endif; ?>
          <?php if (!empty($error_message)): ?>
            <div class="red-text"> <?= htmlspecialchars($error_message); ?> </div>
          <?php endif; ?>
          <form method="post" action="">
            <div class="input-field">
              <textarea id="alamat" name="alamat" class="materialize-textarea" required><?= htmlspecialchars($user_data['alamat'] ?? ''); ?></textarea>
              <label for="alamat">Alamat</label>
            </div>
            <button type="submit" name="update_address" class="btn waves-effect waves-light" style="background-color:#363062;">Perbarui Alamat</button>
          </form>

          <!-- Order Status Section -->
          <h5>Status Pesanan Anda</h5>
          <?php if (!empty($user_orders)): ?>
            <table class="highlight">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Order ID</th>
                  <th>Deskripsi</th>
                  <th>Status</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($user_orders as $index => $order): ?>
                  <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= htmlspecialchars($order['id']); ?></td>
                    <td><?= htmlspecialchars($order['description']); ?></td>
                    <td><?= htmlspecialchars($order['status']); ?></td>
                    <td><?= htmlspecialchars($order['waktu']); ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
            <p>Anda belum memiliki pesanan.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>

<?php
require_once 'view/footer.php';
?>
