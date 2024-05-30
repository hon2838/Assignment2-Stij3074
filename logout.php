<?php
    session_start();
    session_destroy();
    header("Location: login.php");
    echo "<script>alert('You have logged out');</script>";
    exit;
?>

