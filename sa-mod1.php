<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        session_id("1");
        require("php/session_start.php");
        require_once("php/dbConfig.php");
        include("php-compute/computeSA.php");
        $courseCode = implode($_SESSION['courseTitle']);
        include("php/navbar.php");
        $modName = $db->query ("SELECT modName FROM moduleinfo WHERE modNum = '1' AND courseCode = '".$courseCode."'");
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
        <span class="title"><?php echo "Module 1 - " . $row['modName']?></span>
        <div class="btn-section">
            <button onclick="window.location='fa-mod1.php'" id="formative">Formative Assessment</button>
            <form action="php-forms/updateSA.php" method="post">
            <input type="submit" value="Update Grades" name="updateGrade" id="updateGrade">
            </form>
            <span class="dropdown">
                <button class="dropbtn"><span class="material-symbols-outlined dropbtn">settings</span></button>
                <div class="dropdown-content">
                    <a href="php-forms/maxscore.php">Assign Max Scores</a>
                    <a href="php-forms/assessmentAmt.php">Set Amount of Assessments</a>
                </div>
            </span>
        </div>
        <!-- Section Filter & Update Grades Button -->
        <?php 
            include("php-process/filter-sa.php");
        ?>
    </div>
</body>
</html>