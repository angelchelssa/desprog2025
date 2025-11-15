<?php
    // Membuat Token Keamanan AJAX request (Csrf Token)
    session_start();
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
?>