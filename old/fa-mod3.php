<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        session_id("3");
        require("php/session_start.php");
        require_once("php/dbConfig.php");
        include("php/navbar.php");
        include("phpcompute/computeFA.php");
        $data = implode($_SESSION['filter']);
    ?>
</head>

<body>
    <div class="container">
        <!-- Module Name -->
        <?php 
            $modTitle = $db->query ("SELECT modName FROM moduleinfo WHERE modID = '3'");
            $row = $modTitle->fetch_assoc();
        ?>
        <h1><?php echo "Module 3 - " . $row["modName"];?></h1>
        <div class="btn">
        <button onclick="window.location='sa-mod3.php'">Summative Assessment</button>
        <button onclick="window.location='fa-maxscore.php'">Set Maximum Score</button>
        <button onclick="window.location='tableamt.php'">Set Amount of FA and SA</button>
        </div>

        <!-- Section Filter & Update Grades Button -->
        <?php 
            include("php/filter-fa.php"); 
            
            if($data != "0") { ?>?>
            <form action="updateFA.php" method="post">
                <input type="submit" value="Update Grades" name="updateGrade">
            </form>
        <?php }?>
    </div>
</body>
</html>