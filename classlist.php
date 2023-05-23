<?php
session_start();
require_once("php/dbConfig.php");
if(isset($_POST['submit'])) {
    $_SESSION['courseTitle'] = $_POST['courseTitle'] ;
}
if(isset($_SESSION['courseTitle'])) {
    // Displays course title
    $courseCode = implode($_SESSION['courseTitle']);
    include("php/navbar.php");
    // If user does not choose course, show this
    if ($courseCode == 0) {
        echo "<script>alert('Select an option from the dropdown')</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        // Displays if import is successful or not
        if(!empty($_GET['status'])){
            switch($_GET['status']){
                case 'succ':
                    $statusType = 'Success';
                    $statusMsg = 'Student data has been imported successfully.';
                    break;
                case 'err':
                    $statusType = 'Error';
                    $statusMsg = 'A problem has occurred, please try again.';
                    break;
                case 'invalid_file':
                    $statusType = 'Error';
                    $statusMsg = 'Please upload a valid CSV file.';
                    break;
                default:
                    $statusType = '';
                    $statusMsg = '';
            }
        }
        // Deletes students from table
        if(isset($_POST['truncate'])) {
            $query = "DELETE FROM studentinfo WHERE courseCode = '".$courseCode."'";
            if (mysqli_multi_query($db, $query)) {
              echo '<script>alert("Students have been successfully removed!")</script>';
            } else {
              echo "Error! " . mysqli_error($db);
            }
        }?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Import Class List</title>
</head>

<body>
    <div class="container" id="container">
        <span class="title">Class List</span>
        <?php if(!empty($statusMsg)) {
            echo "<script>alert('$statusType! $statusMsg');</script>";
        }?>
        <!-- Deletes students from table -->
        <div class="delete-list" id="delete-list">
            <button onclick="on()" id="edit-btn" class="rad">Edit Course Info</button>
            <form method="post" onsubmit="return confirm('Danger! This action removes all students from this course.')">
                <input type="submit" value="Empty Class List" name="truncate">
            </form>
        </div>
        <table class="students-table" id="students-table">
            <thead>
                <tr>
                    <th width=20%>Program</th>
                    <th>Student Name</th>
                    <th width=20%>Student Number</th>
                    <th width=10%>Section</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Display rows
                    $result = $db->query("SELECT * FROM studentinfo WHERE courseCode = '".$courseCode."' ORDER BY section ASC");

                    if($result != false && $result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                    ?>
                <tr>
                    <td><?php echo $row['studProg']; ?></td>
                    <td><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                    <td><?php echo $row['studNum']; ?></td>
                    <td><?php echo $row['section']; ?></td>
                </tr>
                <?php } }else{ ?>
                <tr>
                    <td colspan="4">No member(s) found...</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <span class="bottom-cont"><button class="bottom" onclick="document.getElementById('upload-list').scrollIntoView();"><i class="fa-solid fa-chevron-down"></i></button></span>
    <!-- Import link -->
    <div class="upload-list" id="upload-list">
        <form action="php-process/importStud.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <button type="submit" name="importSubmit" class="import-btn sh rad"><span class="material-symbols-rounded">cloud_upload</span>&emsp;IMPORT</button>
        </div>
        </form>
    </div>
        <?php }
}
    $editCourse = $db->query("SELECT * FROM courseinfo WHERE courseCode = '".$courseCode."'");
    $editModule = $db->query("SELECT * FROM moduleinfo WHERE courseCode = '".$courseCode."'");
    $row = $editCourse->fetch_assoc();
    $count=mysqli_num_rows($editModule);
?>
        <div id="overlay">
            <div id="editcourse-form">
                <div id="close-btn" onclick="off()">&times;</div>
                <form method="post">
                    <h2>Edit Course and Module Info</h2>
                    <fieldset><br>
                        <legend>Edit Course Info</legend>
                        <label for="courseCodeEdit">Course Code: <input type="text" name="courseCodeEdit"
                                value="<?php echo $courseCode ?>"></label><br><br>
                        <label for="courseTitle">Course Title: <input type="text" name="courseTitle"
                                value="<?php echo $row['courseTitle']?>"></label><br><br>
                    </fieldset><br>
                    <fieldset><br>
                        <legend>Edit Module Info</legend>
                        <?php while($row = $editModule->fetch_assoc()) {?>
                        <label for="modNum">Module <?php echo $row['modNum']?>: <input type="hidden" name="modID[]"
                                value="<?php echo $row['modID']?>"></label>
                        <input type="text" name="modName[]" value="<?php echo $row['modName']?>"><br><br>
                        <?php }?>
                    </fieldset><br>
                    <div class="index-form-btns">
                    <button onclick="off()" id="cancel-btn">Cancel</button>
                    <input type="submit" value="Save" name="submit">
                    </div>
                </form>
            </div>
        </div>
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