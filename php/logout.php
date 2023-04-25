<?php
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['courseTitle']);
    header("Location:../index.php");
?>