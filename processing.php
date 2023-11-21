<?php
include "connection.php";

if(isset($_GET['logout'])){
    session_start();
    session_destroy();
    echo '<script>alert("berhasil logout"); window.location="index.php"</script>';
  }

if(isset($_POST['submit'])){

    if($_POST['submit']=="Tambah_buku"){
       $judul = $_POST["judul"];
       $penulis = $_POST["penulis"];
       $tahun = $_POST["tahun"];

       $query = "INSERT INTO book( `judul`, `penulis`, `tahun`) VALUES ('$judul', '$penulis',$tahun)";
       $sql = mysqli_query($connect,$query);

       if($sql){
           header("location:buku.php?success");
           die();
       }else{
           echo "$query";
       }

       
    }
    
    
    elseif($_POST['submit']=="Simpan_buku"){
        
        $id = $_POST["id"];
        $judul = $_POST["judul"];
        $penulis = $_POST["penulis"];
        $tahun = $_POST["tahun"];
        
        $query = "UPDATE `book` SET `judul`= '$judul' ,`penulis`= '$penulis' , `tahun`= '$penulis' WHERE id =$id" ;
        $sql = mysqli_query($connect,$query);
        
        if($sql){
            header("location: buku.php?success");
        }else{
            echo "$query";
        }
        
    }

    
    elseif($_POST['submit']=="tambah_anggota"){
        var_dump($_POST);
        
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $notel = $_POST["notel"];
        
        
        $query = "INSERT INTO anggota( `Nama`, `alamat`, `no_telepon`) VALUES ('$nama', '$alamat','$notel')";
       $sql = mysqli_query($connect,$query);

       if($sql){
           header("location: anggota.php?success");
        }else{
            echo "$query";
       }
       
    }
    
    elseif($_POST['submit']=="Simpan_anggota"){

        $id = $_POST["id"];
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $notel = $_POST["notel"];
        
        $query = "UPDATE `anggota` SET `Nama`= '$nama' ,`alamat`= '$alamat' , `no_telepon`= '$notel' WHERE id =$id" ;
        $sql = mysqli_query($connect,$query);
        
        if($sql){
            header("location: anggota.php?success");
        }else{
            echo "$query";
        }
        
    }
    
    elseif($_POST['submit']=="tambah_peminjam"){
        
        $anggota = $_POST["anggota"];
        $buku = $_POST["buku"];
        $tanggal = $_POST["tanggal"];
        
        if (empty($anggota) or empty($buku) or empty($tanggal)) {
            header("location: input.php?required_peminjam");
        }

        else{
        $query = "INSERT INTO peminjaman( `id_anggota`, `id_buku`, `tanggal_peminjaman`) VALUES ('$anggota', '$buku',$tanggal)";
        $sql = mysqli_query($connect,$query);
        }
        if($sql){
            header("location: peminjam.php?success");
        }else{
            echo "$query";
        }
        
        
    }
    
    elseif($_POST['submit']=="Simpan_peminjam"){
        
        $id = $_POST["id"];
        $anggota = $_POST["anggota"];
        $buku = $_POST["buku"];
        $tanggal = $_POST["tanggal"];
        
        $query = "UPDATE `peminjaman` SET `id_anggota`= '$anggota' ,`id_buku`= '$buku' , `tanggal_peminjaman`= '$tanggal' WHERE id =$id" ;
        $sql = mysqli_query($connect,$query);
        
        if($sql){
            header("location: peminjam.php?success");
        }else{
            echo "$query";
        }
        
    }
    
    elseif($_POST['submit']=="tambah_pengguna"){
        
        $username = $_POST["username"];
        $password = md5($_POST["password"]);
        $jabatan = $_POST["jabatan"];
        $status = $_POST["status"];

        if (empty($username) or empty($password) or empty($jabatan) or empty($status)) {
            header("location: input.php?required");
        }
        else{
        $query = "INSERT INTO pengguna( `username`, `password`, `jabatan`, `status`) VALUES ('$username', '$password',$jabatan ,$status)";
        $sql = mysqli_query($connect,$query);
        }
        if($sql){
            header("location: pengguna.php?success");
        }else{
            echo "$query";
        }
        
        
    }
    
    elseif($_POST['submit']=="Simpan_pengguna"){
        
        $id = $_POST["id"];
        $username = $_POST["username"];
        $password = md5($_POST["password"]);
        $jabatan = $_POST["jabatan"];
        $status = $_POST["status"];

        if (empty($username) or empty($password) or empty($jabatan) or empty($status)) {
            header("location: input.php?required");
        }
        else{
            $query = "UPDATE `pengguna` SET `username`= '$username' ,`password`= '$password' , `jabatan`= '$jabatan',`status`= '$status' WHERE id =$id" ;
            $sql = mysqli_query($connect,$query);
        }
        if($sql){
            header("location: pengguna.php?success");
        }else{
            echo "$query";
        }
        
        
    }
    

}    

elseif(isset($_GET['delet_buku'])){
    $id = $_GET['delet_buku'];
    $query = "DELETE FROM book WHERE id =$id" ;
    $sql = mysqli_query($connect,$query);
    header("location: buku.php?success");
    
}

elseif(isset($_GET['delet_anggota'])){
    $id = $_GET['delet_anggota'];
    $query = "DELETE FROM anggota WHERE id =$id" ;
    $sql = mysqli_query($connect,$query);
    header("location: anggota.php?success");
    
}

elseif(isset($_GET['delet_peminjam'])){
    
    $id = $_GET['delet_peminjam'];
    $query = "DELETE FROM peminjaman WHERE id =$id" ;
    $sql = mysqli_query($connect,$query);
    header("location: peminjam.php?success");
    
}

elseif(isset($_GET['delet_pengguna'])){
    
    $id = $_GET['delet_pengguna'];
    $query = "DELETE FROM pengguna WHERE id =$id" ;
    $sql = mysqli_query($connect,$query);
    header("location: pengguna.php?success");
    
}

?>
