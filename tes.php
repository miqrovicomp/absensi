<br>
      <center>
        <p>
        <h2>Absensi Karyawan</h2>
           <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Masuk</a>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Pulang</button>  
        </p>

            <div class="position-relative">
                <div class="col-md-3">
                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="card card-body">
                             <?php
                                session_start(); // Pastikan Anda memulai sesi

                                // Periksa apakah sesi username telah diatur
                                if (isset($_SESSION['username'])) {
                                    // Jika telah diatur, tampilkan username
                                    echo "Welcome " . $_SESSION['username'];
                                } else {
                                    // Jika tidak diatur, artinya pengguna belum login atau sesi telah berakhir
                                    echo "Silahkan login untuk melihat username.";
                                }
                              ?>   
                                    <br>
                                    <br> 
                                    <video id="video" autoplay></video>
                                    <button id="captureButton">Ambil Foto</button>
                                    <canvas id="canvas" style="display: none;"></canvas>
                                <button class="button" onclick="absenMasuk()">Absen Masuk</button>
                             
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                        <div class="card card-body">
                            <?php
                               

                                // Periksa apakah sesi username telah diatur
                                if (isset($_SESSION['username'])) {
                                    // Jika telah diatur, tampilkan username
                                    echo "Welcome " . $_SESSION['username'];
                                } else {
                                    // Jika tidak diatur, artinya pengguna belum login atau sesi telah berakhir
                                    echo "Silahkan login untuk melihat username.";
                                }
                              ?>   
                                
                            <br>
                            <br> 
                                <video id="video" autoplay></video>
                                <button id="captureButton">Ambil Foto</button>
                                <canvas id="canvas" style="display: none;"></canvas>
                            <button class="button" onclick="absenPulang()">Absen Pulang</button>  
                        </div>
                    </div>
                </div>
            </div>
            </center>