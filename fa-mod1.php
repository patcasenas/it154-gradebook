<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require_once("php/dbConfig.php");
        include("php/navbar.php");
    ?>
</head>

<body>
    <div class="container">
        <!-- Module Name -->
        <?php 
            $modTitle = $db->query ("SELECT modName FROM moduleinfo WHERE modID = '1'");
            $row = $modTitle->fetch_assoc();
        ?>
        <h1><?php echo "Module 1 - " . $row["modName"];?></h1>
        <input type="button" value="Summative Assessment" onclick="window.location='module-1.php'">

        <!-- Section Filter & Update Grades Button -->
        <form action="updateFA-mod1.php" method="post">
            <input type="submit" value="Update Grades" name="updateGrade">
        </form>
    </div>
</body>
</html>