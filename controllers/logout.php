<?php
    session_start();
    unset($_SESSION['signedInEmail']);
    header('Location: ../index.php');
    exit();
?>