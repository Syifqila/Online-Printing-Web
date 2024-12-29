<?php

function register_user($nama, $namauser, $pass, $alamat) {
    global $link;

    $nama = escape($nama);
    $username = escape($namauser);
    $pass = escape($pass);
    $alamat = escape($alamat);
    // $status = escape($status);

    // Hash password
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    // Default status untuk pengguna baru
    $status = 0;

    // Query untuk menambahkan data ke database
    $query = "INSERT INTO tbl_user (email, username, password, alamat, status) VALUES ('$nama', '$namauser', '$pass', '$alamat', '$status')";

    if (mysqli_query($link, $query)) {
        return true;
    } else {
        // Tambahkan ini untuk mencetak error dari MySQL
        echo "Error: " . mysqli_error($link);
        return false;
    }    
}

// Untuk memeriksa apakah username sudah digunakan
function cek_nama($nama) {
    global $link;
    $nama = escape($nama);

    $query = "SELECT * FROM tbl_user WHERE email = '$nama'";
    if ($result = mysqli_query($link, $query)) {
        return mysqli_num_rows($result);
    }
    return 0; // Jika query gagal, kembalikan 0
}

// Untuk memeriksa data login
function cek_data($nama, $pass) {
    global $link;

    $nama = escape($nama);

    $query = "SELECT password FROM tbl_user WHERE email='$nama'";
    $result = mysqli_query($link, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $hash = mysqli_fetch_assoc($result)['password'];
        return password_verify($pass, $hash);
    }

    return false; // Jika tidak ada hasil, login gagal
}

// Redirect ke halaman profil setelah login
function redirect_login($nama) {
    $_SESSION['user'] = $nama;
    header('Location: profile.php');
}

// Untuk mengecek status user (0 atau 1)
function cek_status($email) {
    global $link;
    $nama = escape($email);

    $query = "SELECT status FROM tbl_user WHERE email='$nama'";
    $result = mysqli_query($link, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        return $row['status'];
    }

    return null; // Jika tidak ada hasil, kembalikan null
}

// Untuk mendapatkan ID user berdasarkan username
function cek_id($email) {
    global $link;
    $nama = escape($email);

    $query = "SELECT id_user FROM tbl_user WHERE email='$nama'";
    $result = mysqli_query($link, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        return $row['id_user'];
    }

    return null; // Jika tidak ada hasil, kembalikan null
}
?>
