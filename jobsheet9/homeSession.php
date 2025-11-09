<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Session</title>
</head>
<body>
    <?php
        session_start();

        if($_SESSION['status'] == "login"){
            echo "Selamat datang " . $_SESSION['username'];
            ?>
            <br>
            <a href="sessionLogout.php">Log Out</a>
        <?php
        } else {
            echo "Anda belum login. Silahkan "?>
            <a href="sessionLoginForm.html">Log In</a>
        <?php
        }
    ?>
</body>
</html>