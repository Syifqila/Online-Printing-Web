<?php
require_once 'core/init.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $deskripsi = $_POST['deskripsi'];
    $waktu = date('Y-m-d H:i:s'); // Current timestamp
    $harga = $_POST['harga'];

    // Insert data into the database using PDO
    $sql = "INSERT INTO tbl_order (username, deskripsi, waktu, harga) VALUES (:username, :deskripsi, :waktu, :harga)";
    $stmt = $db->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':deskripsi', $deskripsi);
    $stmt->bindParam(':waktu', $waktu);
    $stmt->bindParam(':harga', $harga, PDO::PARAM_INT);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Order berhasil disimpan!');</script>";
        // Redirect if needed
        header('Location: wa.php');
        exit();
    } else {
        echo "<script>alert('Gagal menyimpan order: " . implode(", ", $stmt->errorInfo()) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Remote file uploader</title>

    <!-- Link to CSS file -->
    <link rel="stylesheet" href="./asset/css/style.css" />

    <!-- Link to jQuery -->
    <script src="./asset/js/jquery-3.6.0.min.js" defer></script>
    <!-- Link to jQuery froms -->
    <script src="./asset/js/jquery.form.min.js" defer></script>
    <!-- Link to JS file -->
    <script src="./asset/js/script.js" defer></script>
  </head>
  <body>

  <!-- Navigation bar -->
  <nav>
      <div class="container">
        <div class="nav-wrapper">
          <div class="nav-brand">
            <a href="edit.php"
              ><img
                src="assets/img/Logo.png"
                alt="SigmaPrint"
                style="height: 50px"
            /></a>
          </div>
          <ul>
            <li>
              <a href="edit.php">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <!-- Main content with form -->
    <main>
      <div class="container">
        <div class="form-wrapper">
          <form
            action="send.php"
            method="post"
            enctype="multipart/form-data"
            id="form"
          >
            <h1 class="form-title">Upload Bukti Pembayaran</h1>
            
            <div class="file-input">
              <!-- actual upload which is hidden -->
              <input type="file" name="file" id="actual-btn" hidden />

              <!-- our custom upload button -->
              <label  
                class="custom-file"
                for="actual-btn"
                style="background-color: #363062"
                >Choose File</label
              >

              <!-- name of file chosen -->
              <span id="file-chosen">No file chosen</span>
            </div>
           <br><br>
            <button
              class="btn"
              name="send"
              id="sendButton"
              style="background-color: #363062"
            >
              Send File
            </button>
          </form>

          <!-- Uploading status -->
          <div class="uploading-status hidden">
            <div class="progress-bar" id="uploadingProgress"></div>
            <ul>
              <li>
                <strong>Completed:</strong>
                <span id="completedSize"></span>
              </li>
              <li>
                <strong>Total Size:</strong>
                <span id="totalSize"></span>
              </li>
              <li>
                <strong>File Type:</strong>
                <span id="fileType"></span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>

