<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        session_id("2");
        require("php/session_start.php");
        require_once("php/dbConfig.php");
        include("php/navbar.php");
        include("phpcompute/computeSA.php");
        // $data = implode($_SESSION['filter']);
    ?>
</head>

<body>
    <div class="container">
        <!-- Module Name -->
        <?php 
            $modTitle = $db->query ("SELECT modName FROM moduleinfo WHERE modID = '2'");
            $row = $modTitle->fetch_assoc();
        ?>
        <h1><?php echo "Module 2 - " . $row["modName"];?></h1>
        <div class="btn">
        <button onclick="window.location='fa-mod2.php'">Formative Assessment</button>
        <button onclick="window.location='sa-maxscore.php'">Set Maximum Score</button>
        <button onclick="window.location='tableamt.php'">Set Amount of FA and SA</button>
        </div>
        
        <!-- Section Filter & Update Grades button -->
        <?php 
            include("php/filter-sa.php"); 
        ?>
        <form action="updateSA.php" method="post">
            <input type="submit" value="Update Grades" name="updateGrade">
        </form>
    </div>
</body>
</html>