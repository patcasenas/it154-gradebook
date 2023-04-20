<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        session_id("3");
        require("php/session_start.php");
        require_once("php/dbConfig.php");
        include("php/navbar.php");
        // include("phpcompute/computeSA.php");
    ?>
</head>

<body>
    <div class="container">
        <!-- Module Name -->
        <?php 
            $courseCode = implode($_SESSION['courseTitle']);
            $modName = $db->query ("SELECT modName FROM moduleinfo WHERE modNum = '3' AND courseCode = '".$courseCode."'");
            $row = $modName->fetch_assoc();
        ?>
        <h1><?php echo $courseCode . " Module 3 - " . $row['modName']?></h1>
        <div class="btn">
        <button onclick="window.location='fa-mod3.php'">Formative Assessment</button>
        <button onclick="window.location='sa-maxscore.php'">Set Maximum Score</button>
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