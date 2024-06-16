<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan file gambar telah diunggah dengan benar
    if (isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] == UPLOAD_ERR_OK) {
        // Tentukan direktori penyimpanan di dalam proyek Anda
        $target_dir = "uploads/";
        
        // Buat direktori jika belum ada
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true); // Mengatur izin 0777 untuk membuatnya dapat ditulis
        }
        
        // Generate nama unik untuk gambar
        $target_file = $target_dir . uniqid() . '_' . basename($_FILES["gambar"]["name"]);
        
        // Pindahkan file yang diunggah ke direktori target
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            // File berhasil diunggah, sekarang simpan informasi tentang gambar ke dalam database
            $nama_file = basename($_FILES["gambar"]["name"]);
            $ukuran_file = $_FILES["gambar"]["size"];
            $tipe_file = $_FILES["gambar"]["type"];
            
            include ('koneksi.php');
            
            // Buat query untuk menyimpan informasi tentang gambar ke dalam database
            $sql = "INSERT INTO tabel_gambar (nama_file, ukuran_file, tipe_file, path_file) VALUES ('$nama_file', '$ukuran_file', '$tipe_file', '$target_file')";
            
            // Jalankan query
            if ($conn->query($sql) === TRUE) {
                echo "Informasi gambar berhasil disimpan ke database.";
            } else {
                echo "Maaf, terjadi kesalahan saat menyimpan informasi gambar ke database: " . $conn->error;
            }
            
            // Tutup koneksi database
            $conn->close();
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah gambar.";
        }
    } else {
        echo "Maaf, hanya file gambar yang diizinkan untuk diunggah.";
    }
} else {
    // Jika halaman diakses secara langsung tanpa metode POST
    echo "Akses tidak valid.";
}
?>
