<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbas = 'library';

$connect = mysqli_connect($host, $user, $pass) or die('Koneksi Error');
mysqli_select_db($connect, $dbas) or die('Database tidak ditemukan');

$page = (isset($_GET['page']) ? $_GET['page'] : '');
