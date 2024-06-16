 
<?php 
 
 session_start();
 if (!isset($_SESSION['username'])) {
     header("Location: index.php");
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Karyawan</title>
    
    <link rel="stylesheet" type="text/css" href="styles.css" />  

    <!-- Swict Alert -->
    <script src="component/animasi/swict-alert.js"></script>

    <!-- Cdn Boostrab v4 -->
    <script src="component/js/cdn-boostrab-v4.1.js"></script>
    <script src="component/js/cdn-boostrab-v4.2.js"></script>
    <script src="component/js/cdn-boostrab-v4.3.js"></script>
     
     <!-- CSS Boostrab v4 -->
    <link rel="stylesheet" href="component/boostrab-v4/css-boostrab-v4.css">
 

</head>
<body>
 
<style>
 .container {
  
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh; /* Mengisi seluruh tinggi viewport */
}

.card {
  width: 271px;
  height: 606px;
  background-color: #f0f0f0;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  overflow: hidden;
}

 

.card-content {
  padding: 20px;
}

.navbar {
  background-color: rgb(90, 90, 90);
  
   
  padding: 10px 0;
  height: 60px; 
   
}

.navbar .rounded{

    position: absolute;
    height: 55px;
    width: 56px;
    top: 2px;
    left: 2px;
}

.navbar .btn{
    position: absolute;
    height: 40px;
    top: 9px;
    left: 190px;
    right: 6px;
    
    

}

/* Make card responsive */
@media (max-width: 300px) {
  .card {
    width: 100%;
    height: auto;
  }
}




</style>

<div class="container d-flex justify-content-center align-items-center">
        <div class="card"   >
            <nav class="navbar">
                <div class="container">
                    <a href="logout.php"   class="btn btn-danger">Logout</a>
                    <img src="uploads/logo1.png" class="rounded float-left" alt="...">
                </div>
            </nav>
                <div class="card">
                    <div class="container d-flex justify-content-center align-items-center" style="height: 90px">
                        
                    
                        <button class="button" onclick="absenMasuk()">Masuk</button>
                        <button class="button" onclick="absenPulang()">Pulang</button>  
                    </div>
                     
                </div>
                     <div class="container d-flex justify-content-center align-items-center">
                        <div class="card" style=" position: absolute; height: 190px;   width: 200px; top: 150px ">
                        <center><?php
                                
                                // Periksa apakah sesi username telah diatur
                                if (isset($_SESSION['username'])) {
                                    // Jika telah diatur, tampilkan username
                                    echo "Welcome " . $_SESSION['username'];
                                } else {
                                    // Jika tidak diatur, artinya pengguna belum login atau sesi telah berakhir
                                    echo "?";
                                }
                              ?></center>  
                            <div class="container d-flex justify-content-center align-items-center" style="position: absolute; height: 290px">
                                <button  type="button" class="btn btn-primary m-2">Ambil Foto</button>
                            </div>   
                                    
                        </div>
                    </div>

                    <div class="container d-flex justify-content-center align-items-center">
                        <div class="card" style=" position: absolute; height: 200px;   width: 200px; top: 380px ">
                            <div class="container d-flex justify-content-center align-items-center" style="position: absolute; height: 60px; top: 0px">
                                <p class="text-monospace">Validation Data</p>
                            </div>

                            <div class="container d-flex justify-content-center align-items-center" style="position: absolute; height: 120px; top: 0px">
                                <button  type="button" class="btn btn-primary  ">Get Location</button><br>
                                
                            </div>     
                        </div>
                    </div>

                    <div class="container d-flex justify-content-center align-items-center">
                        <div   class="footer" style=" position: absolute; height: 50px;   width: 200px; top: 540px ">
                            <div class="container d-flex justify-content-center align-items-center" style="position: absolute; height: 50px; top: 0px ">
                            <button  type="button" class="btn btn-success">Kirim All Data</button><br>
                            </div>         
                        </div>
                    </div>
                </div>, 

        </div>
 </div>        
  
   
    
    <script>
          function absenMasuk() {
            Swal.fire({
            icon: 'success',
            title: 'Absen Masuk',
            showConfirmButton: true,
           

            }).then((result) => {
                if (result.isConfirmed) {
                    var now = new Date();
                    var time = now.getHours() + ":"  + now.getMinutes() + ":" + now.getSeconds();
                    var username = "<?php echo $_SESSION['username']; ?>"; // Mendapatkan nama pengguna dari sesi PHP
                    window.location.href = "proses_absen.php?type=masuk&time=" + time + "&username=" + username;    
                }
            });
        }
    

        function absenPulang() {
            Swal.fire({
                icon: 'info',
                title: 'Absen Pulang',
                text: 'Apakah Anda yakin ingin melakukan absen pulang?',
                showCancelButton: true,
                confirmButtonText: 'Ya, Absen Pulang',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    var now = new Date();
                    var time = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
                    var username = "<?php echo $_SESSION['username']; ?>"; // Mendapatkan nama pengguna dari sesi PHP
                    window.location.href = "proses_absen.php?type=pulang&time=" + time + "&username=" + username;  
                }
            });
        }
    </script>
 
