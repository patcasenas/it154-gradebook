<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        session_id("1");
        require("php/session_start.php");
        require_once("php/dbConfig.php");
        include("php/navbar.php");
    ?>
</head>

<body>
    <div class="container">
        <!-- Module Name -->
        <?php 
            $modTitle = $db->query ("SELECT modName FROM moduleinfo WHERE modID = '2'");
            $row = $modTitle->fetch_assoc();
        ?>
        <h1><?php echo "Module 3 - " . $row["modName"];?></h1>
        <div class="btn">
        <button onclick="window.location='sa-mod2.php'">Summative Assessment</button>
        <button onclick="window.location='fa-maxscore.php'">Set Maximum Score</button>
        </div>
        
        <!-- Section Filter & Update Grades Button -->
        <?php include("php/filter-fa.php"); ?>
        <form action="updateFA.php" method="post">
            <input type="submit" value="Update Grades" name="updateGrade">
        </form>
        <button onclick="window.location='generate.php'">Generate OBE Course Assessment</button>
    </div>
</body>
</html>