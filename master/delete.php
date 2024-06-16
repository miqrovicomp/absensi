<?php 
// koneksi database
// Koneksi ke database
$host = 'localhost';
$user = 'root'; // Ganti dengan username database Anda
$pass = ''; // Ganti dengan password database Anda
$dbname = 'absensi'; // Ganti dengan nama database Anda

$conn = new mysqli($host, $user, $pass, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
 
// menangkap data id yang di kirim dari url
$id = $_GET['id_absensi'];
 
 
// menghapus data dari database
mysqli_query($conn,"delete from absensi where id_absensi='$id'");
 
// mengalihkan halaman kembali ke index.php
header("Location: ../master/master1.php ");

include ""
 
?>