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
            <a href="index.php" class="nav-link">View Courses</a>
            <a href="sa-mod1.php" class="nav-link">Module 1</a>
            <a href="sa-mod2.php" class="nav-link">Module 2</a>
            <a href="sa-mod3.php" class="nav-link">Module 3</a>
            <a href="viewmodulegrades.php" class="nav-link">View Module Grades</a>
    </nav>
    <script>
        function dropDown() {
            document.getElementById("services").classList.toggle("show");
        }

        window.onclick = function(e) {
            if (!e.target.matches('.dropbtn')) {
                var services = document.getElementById("services");
                if (services.classList.contains('show')) {
                    services.classList.remove('show');
                }
            }
        }
    </script>
</body>
</html>
