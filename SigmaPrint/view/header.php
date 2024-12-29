<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>SigmaPrint - Home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="assets/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- AOS CSS -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <style media="screen">
    #map{
      height: 400px;
      width: auto;
      background: grey;
    }
    #h2lokasi{
      margin-top: 0;
      margin-bottom: 0;
    }
    .nav-wrapper {
  position: sticky; /* Pastikan sticky digunakan */
  top: 0; /* Tetapkan jarak dari atas */
  z-index: 999; /* Z-index tinggi untuk memastikan di atas elemen lainnya */
  background-color: white; /* Tambahkan warna latar untuk visibilitas */
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); /* Beri efek bayangan */
}

/* Untuk tampilan di layar kecil */
.nav-wrapper .side-nav {
  z-index: 1000; /* Tetapkan nilai z-index lebih tinggi */
}

  </style>
</head>
<body>
    <nav class="white" role="navigation">
      <div class="nav-wrapper container" style="position: sticky; top: 0;">
        <a id="logo-container" href="index.php" class="brand-logo"><img src="view/img/Logo.png" alt="SigmaPrint" style="height: 50px;"></a>
        <ul class="right hide-on-med-and-down">
          <?php if( !isset($_SESSION['user']) ){ ?>
            <li><a href="about.php">About</a></li>
            <li><a href="login.php">Login</a></li>
          <?php }else{ ?>
            <li><a href="about.php">About</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
          <?php } ?>

        </ul>
          <ul id="nav-mobile" class="side-nav">
              <li><a href="about.php">About</a></li>
              <li><a href="login.php">Login</a></li>
          </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
      </div>
    </nav>
