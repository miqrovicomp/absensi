   <!-- Cdn Boostrab v4 -->
    <script src="/component/js/cdn-boostrab-v4.1.js"></script>
    <script src="/component/js/cdn-boostrab-v4.2.js"></script>
    <script src="/component/js/cdn-boostrab-v4.3.js"></script>
     
     <!-- CSS Boostrab v4 -->
     <link rel="stylesheet" href="../component/boostrab-v4/css-boostrab-v4.css">
     

<br>
<br>
 <center><h2>REKAPAN ABSENSI</h2></center>
 <br>
<div class="row">
   <div class="col-sm-4">                   
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Absen Masuk</h5>
          <p class="card-text">
            <?php
             include ('./A.masuk.php'); 
            ?>
          </p>
        <a href="#" class="btn btn-primary"></a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Absen Pulang</h5>
        <p class="card-text">
            <?php
             include ('./A.pulang.php'); 
            ?>
          </p>
        <a href="#" class="btn btn-primary"></a>
      </div>
    </div>
  </div>
  <div class="col-sm-2">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Total Masuk</h5>
        <p class="card-text">
            <?php
              include ('./J.masuk.php'); 
            ?>
          </p>
        <a href="#" class="btn btn-primary"></a>
      </div>
    </div>
  </div>
  <div class="col-sm-2">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Total Pulang</h5>
        <p class="card-text">
            <?php
              include ('./J.pulang.php'); 
            ?>
          </p>
        <a href="#" class="btn btn-primary"></a>
      </div>
    </div>
  </div>
</div>
 