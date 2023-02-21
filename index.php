<?php
// Get status message
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
if(isset($_POST['truncate'])) {
    $query = "TRUNCATE table studentinfo";

    if (mysqli_multi_query($db, $query)) {
      echo '<script>alert("Students have been successfully removed!")</script>';
    } else {
      echo "Error!" . mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <?php include "php/navbar.php";  ?>
    <title>View Students</title>
</head>

<body>
<div class="container">
    <!-- Display status message -->
    <span id="alert">
    <?php if(!empty($statusMsg)){
        echo "<p style='font-weight:500;'>$statusType!&nbsp;</p>";
        echo $statusMsg;
    } ?><br></span>

        <table class="students-table">
            <thead>
                <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Student Number</th>
                    <th>Program</th>
                    <th>Section</th>
                </tr>
            </thead>
            <tbody>
                <?php
            // Display rows
            $result = $db->query("SELECT * FROM studentinfo ORDER BY lastName ASC");

            if($result != false && $result->num_rows > 0){
                while($row = $result->fetch_assoc()){
            ?>
                <tr>
                    <td><?php echo $row['lastName']; ?></td>
                    <td><?php echo $row['firstName']; ?></td>
                    <td><?php echo $row['studNum']; ?></td>
                    <td><?php echo $row['studProg']; ?></td>
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
        <form action="php/importStud.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" class="import-btn" name="importSubmit" value="IMPORT">
        </form>
        <form method="post" onsubmit="return confirm('Danger! This action removes all students from the database.')">
            <input type="submit" value="Delete students" name="truncate">
        </form>
    </div>
    </div>
</body>

</html>