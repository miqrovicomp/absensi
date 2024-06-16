<?php
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

// Handle pencarian bulan dan tahun
$bulan = isset($_POST['bulan']) ? $_POST['bulan'] : date('m');
$tahun = isset($_POST['tahun']) ? $_POST['tahun'] : date('Y');

// Kriteria yang ingin difilter
$kriteria = "pulang"; // Misalnya, Anda ingin menampilkan data absensi dengan kriteria "masuk"

// Query SQL untuk mengambil data dari tabel absensi yang memenuhi kriteria dan filter bulan dan tahun
$sql = "SELECT *,
        CASE DAYOFWEEK(tanggal)
            WHEN 1 THEN 'Minggu'
            WHEN 2 THEN 'Senin'
            WHEN 3 THEN 'Selasa'
            WHEN 4 THEN 'Rabu'
            WHEN 5 THEN 'Kamis'
            WHEN 6 THEN 'Jumat'
            WHEN 7 THEN 'Sabtu'
        END AS hari
        FROM absensi 
        WHERE type = '$kriteria' AND MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun";

// Eksekusi query
$result = $conn->query($sql);

// Periksa apakah ada hasil yang ditemukan
if ($result->num_rows > 0) {
    // Mulai tabel HTML
    echo "<form method='post'>
            Bulan: <input type='text' name='bulan' value='$bulan'>
            Tahun: <input type='text' name='tahun' value='$tahun'>
            <input type='submit' value='Cari'>
          </form>";

    echo "<table border='1'>
            <tr>
                <th>Nama</th>
                <th>Hari</th>
                <th>Type</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Keterlambatan</th>
                <th>Aksi</th>
            </tr>";

    // Output data setiap baris
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["username"] . "</td>
                <td>" . $row["hari"] . "</td>
                <td>" . $row["type"] . "</td>
                <td>" . $row["tanggal"] . "</td>
                <td>" . $row["time"] . "</td>
                <td>" . $row["keterlambatan"] . "</td>
                <td><a class='badge badge-danger' href='delete.php?id_absensi="    . $row["id_absensi"] . "'>Delete</a></td>
            </tr>";
    }
    
    // Akhiri tabel HTML
    echo "</table>";
} else {
    // Tampilkan pesan jika tidak ada data absensi yang memenuhi kriteria
    echo "Tidak ada data absensi untuk bulan $bulan tahun $tahun.";
}

// Tutup koneksi database
$conn->close();
?>
