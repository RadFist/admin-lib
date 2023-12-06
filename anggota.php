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
                <i class="fa-solid fa-users-line me-2"></i> Daftar Anggota</h3><hr>

                  <?php if (isset($_GET['success'])) { ?>
                        <div class="card mb-2">
                            <div class="p-3 bg-success">
                                Berhasil
                            </div>
                        </div>
                  <?php } ?>

                
                <a href="input.php?tambah_anggota" class="btn btn-primary mb-3"><i class="fas fa-plus-square me-2"></i>Tambah Data Anggota</a>
                <table id="tableformat" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Telp</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                        include "connection.php"; 
                        $result = mysqli_query($connect,"SELECT * from anggota");
                        while($tampil = mysqli_fetch_assoc($result)){
            
                    echo "<tr>";
                    echo "<td>".$tampil['Nama']."</td>";
                    echo "<td>".$tampil['alamat']."</td>";
                    echo "<td>".$tampil['no_telepon']."</td>";
                    echo "<td>

                    <!-- edit -->
                        <a class='me-2 edit link-light' href=\"input.php?ubah_anggota=$tampil[id]\"  type=\"button\" >
                        <i class='fa fa-pencil' aria-hidden=\"true\"></i>
                        </a>
                        
                        
                        <!-- delete -->
                        <a href=\"processing.php?delet_anggota=$tampil[id]\" class='delete link-light' onClick=\"return confirm('anda yakin???')\">
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