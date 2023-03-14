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
            $modTitle = $db->query ("SELECT modName FROM moduleinfo WHERE modID = '1'");
            $row = $modTitle->fetch_assoc();
        ?>
        <h1><?php echo "Module 1 - " . $row["modName"];?></h1>
        <input type="button" value="Formative Assessment" onclick="window.location='fa-mod1.php'">

        
        <!-- Section Filter & Update Grades Button -->
        <?php include("php/filter-mod1.php"); ?>
        <form action="updateSA-mod1.php" method="post">
            <input type="submit" value="Update Grades" name="updateGrade">
        </form>

        </tbody>
        </table>
    </div>
</body>
</html>