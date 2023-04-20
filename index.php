<?php
    include("php/head.php");
    require("php/dbConfig.php");
    $sql = "SELECT * FROM courseinfo ORDER BY courseCode ASC";
    $result = mysqli_query($db,$sql);
    // echo $result or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($db), E_USER_ERROR);
    $coursetitles = array();
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)) {
            $coursetitles[] = $row;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Course</title>
</head>
<body class="index">
    <div class="index-cont">
    <div class="index-logo">
        <img src="img/soit-logo.png" alt="SOIT logo" id="soitlogo">
        <img src="img/soit-white@1x.png" alt="School of Information Technology" id="soit">
        <img src="img/igrade-white@1x.png" alt="SOIT iGradebook" id="igradebook">
    </div>
        <div class="index-box">
        <form action="classlist.php" method="post">
            <h1 class="index-text">Select a course to continue</h1>
            <div class="select-cont">
            <div class="select">
            <select name="courseTitle[]">
                <option value="0" selected="selected" hidden>Select Course Code</option>
                <?php
                    foreach($coursetitles as $key => $value) {
                        echo '<option value='.$coursetitles[$key]['courseCode'].'>'
                        .$coursetitles[$key]['courseCode']. " - " .$coursetitles[$key]['courseTitle']. '</option>';
                    }?>
            </select>
            </div>
            </div><br>
            <input type="submit" name="submit" value="Next" id="index-submit">
        </form>
        <p>Don't see your course? <a href="php-forms/newcourse.php">Create a new course</a></p>
        </div>
    </div>
</body>
</html>