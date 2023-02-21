<?php
include_once 'php/dbConfig.php';
// Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Student data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'A problem has occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}?>

<!DOCTYPE html>
<html>

<head>
    <?php include "php/navbar.php";  ?>
    <title>View Students</title>
</head>

<body>
    <!-- Display status message -->
    <?php if(!empty($statusMsg)){
        echo "$statusType: ";
        echo $statusMsg;
    } ?><br>

    <div class="container">
        <table class="students-table">
            <thead>
                <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Student Number</th>
                    <th>Program</th>
                    <th>Update Details</th>
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
                </tr>
                <?php } }else{ ?>
                <tr>
                    <td colspan="5">No member(s) found...</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Import link -->
    <div class="import-btn-cont">
        <form action="php/importData.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" class="import-btn" name="importSubmit" value="IMPORT">
        </form>
    </div>
    </div>
</body>

</html>