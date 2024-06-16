
<?php

include ('koneksi.php');


// Ambil data dari URL
$username = $_GET['username'];
$type = $_GET['type'];
$time = $_GET['time'];


// SQL untuk menyimpan data absen
$sql = "INSERT INTO absensi (type, time, username) VALUES ('$type', '$time' , '$username')";

if ($conn->query($sql) === TRUE) {
    header("location: absen.php");
} 

$conn->close();
?>