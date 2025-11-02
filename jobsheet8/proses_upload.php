<?php
if (isset($_POST["submit"])) {
    $targetDirectory = "uploads/";
    
    // Validasi khusus untuk gambar
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    $maxFileSize = 5 * 1024 * 1024; // 2 MB
    
    // Cek jumlah file yang diupload
    $totalFiles = count($_FILES['files']['name']);
    
    // Cek apakah ada file yang diupload
    if ($totalFiles == 0 || empty($_FILES['files']['name'][0])) {
        echo "Tidak ada file yang dipilih.";
        exit;
    }
    
    echo "<h3>Hasil Upload Gambar:</h3>";
    echo "<hr>";
    
    $successCount = 0;
    $failedCount = 0;
    
    // Loop untuk setiap file
    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['files']['name'][$i];
        $fileTmpName = $_FILES['files']['tmp_name'][$i];
        $fileSize = $_FILES['files']['size'][$i];
        $fileError = $_FILES['files']['error'][$i];
        
        // Skip jika file kosong
        if (empty($fileName)) {
            continue;
        }
        
        echo "<div style='margin-bottom: 15px; padding: 10px; border: 1px solid #ddd;'>";
        echo "<strong>File: $fileName</strong><br>";
        
        // Cek error upload
        if ($fileError !== UPLOAD_ERR_OK) {
            echo "<span style='color: red;'>❌ Error saat upload file.</span><br>";
            $failedCount++;
            echo "</div>";
            continue;
        }
        
        // Validasi ekstensi file
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if (!in_array($fileType, $allowedExtensions)) {
            echo "<span style='color: red;'>❌ Ditolak: Hanya file gambar (jpg, jpeg, png, gif) yang diizinkan.</span><br>";
            echo "Ekstensi file Anda: .$fileType<br>";
            $failedCount++;
            echo "</div>";
            continue;
        }
        
        // Validasi ukuran file
        if ($fileSize > $maxFileSize) {
            $fileSizeMB = round($fileSize / (1024 * 1024), 2);
            echo "<span style='color: red;'>❌ Ditolak: Ukuran file ($fileSizeMB MB) melebihi batas maksimal 2 MB.</span><br>";
            $failedCount++;
            echo "</div>";
            continue;
        }
        
        // Validasi apakah benar-benar file gambar menggunakan getimagesize()
        $imageInfo = getimagesize($fileTmpName);
        if ($imageInfo === false) {
            echo "<span style='color: red;'>❌ Ditolak: File bukan gambar yang valid.</span><br>";
            $failedCount++;
            echo "</div>";
            continue;
        }
        
        // Generate nama file unik untuk menghindari overwrite
        $uniqueName = time() . '_' . $i . '_' . $fileName;
        $targetFile = $targetDirectory . $uniqueName;
        
        // Proses upload file
        if (move_uploaded_file($fileTmpName, $targetFile)) {
            $fileSizeKB = round($fileSize / 1024, 2);
            echo "<span style='color: green;'>✅ Berhasil diunggah!</span><br>";
            echo "Ukuran: $fileSizeKB KB<br>";
            echo "Dimensi: {$imageInfo[0]} x {$imageInfo[1]} pixels<br>";
            echo "Tipe: {$imageInfo['mime']}<br><br>";
            echo "<img src='$targetFile' width='200' style='height: auto; border: 2px solid #4CAF50; border-radius: 5px;'><br>";
            $successCount++;
        } else {
            echo "<span style='color: red;'>❌ Gagal memindahkan file ke folder uploads.</span><br>";
            $failedCount++;
        }
        
        echo "</div>";
    }
    
    // Ringkasan hasil upload
    echo "<hr>";
    echo "<h4>Ringkasan:</h4>";
    echo "<p style='color: green;'>✅ Berhasil: $successCount file</p>";
    echo "<p style='color: red;'>❌ Gagal: $failedCount file</p>";
    echo "<p>Total file diproses: " . ($successCount + $failedCount) . "</p>";
    echo "<br><a href='form_multiupload.php'>Upload Lagi</a>";
}
?>