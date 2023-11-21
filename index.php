<?php
include 'connection.php';
session_start();

if(isset($_GET['Login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $password = md5($password);
        $query = mysqli_query($connect, "SELECT * FROM pengguna WHERE username = '" . $username . "' AND password = '" . $password . "'");
        $tampil = mysqli_fetch_array($query);
        if ($tampil) {
            session_start();
            $_SESSION['id'] = $array['id'];
            $_SESSION['username'] = $array['username'];
            $_SESSION['password'] = $array['password'];
            $_SESSION['jabatan'] = $array['jabatan'];
            $_SESSION['status'] = $array['status'];
            $_SESSION['log'] = 'login';
            header('location:dashboard.php');
        } else {
            header('location:?notfound');
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
    
    <link href="admin.css" rel="stylesheet">
    <link rel="stylesheet" href="asset/fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.min.css">
    <title>Library</title>
</head>
<body>
    <div class="bg-dark d-flex justify-content-center align-items-center flex-column global">
        <h1 class="text-center text-white">LIBRARY</h1>
            <div>
                    <div class="card border-primary" style="height: 390px; width: 390px; padding: 15px;">
                        <div class="card-body">
                            <h2 class="text-center">Login</h2>

                            <?php if (isset($_GET['notfound'])) { ?>
                        <div class="card mb-1">
                            <div class="body bg-danger p-2">
                                Akun tidak ditemukan
                            </div>
                        </div>
                            <?php } ?>

                            <div class="card-text">
                                <form action="?Login" method="post">
                                <div class="mb-3 ">
                                    <i class="fa-solid fa-user"></i>
                                    <label for="inputuser" class="form-label">Username</label>
                                    <input type="text" name="username" required class="form-control bg-dark     border-input text-white border-primary">
                                </div>
                                <div class="mb-4">
                                    <i class="fa-solid fa-lock"></i>
                                    <label for="InputPassword" class="form-label">Password</label>
                                    <input type="password" required name="password" class="form-control bg-dark border-input text-white border-primary ">
                                </div>
                                <div class="d-grid gap-2 pt-3">
                                    <button type="submit" class="btn btn-primary bg-dark">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
    </div> 
</body>
<script src="admin.js"></script>
</html>