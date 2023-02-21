<?php
    include_once "php/dbConfig.php";
    include "php/navbar.php";
    $id = $_GET['id'];

    $result = mysqli_query($db, "SELECT * FROM studentinfo WHERE id=$id");

    while($res = mysqli_fetch_array($result)) {
        $lastName = $res['lastName'];
        $firstName = $res['firstName'];
        $studProg = $res['studProg'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Student Details</title>
</head>
<body>
    <form name="update-action" action="update-action.php" method="post">
        <table>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="lastName" value="<?php echo $lastName;?>" class=""></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="firstName" value="<?php echo $firstName;?>" class=""></td>
            </tr>
            <tr>
                <td>Program</td>
                <td><input type="text" name="studProg" value="<?php echo $studProg;?>" class=""></td>
            </tr>
            <tr>
                <td><input type="hidden" value="<?php echo $_GET['id']?>" name="id"></td>
                <td><input type="submit" value="Update" name="update"></td>
            </tr>
        </table>
    </form>
</body>
</html></HTMl>