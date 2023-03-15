<?php
    require_once("php/session_start.php");
    require_once("php/dbConfig.php");
    include("php/navbar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Set Max Scores</title>
</head>
<body>
    <?php $modID = session_id();?>
    <div class="container">
    <form action="" method="post">
    <?php 
            $modTitle = $db->query ("SELECT modName FROM moduleinfo WHERE modID = $modID");
            $row = $modTitle->fetch_assoc();
        ?>
        <h1><?php echo "Module " . $modID . " - " . $row["modName"];?></h1>
        <label for="SA1max">SA 1 <input type="number" name="SA1max"></label><br>
        <label for="SA2max">SA 2 <input type="number" name="SA2max"></label><br>
        <label for="SA3max">SA 3 <input type="number" name="SA3max"></label><br>
        
        <input type="button" value="Cancel" onclick="history.go(-1)" />
        <input type="submit" value="Save" name="maxscore">
    </form>
</div>
</body>
</html>
<?php 
    if(isset($_POST['maxscore'])) {
        $SA1max = $_POST['SA1max'];
        $SA2max = $_POST['SA2max'];
        $SA3max = $_POST['SA3max'];

        $result = $db->query("UPDATE maxscore SET SA1max = $SA1max, SA2max = $SA2max, SA3max = $SA3max WHERE modID = $modID");
        if (!$result) {
            mysqli_error($db);
        } else {
            echo "<script>alert('Successfully set')</script>";
            echo "<script>javascript:history.go(-2);</script>";
        }
    }
    
?>