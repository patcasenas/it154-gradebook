<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require("php/session_start.php");
        require_once("php/dbConfig.php");
        include("php/navbar.php");
    ?>
</head>

<body>
    <div class="container">
        <!-- Module Name -->
        <?php 
            $modTitle = $db->query ("SELECT modName FROM moduleinfo WHERE modID = '3'");
            $row = $modTitle->fetch_assoc();
        ?>
        <h1><?php echo "Module 3 - " . $row["modName"];?></h1>

        <!-- Section Filter & Update Grades button -->
        <?php include("php/filter-mod3.php"); ?>
        <form action="updateSA-mod3.php" method="post">
            <input type="submit" value="Update Grades" name="updateGrade">
        </form>

        <!-- Query for table display -->
        </tbody>
        </table>
    </div>
</body>

</html>