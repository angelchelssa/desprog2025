<?php
$nilaiNumerik = 92;

if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
    echo "Nilai huruf : A";
} else if ($nilaiNumerik >= 80 && $nilaiNumerik < 90) {
    echo "Nilai huruf : B";
} else if ($nilaiNumerik >= 70 && $nilaiNumerik < 80) {
    echo "Nilai huruf : C";
} else if ($nilaiNumerik < 70) {
    echo "Nilai huruf : D";
}

$jarakSaatIni = 0;
$jarakTarget = 500;
$peningkatanHarian = 30;
$hari = 0;

while ($jarakSaatIni < $jarakTarget) {
    $jarakSaatIni += $peningkatanHarian;
    $hari++;
}
echo "<br><br>Atlet tersebut memerlukan $hari hari untuk mencapai jarak 500 kilometer.<br><br>";

$jumlahLahan = 10;
$tanamanPerLahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for ($i = 1; $i <= $jumlahLahan; $i++) { 
    $jumlahBuah += ($tanamanPerLahan * $buahPerTanaman);
}

echo "Jumlah buah yang akan dipanen adalah: $jumlahBuah";

$skorUjian = [85, 92, 78, 96, 88];
$totalSkor = 0;

foreach($skorUjian as $skor){
    $totalSkor += $skor;
}

echo "<br><br>Total skor ujian adalah: $totalSkor<br><br>";

$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];

foreach($nilaiSiswa as $nilai) {
    if ($nilai < 60) {
        echo "Nilai : $nilai (Tidak lulus) <br>";
        continue;
    }
    echo "Nilai : $nilai (Lulus) <br>";
}

$nilaiSiswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];

sort($nilaiSiswa);

$nilaiFinal = array_slice($nilaiSiswa, 2, -2);

$totalNilai = array_sum($nilaiFinal);

echo "<br><br>Nilai awal Siswa: " . implode (", ", $nilaiSiswa) . "<br>";
echo "Nilai setelah diabaikan: " . implode (", ", $nilaiFinal) . "<br>";
echo "Total nilai yang akan digunakan: " . $totalNilai . "<br>";

$hargaProduk = 120000;
$diskon = 0.20; // 20%
$batasanDiskon = 100000;

if ($hargaProduk > $batasanDiskon) {
    $hargaDiskon = $hargaProduk * $diskon;
    $hargaBayar = $hargaProduk - $hargaDiskon;

    echo "<br><br>Harga Produk: Rp " . number_format($hargaProduk, 0, ',', '.') . "<br>";
    echo "Diskon yang didapat: Rp " . number_format($hargaDiskon, 0, ',', '.') . "<br>";
    echo "Harga yang harus dibayar: Rp " . number_format($hargaBayar, 0, ',', '.');
} else {
    echo "Harga produk tidak memenuhi syarat untuk didiskon.<br>";
    echo "Harga yang harus dibayar: Rp " . number_format($hargaProduk, 0, ',', '.');
}

$skorPemain = 550;

$statusHadiah = ($skorPemain > 500) ? "YA" : "TIDAK";

echo "<br><br>Total skor pemain adalah: " . $skorPemain . " Poin<br>";
echo "Apakah pemain mendapatkan hadiah tambahan? " . $statusHadiah;
?>