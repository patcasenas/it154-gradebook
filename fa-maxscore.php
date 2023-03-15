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
        <label for="FA1max">FA 1<input type="number" name="FA1max"></label><br>
        <label for="FA2max">FA 2<input type="number" name="FA2max"></label><br>
        <label for="FA3max">FA 3<input type="number" name="FA3max"></label><br>
        <label for="FA4max">FA 4<input type="number" name="FA4max"></label><br>
        <label for="FA5max">FA 5<input type="number" name="FA5max"></label><br>
        <label for="FA6max">FA 6<input type="number" name="FA6max"></label><br>
        <label for="FA7max">FA 7<input type="number" name="FA7max"></label><br>
        <label for="FA8max">FA 8<input type="number" name="FA8max"></label><br>
        <label for="FA9max">FA 9<input type="number" name="FA9max"></label><br>
        <label for="FA10max">FA 10 <input type="number" name="FA10max"></label><br>

        <input type="button" value="Cancel" onclick="history.go(-1)" />
        <input type="submit" value="Save" name="maxscore">
        </form>
    </div>
</body>
</html>
<?php
    if(isset($_POST['maxscore'])) {
        $FA1max = $_POST['FA1max'];
        $FA2max = $_POST['FA2max'];
        $FA3max = $_POST['FA3max'];
        $FA4max = $_POST['FA4max'];
        $FA5max = $_POST['FA5max'];
        $FA6max = $_POST['FA6max'];
        $FA7max = $_POST['FA7max'];
        $FA8max = $_POST['FA8max'];
        $FA9max = $_POST['FA9max'];
        $FA10max = $_POST['FA10max'];

        $result = $db->query("UPDATE maxscore SET FA1max = $FA1max, FA2max = $FA2max, FA3max = $FA3max, FA4max = $FA4max, FA5max = $FA5max, FA6max = $FA6max, FA7max = $FA7max, FA8max = $FA8max, FA9max = $FA9max, FA10max = $FA10max WHERE modID = $modID");
        if(!$result) {
            mysqli_error($db);
        } else {
            echo "<script>alert('Successfully set')</script>";
            echo "<script>javascript:history.go(-2);</script>";
        }
    }
?>