<?php
$a = 10;
$b = 5;

echo "Nilai a = $a <br>";
echo "Nilai b = $b";

// Operasi Aritmatika
$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali   = $a * $b;
$hasilBagi   = $a / $b;
$sisaBagi    = $a % $b;
$pangkat     = $a ** $b;

echo "<h3>Operasi Aritmatika</h3>";
echo "Hasil Tambah: $a + $b = $hasilTambah <br>";
echo "Hasil Kurang: $a - $b = $hasilKurang <br>";
echo "Hasil Kali: $a x $b = $hasilKali <br>";
echo "Hasil Bagi: $a / $b = $hasilBagi <br>";
echo "Sisa Bagi: $a % $b = $sisaBagi <br>";
echo "Pangkat: $a ** $b = $pangkat <br><br>";


$hasilSama             = $a == $b;
$hasilTidakSama        = $a != $b;
$hasilLebihKecil       = $a < $b;
$hasilLebihBesar       = $a > $b;
$hasilLebihKecilSama   = $a <= $b;
$hasilLebihBesarSama   = $a >= $b;

echo "<h3>Operasi Perbandingan</h3>";
echo "Apakah a sama dengan b? : " . ($hasilSama ? "ya" : "tidak") . "<br>";
echo "Apakah a tidak sama dengan b? : " . ($hasilTidakSama ? "ya" : "tidak") . "<br>";
echo "Apakah a lebih kecil dari b? : " . ($hasilLebihKecil ? "ya" : "tidak") . "<br>";
echo "Apakah a lebih besar dari b? : " . ($hasilLebihBesar ? "ya" : "tidak") . "<br>";
echo "Apakah a lebih kecil atau sama dengan b? : " . ($hasilLebihKecilSama ? "ya" : "tidak") . "<br>";
echo "Apakah a lebih besar atau sama dengan b? : " . ($hasilLebihBesarSama ? "ya" : "tidak") . "<br><br>";

// Operasi Logika
$hasilAnd = $a && $b;
$hasilOr  = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "<h3>Operasi Logika</h3>";
echo "Hasil And (a && b) : " . ($hasilAnd ? "true" : "false") . "<br>";
echo "Hasil OR (a || b) : " . ($hasilOr ? "true" : "false") . "<br>";
echo "Hasil NOT a (!a) : " . ($hasilNotA ? "true" : "false") . "<br>";
echo "Hasil NOT b (!b) : " . ($hasilNotB ? "true" : "false") . "<br><br>";

// Increment / Decrement

$a = 10;
$b = 5;

echo "<h3>Operasi Penugasan</h3>";
echo "Nilai awal a = $a <br>";

$a += $b;
echo "Setelah a += b, a = $a <br>";

$a -= $b;
echo "Setelah a -= b, a = $a <br>";

$a *= $b;
echo "Setelah a *= b, a = $a <br>";

$a /= $b;
echo "Setelah a /= b, a = $a <br>";

$a %= $b;
echo "Setelah a %= b, a = $a <br>";

$a = 10;      // integer
$b = "10";    // string

echo "<h3>Hasil Operator Identitas</h3>";
echo "Nilai a = $a (integer)<br>";
echo "Nilai b = '$b' (string)<br><br>";

$hasilIdentik = ($a === $b);
$hasilTidakIdentik = ($a !== $b);

echo "Apakah a identik dengan b (a === b)? ";
var_dump($hasilIdentik);
echo "<br>";

echo "Apakah a tidak identik dengan b (a !== b)? ";
var_dump($hasilTidakIdentik);

$totalKursi = 45;
$kursiTerisi = 28;
$kursiKosong = $totalKursi - $kursiTerisi;
$persenKosong = ($kursiKosong / $totalKursi) * 100;

echo "<h3>Soal Cerita: Kursi Restoran</h3>";
echo "Total kursi = $totalKursi <br>";
echo "Kursi terisi = $kursiTerisi <br>";
echo "Kursi kosong = $kursiKosong kursi <br>";
echo "Persentase kursi kosong = " . number_format($persenKosong, 2) . "%<br>";

?>