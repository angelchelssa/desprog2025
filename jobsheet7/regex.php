<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Contoh Regular Expression</title>
</head>
<body>
    <h3>Contoh Pencocokan Pola (Regular Expression)</h3>

    <?php
    // 1. Pencarian huruf kecil
    $pattern = '/[a-z]/';
    $text = 'This is a Sample Text.';

    echo "<h4>1. Pencarian huruf kecil</h4>";
    echo "<p>Teks: $text</p>";

    if (preg_match($pattern, $text)) {
        echo "<p><strong>Hasil:</strong> Huruf kecil ditemukan!</p>";
    } else {
        echo "<p><strong>Hasil:</strong> Tidak ada huruf kecil!</p>";
    }

    // 2. Pencarian angka
    $pattern = '/[0-9]+/';
    $text = 'There are 123 apples.';

    echo "<h4>2. Pencarian angka</h4>";
    echo "<p>Teks: $text</p>";

    if (preg_match($pattern, $text, $matches)) {
        echo "<p><strong>Hasil:</strong> Cocokkan: " . $matches[0] . "</p>";
    } else {
        echo "<p><strong>Hasil:</strong> Tidak ada yang cocok!</p>";
    }

    // 3. Penggantian kata menggunakan preg_replace
    $pattern = '/apple/';
    $replacement = 'banana';
    $text = 'I like apple pie.';
    $new_text = preg_replace($pattern, $replacement, $text);

    echo "<h4>3. Penggantian kata</h4>";
    echo "<p><strong>Hasil:</strong> $new_text</p>";

     // 4️. Pencarian kata dengan "go?d" (huruf o bisa 0 atau 1 kali)
    $pattern = '/go?d/';
    $text = 'god is good and gd is short for good.';
    echo "<h3>4. Pencarian kata dengan pola go?d</h3>";
    echo "<p>Teks: $text</p>";
    if (preg_match($pattern, $text, $matches)) {
        echo "<p><strong>Hasil:</strong> Cocokkan: " . $matches[0] . "</p>";
    } else {
        echo "<p><strong>Hasil:</strong> Tidak ada yang cocok!</p>";
    }

    //5. Pencarian kata dengan "go{2,3}d" (huruf o muncul 2-3 kali)
     $pattern = '/go{2,3}d/';
    $text = 'god is good but goood is too much.';
    echo "<h3>5. Pencarian kata dengan pola go{2,3}d</h3>";
    echo "<p>Teks: $text</p>";
    if (preg_match($pattern, $text, $matches)) {
        echo "<p><strong>Hasil:</strong> Cocokkan: " . $matches[0] . "</p>";
    } else {
        echo "<p><strong>Hasil:</strong> Tidak ada yang cocok!</p>";
    }
    ?>
</body>
</html>
