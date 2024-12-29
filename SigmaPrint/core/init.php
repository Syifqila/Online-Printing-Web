<?php
session_start();

// Mengimpor file yang diperlukan
require_once 'functions/db.php';
require_once 'functions/blog.php';
require_once 'functions/user.php';

// Menginisialisasi koneksi database
try {
    $db = new PDO('mysql:host=localhost;dbname=db_dprint', 'root', ''); // Pastikan untuk mengganti dengan detail koneksi database Anda
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
