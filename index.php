<?php
    include("php/head.php");
    require("php/dbConfig.php");
    require_once("php/session_start.php");
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
<html>
<head>
    <title>SOIT iGradebook</title>
</head>
<body class="index">
<?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the course code from the form
        $courseCode = implode($_POST['courseCode']);
        $_SESSION['courseCode'] = $courseCode;
        // Generate the URL with the course code
        $url = 'classlist.php?courseCode=' . urlencode($courseCode);

        // Redirect to the generated URL
        header('Location: ' . $url);
        exit;
    }
?>
    <div class="index-cont">
    <div class="index-logo">
        <img src="img/soit-logo.png" alt="SOIT logo" id="soitlogo">
        <img src="img/soit-white@1x.png" alt="School of Information Technology" id="soit">
        <img src="img/igrade-white@1x.png" alt="SOIT iGradebook" id="igradebook">
    </div>
        <div class="index-box">
        <form method="POST" action="">
            <h1 class="index-text">Select a course to continue</h1>
            <div class="select-cont">
                <div class="select">
                    <select name="courseCode[]">
                        <option value="0" selected="selected" hidden>Select Course</option>
                        <?php
                            foreach($coursetitles as $key => $value) {
                                echo '<option value='.$coursetitles[$key]['courseCode'].'>'
                                .$coursetitles[$key]['courseCode']. " - " .$coursetitles[$key]['courseTitle']. '</option>';
                            }?>
                    </select>
                </div>
            <button type="submit" id="index-submit">Login</button>
        </form>
            <p>Can't find your course? <button type="button" onclick="on()" id="newcourse-btn" name="createCourse">Create a new course</button></p>
        </div>
        <div id="overlay">
            <div id="newcourse-form">
                <div id="close-btn" onclick="off()">&times;</div>
                <h1>Create a course</h1>
                <p>Let's setup your course</p>
                <form action="php-process/newcourse.php" method="post">
                    <fieldset>
                    <legend>Course Info</legend><br>
                        <label for="courseCode">Course Code <input type="text" name="courseCode" placeholder="Course Code" required></label><br><br>
                        <label for="courseTitle">Course Title <input type="text" name="courseTitle" placeholder="Course Title" required></label><br><br>
                    </fieldset><br>

                    <fieldset>
                    <legend>Module Info</legend><br>
                        <label for="modNum1">Module 1<input type="number" name="modNum1" value="1" hidden></label>
                        <input type="text" name="modName1" placeholder="Module Name" required></label><br><br>
                        <label for="modNum2">Module 2<input type="number" name="modNum2" value="2" hidden></label>
                        <input type="text" name="modName2" placeholder="Module Name"><br><br>
                        <label for="modNum3">Module 3<input type="number" name="modNum3" value="3" hidden></label>
                        <input type="text" name="modName3" placeholder="Module Name"><br><br>
                    </fieldset><br>
                    <div class="index-form-btns">
                        <button onClick="off()" id="cancel-btn">Cancel</button>
                        <!-- <input type="submit" value="Save" name="submit"> -->
                        <input type="submit" value="Save" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="orImport">
        <hr/><span>or</span><hr/>
    </div>
    <form action="php-process/uploadGrade.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" accept="csv">
        <button type="submit" id="importSG" class="sh rad"><span class="material-symbols-rounded">cloud_upload</span>&emsp;Upload Grades</button>
    </form>
    <script>
        function on() {
            document.getElementById("overlay").style.display = "block";
        }
        function off() {
            document.getElementById("overlay").style.display = "none";
        }
    </script>
</body>
</html>
