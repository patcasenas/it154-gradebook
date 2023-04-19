<?php
    include("php/navbar.php");
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
<body>
    <form action="classlist.php" method="post">
        <h1>Select a course to continue</h1>
        <select name="courseTitle[]">
            <option value="0" selected="selected" hidden>Select Course Code</option>
            <?php
                foreach($coursetitles as $key => $value) {
                    echo '<option value='.$coursetitles[$key]['courseCode'].'>'
                    .$coursetitles[$key]['courseCode']. " - " .$coursetitles[$key]['courseTitle']. '</option>';
                }?>
        </select>
        <input type="submit" name="submit" value="Next">
    </form>
    Don't see your course? <a href="php-forms/newcourse.php">Create a new course</a>
</body>
</html>