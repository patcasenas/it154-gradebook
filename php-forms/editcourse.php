<?php
    include("../php/navbar.php");
    include("../php/dbConfig.php");
    include("../php/session_start.php");

    $courseCode = implode($_SESSION['courseTitle']);
    $editCourse = $db->query("SELECT * FROM courseinfo WHERE courseCode = '".$courseCode."'");
    $editModule = $db->query("SELECT * FROM moduleinfo WHERE courseCode = '".$courseCode."'");
    $row = $editCourse->fetch_assoc();
    $count=mysqli_num_rows($editModule);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Course Info</title>
</head>
<body>
    <form method="post">
        <fieldset><br>
        <legend>Edit Course Info</legend>
            <label for="courseCodeEdit">Course Code: <input type="text" name="courseCodeEdit" value="<?php echo $courseCode ?>"></label><br><br>
            <label for="courseTitle">Course Title: <input type="text" name="courseTitle" value="<?php echo $row['courseTitle']?>"></label><br><br>
        </fieldset><br>
        <fieldset><br>
        <legend>Edit Module Info</legend>
        <?php while($row = $editModule->fetch_assoc()) {?>
            <label for="modNum">Module <?php echo $row['modNum']?>: <input type="hidden" name="modID[]" value="<?php echo $row['modID']?>"></label>
            <input type="text" name="modName[]" value="<?php echo $row['modName']?>"><br><br>
        <?php }?>
        </fieldset><br>
        <button onclick="window.history.go(-2); return false;">Cancel</button>
        <input type="submit" value="Save Changes" name="submit">
    </form>
</body>
</html>
<?php
    if(isset($_POST['submit'])) {
        $courseCodeEdit = $_POST['courseCodeEdit'];
        $courseTitle = $_POST['courseTitle'];
        $updateCourse = $db->query("UPDATE courseinfo SET courseCode = '".$courseCodeEdit."', courseTitle = '".$courseTitle."'");

        foreach($_POST['modID'] as $key => $modID) {
            $id = $modID;
            $modName = $_POST['modName'][$key];
            echo $modName;
            $sql = "UPDATE moduleinfo SET modName = '".$modName."' WHERE modID = '".$modID."'";
            $update = mysqli_query($db,$sql);
        }
        echo "<script>alert('Successfully edited course and module info.');</script>";
        echo "<script>javascript:history.go(-3);</script>";
    }
?>