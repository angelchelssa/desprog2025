<?php

$pesan = "saya arek malang";
# ubah variable $pesan menjadi array dengan printah explore
$pesanPerKata = explode(" ", $pesan);
# ubah setiap kata dalam array menjadi kebalikan
$pesanPerKata = array_map(fn($pesan) => strrev($pesan), $pesanPerKata);
# gabungkan kembali array menjadi string
$pesan = implode(" ", $pesanPerKata);

echo $pesan . "<br>";
?>