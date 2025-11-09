<?php
    include "koneksi.php";

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if($row){
        if($row['level'] == 1){
            echo "Anda berhasil login sebagai Admin. Silakan menuju ";?>
            <a href="homeAdmin.html">Halaman Admin</a>
        <?php 
        } elseif($row['level'] == 2){
            echo "Anda berhasil login sebagai User. Silakan menuju ";?>
            <a href="homeGuest.html">Halaman HOME</a>
        <?php
        } else {
            echo "Anda gagal login. Silakan ";?>
            <a href="loginForm.html">Login kembali</a>
        <?php
        }
    } else {
        echo "Anda gagal login. Silakan ";?>
        <a href="loginForm.html">Login kembali</a>
    <?php
    }
?>