<?php
    require_once("php/dbConfig.php");
    include("phpcompute/grades.php");
    include("php/navbar.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Module Grades</title>
</head>

<body>
    <h1>View Module Grades</h1>
    <?php 
        include("php/viewmodulegrades-display.php");
        // $data = $_SESSION['filter']->fetch_assoc();

        
        ?>    <button onclick="window.location.href='setup-obe.php'">Setup OBE Course Assessment</button>
    
</body>
</html>