<!DOCTYPE html>
<html>

<head>
    <?php require('head.php')?>
</head>

<body>
    <nav class="nav">
        <div class="logo-container">
            <img src="img/igrade-white@1x.png" id="nav-logo" alt="iGradebook">
        </div>
        <div class="nav-container">
            <a href="addcourse.php" class="nav-link">Add Course</a>
            <a href="home.php" class="nav-link">View Courses</a>
            <a href="#" class="nav-link">Generate</a>
        </div>
        <div class="nav-logout">

            <div class="nav-name">
                <?php echo $_SESSION['empName']; ?>
            </div>
            <a href="php/logout.php">Logout</a>
        </div>
    </nav>
</body>

</html>