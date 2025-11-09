<?php
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']); 

$query = 'SELECT * FROM users WHERE username=$1 AND password=$2';
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Query gagal: " . mysqli_error($conn);
} else {
    if (mysqli_num_rows($result) > 0) {
        echo "Anda berhasil login. Silakan menuju ";
        echo '<a href="homeAdmin.html">Halaman HOME</a>';
    } else {
        echo "Anda gagal login. Silakan ";
        echo '<a href="loginForm.html">Login kembali</a>';
    }
}
?>