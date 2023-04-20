<?php
    require_once("../php/dbConfig.php");

    if(isset($_POST['submit'])) {
        $courseCode = $_POST['courseCode'];
        $courseTitle = $_POST['courseTitle'];
        $insertCourse = $db->query("INSERT INTO courseinfo (courseCode, courseTitle) VALUES ('".$courseCode."', '".$courseTitle."')");

        $modNum1 = $_POST['modNum1'];
        $modName1 = $_POST['modName1'];
        $insert1 = "INSERT INTO moduleinfo (modNum, modName, courseCode) VALUES ($modNum1, '".$modName1."', '".$courseCode."')";
        mysqli_query($db,$insert1);

        $modNum2 = $_POST['modNum2'];
        $modName2 = $_POST['modName2'];
        $insert2 = "INSERT INTO moduleinfo (modNum, modName, courseCode) VALUES ($modNum2, '".$modName2."', '".$courseCode."')";
        mysqli_query($db,$insert2);

        $modNum3 = $_POST['modNum3'];
        $modName3 = $_POST['modName3'];
        $insert3 = "INSERT INTO moduleinfo (modNum, modName, courseCode) VALUES ($modNum3, '".$modName3."', '".$courseCode."')";
        mysqli_query($db,$insert3);

        // Insert max score for each module and course
        $maxscore1 = "INSERT INTO maxscore (modNum, courseCode) VALUES (1, '".$courseCode."')";
        mysqli_query($db,$maxscore1);
        $maxscore2 = "INSERT INTO maxscore (modNum, courseCode) VALUES (2, '".$courseCode."')";
        mysqli_query($db,$maxscore2);
        $maxscore3 = "INSERT INTO maxscore (modNum, courseCode) VALUES (3, '".$courseCode."')";
        mysqli_query($db,$maxscore3);

        // Insert amount of assessments per course
        $tblamt1 = "INSERT INTO tblamt (modNum, courseCode) VALUES (1, '".$courseCode."')";
        mysqli_query($db,$tblamt1);
        $tblamt2 = "INSERT INTO tblamt (modNum, courseCode) VALUES (2, '".$courseCode."')";
        mysqli_query($db,$tblamt2);
        $tblamt3 = "INSERT INTO tblamt (modNum, courseCode) VALUES (3, '".$courseCode."')";
        mysqli_query($db,$tblamt3);

        if(!$insert1 || !$insert2 || !$insert3) {
            mysqli_error($db);
        } else {
            echo "<script>alert('Successfully created course. You will be redirected to the homepage.')</script>";
            echo "<script>window.location.href='../index.php'</script>";
        }        
    }
?>