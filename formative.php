<?php
    require("php/dbConfig.php");
    require_once("php/session_start.php");
    include("php/navbar.php");
    // include("php-process/computeGrade.php");
    $modNum = $_GET['modNum'];
    $courseCode = $_SESSION['courseCode'];
    $modName = $db->query("SELECT modName FROM moduleinfo WHERE modNum = '".$modNum."' AND courseCode = '".$courseCode."'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $courseCode . " Module " . $modNum . " Formative Assessment" ?></title>
</head>
<body>
    <div class="container" id="container">
        <?php $row = $modName->fetch_assoc();?>
        <span class="title"><?php echo "Module " . $modNum . " - " . $row['modName'];?></span>
        <div class="btn-section">
            <?php echo '<button id="updateGrade" class="sh rad" onclick="window.location.href = \'updateFA.php?modNum=' . $modNum . '\'")">Update Grades</button>';?>
            <span class="dropdown">
                <button class="dropbtn"><i class="fa-solid fa-gear" style="color: #121212;"></i></button>
                <div class="dropdown-content">
                    <button onclick="onMax()">Assign Max Scores</button>
                    <button onclick="onSet()">Set Amount of Assessments</button>
                </div>
            </span>
        </div>
        <?php include("php-process/filter-fa.php"); ?>
    </div>
    <?php
        include("php-forms/maxscore.php");
        include("php-forms/assessmentAmt.php");
    ?>
    <script>
        function redirectToPage(modNum, targetPage) {
            // Construct the URL with the modNum parameter
            var pageUrl = targetPage + "?modNum=" + modNum;
            // Redirect to the generated URL
            window.location.href = pageUrl;
        }
    </script>
</body>
</html>
<?php mysqli_close($db)?>