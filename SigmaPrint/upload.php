<?php
require_once 'core/init.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

// Proses form jika tombol Payment ditekan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_SESSION['user']; // Ambil username dari session
  $alamat = $_SESSION['alamat'] ?? ''; // Ambil alamat dari session
  $deskripsi = $_POST['deskripsi'];
  $harga = $_POST['harga'];
  $quantity = $_POST['quantity']; // Ambil quantity dari form
  $waktu = date('Y-m-d H:i:s'); // Waktu sekarang

  // Validasi data
  if (empty($alamat)) {
      echo "<script>alert('Alamat belum tersedia. Harap perbarui alamat Anda.');</script>";
  } else {
      // Query untuk menyimpan data ke database
      $sql = "INSERT INTO tbl_order (username, alamat, deskripsi, waktu, harga, quantity) 
              VALUES (:username, :alamat, :deskripsi, :waktu, :harga, :quantity)";
      $stmt = $db->prepare($sql);

      // Bind parameter
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':alamat', $alamat);
      $stmt->bindParam(':deskripsi', $deskripsi);
      $stmt->bindParam(':waktu', $waktu);
      $stmt->bindParam(':harga', $harga, PDO::PARAM_INT);
      $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);

      // Eksekusi query
      if ($stmt->execute()) {
          // Redirect ke halaman payment.php
          header('Location: payment.php');
          exit(); // Pastikan proses PHP berhenti setelah redirect
      } else {
          echo "<script>alert('Gagal menyimpan pesanan: " . implode(", ", $stmt->errorInfo()) . "');</script>";
      }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remote File Uploader</title>
    <!-- Link to CSS file -->
    <link rel="stylesheet" href="./asset/css/style.css">
    <!-- Link to jQuery -->
    <script src="./asset/js/jquery-3.6.0.min.js" defer></script>
    <!-- Link to jQuery froms -->
    <script src="./asset/js/jquery.form.min.js" defer></script>
    <!-- Link to JS file -->
    <script src="./asset/js/script.js" defer></script>
  </head>
  <body>
    <!-- Navigation Bar -->
    <nav>
      <div class="container">
        <div class="nav-wrapper">
          <div class="nav-brand">
            <a href="edit.php"><img src="assets/img/Logo.png" alt="SigmaPrint" style="height: 50px"></a>
          </div>
          <ul>
            <li><a href="edit.php">Home</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <main>
      <div class="cart-container">
        <div class="cart-header">
          <h1 class="page-name">Items</h1>
          <a href="edit.php" class="back-link">Back to Home</a>
        </div>

        <div class="product-list">
          <div class="heading-table">
            <div class="product-col">Item</div>
            <div class="price-col">Harga</div>
            <div class="quantity-col">Jumlah</div>
            <div class="total-col">Total</div>
          </div>

          <div class="product-item">
            <div class="product-info">
              <h3 class="product-name">Print A4</h3>
              <div class="checkbox-wrapper">
                <input type="checkbox" class="round-checkbox" id="colorCheckbox">
                <label for="colorCheckbox">Warna</label>
              </div>
            </div>
            <div class="unit-price" id="unitPrice">Rp. 500</div>
            <div class="quantity">
              <label for="quantityInput">Quantity</label>
              <input type="number" id="quantityInput" value="1" min="1">
            </div>
            <div class="total" id="totalPrice">Rp. 500</div>
          </div>
        </div>

        <div class="cart-footer">
          <div class="subtotal">
            <span class="subtotal-text">Subtotal</span>
            <span class="subtotal-amount" id="subtotalPrice">Rp. 500</span>
          </div>

          <!-- Form for Checkout -->
          <form method="POST" action="">
            <input type="hidden" name="deskripsi" id="hiddenDescription">
            <input type="hidden" name="harga" id="hiddenPrice">
            <input type="hidden" name="quantity" id="hiddenQuantity">
            <button type="submit" class="checkout-btn">Payment</button>
          </form>
        </div>
      </div>
    </main>

    <script>
      // Get DOM Elements
      const colorCheckbox = document.getElementById('colorCheckbox');
      const unitPriceElem = document.getElementById('unitPrice');
      const quantityInput = document.getElementById('quantityInput');
      const totalPriceElem = document.getElementById('totalPrice');
      const subtotalPriceElem = document.getElementById('subtotalPrice');
      const hiddenDescription = document.getElementById('hiddenDescription');
      const hiddenPrice = document.getElementById('hiddenPrice');
      const hiddenQuantity = document.getElementById('hiddenQuantity');

      // Base Prices
      const basePrice = 500;
      const colorPrice = 1000;

      // Update Prices
      function updatePrices() {
        const unitPrice = colorCheckbox.checked ? colorPrice : basePrice;
        const quantity = parseInt(quantityInput.value, 10);
        const totalPrice = unitPrice * quantity;

        // Update the DOM
        unitPriceElem.textContent = `Rp. ${unitPrice}`;
        totalPriceElem.textContent = `Rp. ${totalPrice}`;
        subtotalPriceElem.textContent = `Rp. ${totalPrice}`;

        // Update hidden form fields
        hiddenDescription.value = colorCheckbox.checked ? 'Print A4 (Warna)' : 'Print A4 (Hitam-Putih)';
        hiddenPrice.value = totalPrice;
        hiddenQuantity.value = quantity; // Update quantity
      }

      // Event Listeners
      colorCheckbox.addEventListener('change', updatePrices);
      quantityInput.addEventListener('input', updatePrices);

      // Initial Calculation
      updatePrices();
    </script>
  </body>
</html>


<style>
  .cart-container {
  max-width: 1440px;
  margin: 0 auto;
  padding: 0 165px;
}

.cart-header {
  margin: 60px 0;
}

.page-name {
  font-size: 36px;
  color: #272727;
  margin-bottom: 15px;
}

.back-link {
  color: #363062;
  text-decoration: none;
  font-size: 16px;
}

.product-list {
  margin-bottom: 40px;
}

.heading-table {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr 1fr;
  padding: 20px 0;
  border-bottom: 1px solid #E5E5E5;
  color: #272727;
}

.product-item {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr 1fr;
  padding: 30px 0;
  border-bottom: 1px solid #E5E5E5;
  align-items: center;
}

.product-name {
  font-size: 18px;
  color: #272727;
  margin-bottom: 20px;
}

.checkbox-wrapper {
  display: flex;
  align-items: center;
  gap: 10px;
}

.round-checkbox {
  width: 16px;
  height: 16px;
  border: 3px solid #DBDBDB;
  border-radius: 50%;
  appearance: none;
  cursor: pointer;
}

.round-checkbox:checked {
  background: #87D5AC;
  border-color: #87D5AC;
}

.remove-link {
  color: #363062;
  text-decoration: none;
}

.quantity {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.quantity label {
  color: #272727;
  font-size: 16px;
}

.quantity input {
  width: 75px;
  height: 30px;
  border: 1px solid #363062;
  padding: 0 10px;
}

.cart-footer {
  display: flex;
  justify-content: flex-end;
  align-items: center;
  gap: 70px;
  margin-top: 40px;
}

.subtotal {
  display: flex;
  gap: 20px;
  font-size: 18px;
  color: #272727;
}

.checkout-btn {
  background: #363062;
  color: white;
  border: none;
  padding: 8px 40px;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

.unit-price, .total {
  color: #272727;
  font-size: 16px;
}
</style>