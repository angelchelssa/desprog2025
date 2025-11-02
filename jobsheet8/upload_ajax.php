<?php
$allowed = array('jpg', 'jpeg', 'png', 'gif');
$uploadDir = "uploads/";

foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
    $fileName = $_FILES['files']['name'][$key];
    $fileTmp = $_FILES['files']['tmp_name'][$key];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (in_array($fileExt, $allowed)) {
        move_uploaded_file($fileTmp, $uploadDir . $fileName);
        echo "<img src='$uploadDir$fileName' width='150' style='margin:5px;'>";
    } else {
        echo "<p style='color:red;'>$fileName bukan file gambar yang valid!</p>";
    }
}
?>
