<?php
require_once 'core/init.php';


if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pastikan bahwa $db telah diinisialisasi dengan benar
    global $db;
    
    // Logika untuk menghapus akun dari database
    $query = "DELETE FROM tbl_user WHERE email = :email";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':email', $user);
    $stmt->execute();

    // Hapus session dan redirect ke halaman login
    session_destroy();
    header('Location: login.php');
    exit();
}

require_once 'view/header.php';
?>

<div class="container">
    <h4>Apakah Anda yakin ingin menghapus akun ini?</h4>
    <form method="post">
        <button type="submit" class="btn red">Delete Account</button>
        <a href="profile.php" class="btn">Cancel</a>
    </form>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php
require_once 'view/footer.php';
?>
