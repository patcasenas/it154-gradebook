<?php
    require_once("../php/dbConfig.php");
    include("../php/navbar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create new course</title>
</head>
<body>
    <h1>Create new course</h1>
    <form method="post">
        <fieldset>
        <legend>Course Info</legend>
            <label for="courseCode">Course Code <input type="text" name="courseCode" placeholder="Course Code" required></label><br><br>
            <label for="courseTitle">Course Title <input type="text" name="courseTitle" placeholder="Course Title" required></label><br><br>
        </fieldset><br>

        <fieldset>
        <legend>Module Info</legend>
            <label for="modNum1">Module 1<input type="number" name="modNum1" value="1" hidden></label>
            <input type="text" name="modName1" placeholder="Module 1 Name" required></label><br><br>
            <label for="modNum2">Module 2<input type="number" name="modNum2" value="2" hidden></label>
            <input type="text" name="modName2" placeholder="Module 2 Name"><br><br>
            <label for="modNum3">Module 3<input type="number" name="modNum3" value="3" hidden></label>
            <input type="text" name="modName3" placeholder="Module 3 Name"><br><br>
        </fieldset><br>
        <button onClick="window.location.href='index.php'">Cancel</button>
        <input type="submit" value="Save" name="submit">
    </form>
</body>
</html>
<?php
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