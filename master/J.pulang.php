<?php
// Koneksi ke database
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

// Query SQL untuk mengambil total masuk
$sql = "SELECT COUNT(*) AS total_pulang FROM absensi WHERE type = 'pulang'";

// Eksekusi query
$result = $conn->query($sql);

// Periksa apakah ada hasil yang ditemukan
if ($result->num_rows > 0) {
    // Ambil data hasil query
    $row = $result->fetch_assoc();
    
    // Tampilkan total masuk
    echo "" . $row["total_pulang"];
} else {
    // Tampilkan pesan jika tidak ada data absensi yang memenuhi kriteria
    echo "Tidak ada data masuk.";
}

// Tutup koneksi database
$conn->close();
?>
