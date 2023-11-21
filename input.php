<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="asset/fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.min.css">
   
    <?php
include 'connection.php';
$id = "";
$name_input = "";
$judul_input = "";
$penulis_input = "";
$tahun_input = "";
$alamat_input = "";
$notel_input = "";
$tanggal = "";
$username = "";

if(isset($_GET['ubah_anggota'])){
    $id =$_GET['ubah_anggota'] ;
    $result = mysqli_query($connect,"SELECT * from anggota where id = $id");
    $tampil = mysqli_fetch_assoc($result);
    $name_input = $tampil['Nama'];
    $alamat_input = $tampil['alamat'];
    $notel_input = $tampil['no_telepon'];
}
elseif(isset($_GET['ubah_buku'])){
    $id =$_GET['ubah_buku'] ;
    $result = mysqli_query($connect,"SELECT * from book where id = $id");
    $tampil = mysqli_fetch_assoc($result);
    $judul_input = $tampil['judul'];
    $penulis_input = $tampil['penulis'];
    $tahun_input = $tampil['tahun'];
}
elseif(isset($_GET['ubah_peminjam'])){
    $id =$_GET['ubah_peminjam'] ;
    $query = "SELECT
    peminjaman.id as id,
    anggota.id as idanggota,
    anggota.Nama AS nama,
    book.id AS idbuku,
    book.judul AS buku
    
    FROM
        peminjaman 
    INNER JOIN anggota ON peminjaman.id_anggota = anggota.id
    INNER JOIN book ON peminjaman.id_buku = book.id
    WHERE peminjaman.id = $id;";

    $result = mysqli_query($connect,$query);
    $tampil = mysqli_fetch_assoc($result);
    $idanggota = $tampil['idanggota'];
    $idbuku = $tampil['idbuku'];
    $buku = $tampil['buku'];
    
}elseif(isset($_GET['ubah_pengguna'])){
  $id =$_GET['ubah_pengguna'] ;
  $result = mysqli_query($connect,"SELECT * from pengguna where id = $id");
  $tampil = mysqli_fetch_assoc($result);
  $username = $tampil["username"];
    
}


?>


    <title>Input Data</title>
</head>
<body> 
    <h1 class="text-center mt-4 mb-4" id="h2InputSection class="">Input Data</h1>

    <?php if (isset($_GET['required'])||isset($_GET['required_peminjam'])) { ?>
         <div class="card m-3">
             <div class="body bg-danger p-3">
                Form harus diisi dengan lengka
              </div>            
        </div>

    <?php } ?>
    <form method="POST" action="processing.php">

    <input type="number" value= <?php echo $id; ?> name="id" hidden >

      <!-- buku section-->
      <?php if(isset($_GET['ubah_buku'])||isset($_GET['tambah_buku'])){ ?>
      <?php include "input_buku.php" ?>


        <!-- anggota section-->
        <?php }elseif(isset($_GET['ubah_anggota'])||isset($_GET['tambah_anggota'])){?>
        <?php include "input_anggota.php" ?>
        
        <!-- peminjam section -->
        <?php }elseif(isset($_GET['ubah_peminjam'])||isset($_GET['tambah_peminjam'])||isset($_GET['required_peminjam'])){ ?>
        <?php include "input_peminjam.php" ?>

    <!-- pengguna section -->
    <?php }else{  ?>
      <?php include "input_pengguna.php"; ?>
        <?php } ?>
        
      </div>
    </div>

    </form>
    
</body>
</html>