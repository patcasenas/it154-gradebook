<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        session_id("3");
        require("php/session_start.php");
        require_once("php/dbConfig.php");
        include("php-compute/computeSA.php");
        $courseCode = implode($_SESSION['courseTitle']);
        include("php/navbar.php");
        $modName = $db->query ("SELECT modName FROM moduleinfo WHERE modNum = '3' AND courseCode = '".$courseCode."'");
    ?>
</head>

<body>
    <head>
        <title>Summative Assessment</title>
    </head>
    <div class="container" id="container">
        <!-- Module Name -->
        <?php 
            $row = $modName->fetch_assoc();
        ?>
        <span class="title"><?php echo "Module 3 - " . $row['modName']?></span>
        <div class="btn">
        <button onclick="window.location='fa-mod3.php'">Formative Assessment</button>
        <button onclick="window.location='php-forms/maxscore.php'">Set Maximum Score</button>
        <button onclick="window.location='php-forms/assessmentAmt.php'">Set Amount of FA and SA</button>
        </div>
        
        <!-- Section Filter & Update Grades Button -->
        <?php 
            include("php-process/filter-sa.php");
        ?>
        <form action="php-forms/updateSA.php" method="post">
            <input type="submit" value="Update Grades" name="updateGrade">
        </form>
    </div>
</body>
</html>