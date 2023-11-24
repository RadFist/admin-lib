<?php 
session_start();
include 'connection.php';
if($_SESSION['log'] != 'login'){
    header('location:index.php');
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="asset/fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.min.css">
    <title>Welcome to Library</title>
  </head>
  <body>

  <?php 
  include 'connection.php';
  $book_total = 0;
  $anggota_total = 0;
  $peminjam_total = 0;

  // book
  $querybook = "SELECT count(id) as total from book ";
  $sqlbook = mysqli_query($connect,$querybook);  
  $resultbook = mysqli_fetch_assoc($sqlbook); 
  $book_total = $resultbook['total'];

  // anggota
  
  $queryanggota = "SELECT count(id) as total from anggota ";
  $sqlanggota = mysqli_query($connect,$queryanggota);  
  $resultanggota= mysqli_fetch_assoc($sqlanggota); 
  $anggota_total = $resultanggota['total'];

  //peminjam
  
  $querypeminjam = "SELECT count(id) as total from peminjaman ";
  $sqlpeminjam = mysqli_query($connect,$querypeminjam);  
  $resultpeminjam= mysqli_fetch_assoc($sqlpeminjam); 
  $peminjam_total = $resultpeminjam['total'];

  ?>
     <?php
      include 'header.php'; 
      ?>
      
  <!-- sidenav -->
      <?php
      include 'sidenav.php'; 
      ?>
        <!-- main section -->
        <div class="col-md-10 p-5 full-height">
            <h3>
                <i class="fa-solid fa-gauge me-2 "></i> Dashboard</h3><hr>
                <Div class="row text-white">
                    <!-- buku -->
                    <div class="card bg-warning ms-3" style="width: 18rem;">
                        <div class="card-body mb-2">
                            <div class="card-body-icon">
                                <i class="fa-solid fa-book me-2"></i>
                            </div>
                          <h5 class="card-title">JUMLAH BUKU </h5>
                          <?php
                          echo"<h4 class='display-4'>$book_total</h4>"
                          ?>
                        </div>
                    </div>

                    <!-- anggota -->
                    <div class="card bg-success ms-3" style="width: 18rem;">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa-solid fa-users-line me-2"></i>
                            </div>
                          <h5 class="card-title">JUMLAH ANGGOTA </h5>
                          <?php
                          echo "<h4 class='display-4'>$anggota_total</h4>"
                          ?>
                        </div>
                    </div>

                    <!-- peminjaman -->
                    <div class="card bg-info ms-3" style="width: 18rem;">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa-solid fa-handshake me-2"></i>
                            </div>
                          <h5 class="card-title">JUMLAH PEMINJAM </h5>
                          <?php
                          echo"<h4 class='display-4'>$peminjam_total</h4>"
                          ?>
                          </div>
                    </div>

                </Div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
  <script src="admin.js"></script>
</html>