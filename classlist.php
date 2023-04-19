<?php
session_start();
require_once("php/dbConfig.php");
include("php/navbar.php");
if(isset($_POST['submit'])) {
    $_SESSION['courseTitle'] = $_POST['courseTitle'] ;
}
if(isset($_SESSION['courseTitle'])) {
    // Displays course title
    $courseCode = implode($_SESSION['courseTitle']);
    $title = $db->query("SELECT courseTitle FROM courseinfo WHERE courseCode = '".$courseCode."'");
    $row = mysqli_fetch_assoc($title);
    echo "<h1>" . $row['courseTitle'] . "</h1>\n";

    // If user does not choose course, show this
    if ($courseCode == 0) {
        echo "<script>alert('Select an option from the dropdown')</script>";
        echo "<script>javascript:history.go(-1);</script>";
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
            <?php if(!empty($statusMsg)) {
                echo "<script>alert('$statusType! $statusMsg');</script>";
            }?>
            Found a mistake? <a href="php-forms/editcourse.php">Edit the course</a>
            <table>
                <thead>
                    <tr>
                        <th>Program</th>
                        <th>Student Name</th>
                        <th>Student Number</th>
                        <th>Section</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                // Display rows
                $result = $db->query("SELECT * FROM studentinfo WHERE courseCode = '".$courseCode."' ORDER BY lastName ASC");

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
                        <td colspan="5">No member(s) found...</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- Import link -->
            <div class="import-btn-cont">
                <form action="php-process/importStud.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="file" />
                    <input type="submit" class="import-btn" name="importSubmit" value="IMPORT">
                </form><br>
                <!-- Deletes students from table -->
                <form method="post"
                    onsubmit="return confirm('Danger! This action removes all students from the database.')">
                    <input type="submit" value="Delete students" name="truncate">
                </form>            </table>
        </body>
        </html>
    <?php }
}