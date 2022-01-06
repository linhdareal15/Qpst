<?php
    session_start();
    unset($_SESSION['account']);
    unset($_SESSION['cart']);
    header('Location: login.php');
?>