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
    <!-- header -->
     <?php
      include 'header.php'; 
      ?>
      
  <!-- sidenav -->
      <?php
      include 'sidenav.php'; 
      ?>
        <!-- main section -->
        <div class="col-md-10 p-5 full-height ">
            <h3>
                <i class="fa-solid fa-book me-2"></i> Daftar Buku</h3><hr>
                
                <?php if (isset($_GET['success'])) { ?>
                        <div class="card mb-2">
                            <div class="p-3 bg-success">
                                Berhasil
                            </div>
                        </div>
                    <?php } ?>

                <a href="input.php?tambah_buku" class="btn btn-primary mb-1"><i class="fas fa-plus-square me-2"></i>Tambah Data Buku</a>
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Buku</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                        include "connection.php"; 
                        $result = mysqli_query($connect,"SELECT * from book");
                        while($tampil = mysqli_fetch_assoc($result)){
            
                    echo "<tr>";
                    echo "<td>".$tampil['judul']."</td>";
                    echo "<td>".$tampil['penulis']."</td>";
                    echo "<td>".$tampil['tahun']."</td>";
                    echo "<td>

                    <!-- edit -->
                        <a class='me-2 edit link-light' href=\"input.php?ubah_buku=$tampil[id]\"  type=\"button\">
                        <i class='fa fa-pencil' aria-hidden=\"true\"></i>
                        </a>
                        
                        
                        <!-- delete -->
                        <a href=\"processing.php?delet_buku=$tampil[id]\" class='delete link-light' onClick=\"return confirm('anda yakin???')\">
                        <i class=\"fa fa-trash\"></i>
                        </a>
                    </td>";
                    echo "</tr>";
                    }
                    ?>
                </tbody>
                </table>
                                
        </div>
        <!-- end main section -->


    </div>
  </body>
  <script src="admin.js"></script>
</html>