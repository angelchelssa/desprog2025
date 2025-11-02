<?php
// Lokasi penyimpanan gambar yang diunggah
$targetDirectory = "images/";

// Periksa apakah direktori penyimpanan ada, jika tidak maka buat
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

// Periksa apakah ada file yang diunggah
if ($_FILES['images']['name'][0]) {
    $totalFiles = count($_FILES['images']['name']);

    // Loop melalui semua file yang diunggah
    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['images']['name'][$i];
        $targetFile = $targetDirectory . $fileName;

        // Ambil ekstensi file
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");

        // Cek apakah file termasuk tipe gambar yang diizinkan
        if (in_array($fileType, $allowedExtensions)) {
            // Pindahkan file yang diunggah ke folder tujuan
            if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $targetFile)) {
                echo "Gambar $fileName berhasil diunggah.<br>";
                // Tampilkan preview thumbnail
                echo "<img src='$targetFile' style='max-width:200px; height:auto; margin-bottom:10px;'><br>";
            } else {
                echo "Gagal mengunggah gambar $fileName.<br>";
            }
        } else {
            echo "File $fileName bukan gambar yang diizinkan.<br>";
        }
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>