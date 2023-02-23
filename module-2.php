<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require_once("php/dbConfig.php");
        include("php/navbar.php");
    ?>
</head>

<body>
    <div class="container">
        <!-- Module Name -->
        <?php 
            $modTitle = $db->query ("SELECT modName FROM moduleinfo WHERE modID = '2'");
            $row = $modTitle->fetch_assoc();
        ?>
        <h1><?php echo "Module 2 - " . $row["modName"];?></h1>

        <!-- Update Grades button -->
        <form action="updateGrade.php" method="post">
            <input type="submit" value="Update Grades" name="updateGrade">
        </form>

        <!-- Query for table display -->
        <?php
        $result = $db->query ("SELECT s.studNum, s.SA1, s.SA2, s.SA3, s.SAavg, si.lastName, si.firstName, si.studProg 
        FROM summative AS s 
        LEFT JOIN studentinfo AS si ON s.studNum = si.studNum
        WHERE modID = '2'
        ORDER BY si.lastName ASC");

        include("php/studentData.php");?>
    </div>
</body>

</html>