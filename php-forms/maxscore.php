<?php
    require("../php/dbConfig.php");
    include("../php/navbar.php");
    require_once("../php/session_start.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Set Maximum Scores</title>
</head>
<body>
    <?php $modNum = session_id();?>
        <?php
            $courseCode = implode($_SESSION['courseTitle']);
            $modTitle = $db->query("SELECT modName FROM moduleinfo WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
            $tblamt = $db->query("SELECT * FROM tblamt WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
            $row = $modTitle->fetch_assoc();
            $rows = $tblamt->fetch_assoc();
            $SAamt = $rows['SAamt'];
            $FAamt = $rows['FAamt'];
        ?>
    <h1><?php echo $courseCode . " Module " . $modNum . " - " . $row['modName']?></h1>
    <form action="../php-process/maxscore.php" method="post">
        <!-- Summative Assessment max score -->
        <fieldset>
        <legend>Summative Assessment</legend>
        <?php if($SAamt == 3) { ?>
            <label for="SA1max">SA 1 <input type="number" name="SA1max" min="1"></label><br>
            <label for="SA2max">SA 2 <input type="number" name="SA2max" min="1"></label><br>
            <label for="SA3max">SA 3 <input type="number" name="SA3max" min="1"></label><br>
            
            <input type="button" value="Cancel" onclick="history.go(-1)" />
            <input type="submit" value="Save" name="maxscore">
        <?php } else if($SAamt == 2) { ?>
            <label for="SA1max">SA 1 <input type="number" name="SA1max" min="1"></label><br>
            <label for="SA2max">SA 2 <input type="number" name="SA2max" min="1"></label><br>
        <?php } else if($SAamt == 1) { ?>
            <label for="SA1max">SA 1 <input type="number" name="SA1max" min="1"></label><br>
        <?php } ?>
        </fieldset><br>

        <!-- Formative Assessment max score -->
        <fieldset>
        <legend>Formative Assessment</legend>
        <?php if ($FAamt == 10) {?>
            <label for="FA1max">FA 1 <input type="number" name="FA1max" min="1"></label><br>
            <label for="FA2max">FA 2 <input type="number" name="FA2max" min="1"></label><br>
            <label for="FA3max">FA 3 <input type="number" name="FA3max" min="1"></label><br>
            <label for="FA4max">FA 4 <input type="number" name="FA4max" min="1"></label><br>
            <label for="FA5max">FA 5 <input type="number" name="FA5max" min="1"></label><br>
            <label for="FA6max">FA 6 <input type="number" name="FA6max" min="1"></label><br>
            <label for="FA7max">FA 7 <input type="number" name="FA7max" min="1"></label><br>
            <label for="FA8max">FA 8 <input type="number" name="FA8max" min="1"></label><br>
            <label for="FA9max">FA 9 <input type="number" name="FA9max" min="1"></label><br>
            <label for="FA10max">FA 10 <input type="number" name="FA10max" min="1"></label><br>
        <?php } else if ($FAamt == 9) {?>
            <label for="FA1max">FA 1 <input type="number" name="FA1max" min="1"></label><br>
            <label for="FA2max">FA 2 <input type="number" name="FA2max" min="1"></label><br>
            <label for="FA3max">FA 3 <input type="number" name="FA3max" min="1"></label><br>
            <label for="FA4max">FA 4 <input type="number" name="FA4max" min="1"></label><br>
            <label for="FA5max">FA 5 <input type="number" name="FA5max" min="1"></label><br>
            <label for="FA6max">FA 6 <input type="number" name="FA6max" min="1"></label><br>
            <label for="FA7max">FA 7 <input type="number" name="FA7max" min="1"></label><br>
            <label for="FA8max">FA 8 <input type="number" name="FA8max" min="1"></label><br>
            <label for="FA9max">FA 9 <input type="number" name="FA9max" min="1"></label><br>
        <?php } else if ($FAamt == 8) {?>
            <label for="FA1max">FA 1 <input type="number" name="FA1max" min="1"></label><br>
            <label for="FA2max">FA 2 <input type="number" name="FA2max" min="1"></label><br>
            <label for="FA3max">FA 3 <input type="number" name="FA3max" min="1"></label><br>
            <label for="FA4max">FA 4 <input type="number" name="FA4max" min="1"></label><br>
            <label for="FA5max">FA 5 <input type="number" name="FA5max" min="1"></label><br>
            <label for="FA6max">FA 6 <input type="number" name="FA6max" min="1"></label><br>
            <label for="FA7max">FA 7 <input type="number" name="FA7max" min="1"></label><br>
            <label for="FA8max">FA 8 <input type="number" name="FA8max" min="1"></label><br>
        <?php } else if ($FAamt == 7) {?>
            <label for="FA1max">FA 1 <input type="number" name="FA1max" min="1"></label><br>
            <label for="FA2max">FA 2 <input type="number" name="FA2max" min="1"></label><br>
            <label for="FA3max">FA 3 <input type="number" name="FA3max" min="1"></label><br>
            <label for="FA4max">FA 4 <input type="number" name="FA4max" min="1"></label><br>
            <label for="FA5max">FA 5 <input type="number" name="FA5max" min="1"></label><br>
            <label for="FA6max">FA 6 <input type="number" name="FA6max" min="1"></label><br>
            <label for="FA7max">FA 7 <input type="number" name="FA7max" min="1"></label><br>
        <?php } else if ($FAamt == 6) {?>
            <label for="FA1max">FA 1 <input type="number" name="FA1max" min="1"></label><br>
            <label for="FA2max">FA 2 <input type="number" name="FA2max" min="1"></label><br>
            <label for="FA3max">FA 3 <input type="number" name="FA3max" min="1"></label><br>
            <label for="FA4max">FA 4 <input type="number" name="FA4max" min="1"></label><br>
            <label for="FA5max">FA 5 <input type="number" name="FA5max" min="1"></label><br>
            <label for="FA6max">FA 6 <input type="number" name="FA6max" min="1"></label><br>
        <?php } else if ($FAamt == 5) {?>
            <label for="FA1max">FA 1 <input type="number" name="FA1max" min="1"></label><br>
            <label for="FA2max">FA 2 <input type="number" name="FA2max" min="1"></label><br>
            <label for="FA3max">FA 3 <input type="number" name="FA3max" min="1"></label><br>
            <label for="FA4max">FA 4 <input type="number" name="FA4max" min="1"></label><br>
            <label for="FA5max">FA 5 <input type="number" name="FA5max" min="1"></label><br>
        <?php } else if ($FAamt == 4) {?>
            <label for="FA1max">FA 1 <input type="number" name="FA1max" min="1"></label><br>
            <label for="FA2max">FA 2 <input type="number" name="FA2max" min="1"></label><br>
            <label for="FA3max">FA 3 <input type="number" name="FA3max" min="1"></label><br>
            <label for="FA4max">FA 4 <input type="number" name="FA4max" min="1"></label><br>
        <?php } else if ($FAamt == 3) {?>
            <label for="FA1max">FA 1 <input type="number" name="FA1max" min="1"></label><br>
            <label for="FA2max">FA 2 <input type="number" name="FA2max" min="1"></label><br>
            <label for="FA3max">FA 3 <input type="number" name="FA3max" min="1"></label><br>
        <?php } else if ($FAamt == 2) {?>
            <label for="FA1max">FA 1 <input type="number" name="FA1max" min="1"></label><br>
            <label for="FA2max">FA 2 <input type="number" name="FA2max" min="1"></label><br>
        <?php } else if ($FAamt == 1) {?>
        <label for="FA1max">FA 1 <input type="number" name="FA1max" min="1"></label> 
        <?php }?>
    </fieldset><br>
        <input type="button" value="Cancel" onclick="history.go(-1)" />
        <input type="submit" value="Save" name="submit">
    </form>
</body>
</html>