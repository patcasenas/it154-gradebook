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
        $tblamt = $db->query("SELECT * FROM tblamt WHERE modID = $modID");
        $row = $modTitle->fetch_assoc();
        $rows = $tblamt->fetch_assoc();
        $SAamt = $rows['SAamt'];
    ?>
        <h1><?php echo "Module " . $modID . " - " . $row["modName"];?></h1>

        <!-- Outputs form accdg to amt of SA -->
        <?php if($SAamt == 3) { ?>
            <label for="SA1max">SA 1 <input type="number" name="SA1max" min="1"></label><br>
            <label for="SA2max">SA 2 <input type="number" name="SA2max" min="1"></label><br>
            <label for="SA3max">SA 3 <input type="number" name="SA3max" min="1"></label><br>
            
            <input type="button" value="Cancel" onclick="history.go(-1)" />
            <input type="submit" value="Save" name="maxscore">
        <?php } else if($SAamt == 2) { ?>
            <label for="SA1max">SA 1 <input type="number" name="SA1max" min="1"></label><br>
            <label for="SA2max">SA 2 <input type="number" name="SA2max" min="1"></label><br>
            
            <input type="button" value="Cancel" onclick="history.go(-1)" />
            <input type="submit" value="Save" name="maxscore">
        <?php } else if($SAamt == 1) { ?>
            <label for="SA1max">SA 1 <input type="number" name="SA1max" min="1"></label><br>
            
            <input type="button" value="Cancel" onclick="history.go(-1)" />
            <input type="submit" value="Save" name="maxscore">
        <?php } ?>
    </form>
</div>
</body>
</html>
<?php 
    if(isset($_POST['maxscore'])) {
        $SA1max = $_POST['SA1max'];
        $SA2max = $_POST['SA2max'];
        $SA3max = $_POST['SA3max'];

        // Update grades to database
        if ($SAamt == 3) {
            $result = $db->query("UPDATE maxscore SET SA1max = $SA1max, SA2max = $SA2max, SA3max = $SA3max WHERE modID = $modID");
        } else if ($SAamt == 2) {
            $result = $db->query("UPDATE maxscore SET SA1max = $SA1max, SA2max = $SA2max WHERE modID = $modID");
        } else if ($SAamt == 1) {
            $result = $db->query("UPDATE maxscore SET SA1max = $SA1max WHERE modID = $modID");
        }

        if (!$result) {
            mysqli_error($db);
        } else {
            echo "<script>alert('Successfully set')</script>";
            echo "<script>javascript:history.go(-2);</script>";
        }
    }
    
?>