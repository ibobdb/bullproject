<?php
include "koneksi.php";
session_start();
error_reporting(E_ERROR | E_PARSE);
$nm = $_POST['nama'];
$pass = $_POST['pass'];
$s = "SELECT * FROM user WHERE nama_user='$nm' AND password_user = '$pass' ";
$q = mysqli_query($conn, $s);
$rm = mysqli_fetch_array($q);
if (mysqli_num_rows($q) > 0) {

    $_SESSION['ss_user'] = $nm;
    echo "
    <script>    
        alert('Anda berhasil masuk');
        document.location.href='index.php?p=game';
        </script>";
} else {
    echo "
    <script>    
        alert('Login Gagal.. username atau password salah');
        document.location.href='index.php';
        
        </script>";
}
