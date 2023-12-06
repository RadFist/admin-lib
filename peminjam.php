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
    
    <!-- data tables -->
    <link rel="stylesheet" href="datatables/datatables.css">
    <script src="datatables/datatables.js"></script>
    
    <title>Welcome to Library</title>
  </head>

<!-- js tables -->
<script>
    $(document).ready(function(){
        $('#tableformat').DataTable();
    })
</script>


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
                <i class="fa-solid fa-handshake me-2"></i> Daftar peminjam</h3><hr>

                <?php if (isset($_GET['success'])) { ?>
                        <div class="card mb-2">
                            <div class="p-3 bg-success">
                                Berhasil
                            </div>
                        </div>
                    <?php } ?>

                
                <a href="input.php?tambah_peminjam" class="btn btn-primary mb-3"><i class="fas fa-plus-square me-2"></i>Tambah Data Peminjaman</a>
                <table id="tableformat" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                    <th scope="col">peminjam</th>
                    <th scope="col">alamat</th>
                    <th scope="col">judul</th>
                    <th scope="col">penulis</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                        include "connection.php"; 
                        $query = "SELECT
                        peminjaman.id,
                        anggota.Nama AS nama,
                        anggota.alamat AS alamat,
                        book.judul AS judul,
                        book.penulis AS penulis
                    FROM
                        peminjaman
                    INNER JOIN anggota ON peminjaman.id_anggota = anggota.id
                    INNER JOIN book ON peminjaman.id_buku = book.id;";

                        $result = mysqli_query($connect,$query);
                        while($tampil = mysqli_fetch_assoc($result)){
            
                    echo "<tr>";
                    echo "<td>".$tampil['nama']."</td>";
                    echo "<td>".$tampil['alamat']."</td>";
                    echo "<td>".$tampil['judul']."</td>";
                    echo "<td>".$tampil['penulis']."</td>";
                    echo "<td>

                    <!-- edit -->
                        <a class='me-2 edit link-light' href=\"input.php?ubah_peminjam=$tampil[id]\"  type=\"button\">
                        <i class='fa fa-pencil' aria-hidden=\"true\"></i>
                        </a>
                        
                        
                        <!-- delete -->
                        <a href=\"processing.php?delet_peminjam=$tampil[id]\" class='delete link-light' onClick=\"return confirm('anda yakin???')\">
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