<!-- 
<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
<script>
  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -6.2088, lng: 106.8456},
      zoom: 12
    });
  }
</script><!-- End Js Google maps-->  
        <script>
         import React, { useState, useEffect } from 'react';
import { View, Text, Button, Image, Platform } from 'react-native';
import * as ImagePicker from 'expo-image-picker';

export default function App() {
  const [image, setImage] = useState(null);

  useEffect(() => {
    (async () => {
      if (Platform.OS !== 'web') {
        const { status } = await ImagePicker.requestCameraPermissionsAsync();
        if (status !== 'granted') {
          alert('Permission to access camera is required!');
        }
      }
    })();
  }, []);

  const takePicture = async () => {
    let result = await ImagePicker.launchCameraAsync({
      mediaTypes: ImagePicker.MediaTypeOptions.Images,
      allowsEditing: true,
      aspect: [4, 3],
      quality: 1,
    });

    if (!result.cancelled) {
      setImage(result.uri);
    }
  };

  return (
    <View style={{ flex: 1, alignItems: 'center', justifyContent: 'center' }}>
      <Button title="Take Picture" onPress={takePicture} />
      {image && <Image source={{ uri: image }} style={{ width: 200, height: 200 }} />}
    </View>
  );
}

   
        </script>

        <!-- Ambil foto -->
        <script>
        // Mencari elemen video
        const video = document.getElementById('video');

        // Mendapatkan akses kamera pengguna
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(function(stream) {
                video.srcObject = stream;
            })
            .catch(function(error) {
                console.error('Error accessing the camera:', error);
            });

        // Fungsi untuk mengambil gambar dari video
        function captureImage() {
            const canvas = document.createElement('canvas');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            const context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            
            // Mengonversi gambar dari canvas menjadi blob
            canvas.toBlob(uploadImage, 'image/jpeg');
        }

            // Fungsi untuk mengunggah gambar ke server
            function uploadImage(blob) {
        // Buat nama file dengan ekstensi .jpg atau .jpeg
            const fileName = 'new_image.jpg';

            // Ubah blob menjadi File dengan tipe image/jpeg
            const file = new File([blob], fileName, { type: 'image/jpeg' });

            // Buat FormData dan tambahkan file yang telah diubah
            const formData = new FormData();
            formData.append('gambar', file);

            // Kirim gambar ke server menggunakan AJAX
            fetch('proses_gambar.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    console.log('Gambar berhasil diunggah.');
                    alert('Gambar berhasil diunggah.');
                } else {
                    console.error('Gagal mengunggah gambar.');
                    alert('Gagal mengunggah gambar.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan. Mohon coba lagi.');
            });
        }

        // Menambahkan event listener untuk tombol ambil gambar
        const captureButton = document.getElementById('captureButton');
        captureButton.addEventListener('click', captureImage);

        // Cek apakah browser mendukung geolocation
          if ("geolocation" in navigator) {
            // Minta izin akses lokasi
            navigator.geolocation.getCurrentPosition(
              function(position) {
                // Jika izin diberikan, Anda dapat menggunakan data lokasi di sini
                console.log("Latitude: " + position.coords.latitude + ", Longitude: " + position.coords.longitude);
              },
              function(error) {
                // Tangani kesalahan jika izin tidak diberikan atau terjadi masalah lainnya
                console.error("Error getting geolocation:", error);
              }
            );
          } else {
            // Tangani jika browser tidak mendukung geolocation
            console.error("Geolocation is not supported by this browser.");
          }
    </script>





</body>
</html>
