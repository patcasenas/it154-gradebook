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
    <title>Summative Assessment</title>
</head>

<body>
    <div class="container" id="container">
        <!-- Module Name -->
        <?php $row = $modName->fetch_assoc(); ?>
        <span class="title"><?php echo "Module 1 - " . $row['modName']?></span>
        <div class="btn-section">
            <button onclick="window.location='fa-mod1.php'" id="formative" class="sh rad">Switch to Formative Assessment</button>
            <form action="php-forms/updateSA.php" method="post">
                <input type="submit" value="Update Grades" name="updateGrade" id="updateGrade" class="sh rad">
            </form>
            <span class="dropdown">
                <button class="dropbtn"><i class="fa-solid fa-gear" style="color: #121212;"></i></button>
                <div class="dropdown-content">
                    <button onclick="onMax()">Assign Max Scores</button>
                    <button onclick="onSet()">Set Amount of Assessments</button>
                </div>
            </span>
        </div>
        <!-- Section Filter & Update Grades Button -->
        <?php include("php-process/filter-sa.php"); ?>
    </div>
        <?php
            include("php-forms/maxscore.php");
            include("php-forms/assessmentAmt.php");
        ?>
</body>
</html>