<!DOCTYPE html>
<html lang="id">

<head>
    <title>Hasil Input Aman</title>
</head>

<body>
    <h2>Hasil Input Aman</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil dan amankan input teks
        $input = htmlspecialchars($_POST['input'], ENT_QUOTES, 'UTF-8');

        // Ambil input email
        $email = $_POST['email'];

        // Validasi format email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

            echo "<h3>Hasil input yang sudah aman:</h3>";
            echo "<p><b>Teks:</b> $input</p>";
            echo "<p><b>Email:</b> $email</p>";
        } else {
            echo "<p style='color:red;'>Email yang dimasukkan tidak valid!</p>";
        }
    } else {
        echo "<p>Tidak ada data yang dikirim!</p>";
        echo "<p>Silakan isi form dulu di <a href='form.php'>halaman form</a>.</p>";
    }
    ?>
</body>

</html>