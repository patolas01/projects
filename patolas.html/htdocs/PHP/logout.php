<?php
    session_start();
    $_SESSION['login_user'] = "";
    session_destroy();
    header('location: ../index.php');
?>