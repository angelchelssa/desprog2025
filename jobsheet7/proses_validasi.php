<?php
if (isset($_POST['nama']) && isset($_POST['email'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    echo "Data berhasil dikirim: Nama = $nama, Email = $email";
} else {
    echo "Data tidak lengkap!";
}
?>
