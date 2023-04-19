<?php
    require_once("../php/dbConfig.php");
    require_once("../php/session_start.php");

    if(isset($_POST['submit'])) {
        $modNum = session_id();
        $courseCode = implode($_SESSION['courseTitle']);
        $modTitle = $db->query("SELECT modName FROM moduleinfo WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
        $tblamt = $db->query("SELECT * FROM tblamt WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
        $row = $modTitle->fetch_assoc();
        $rows = $tblamt->fetch_assoc();
        $SAamt = $rows['SAamt'];
        $FAamt = $rows['FAamt'];
        // Update SA max score to database
        if ($SAamt == 3) {
            $SA1max = $_POST['SA1max'];
            $SA2max = $_POST['SA2max'];
            $SA3max = $_POST['SA3max'];
            $result = $db->query("UPDATE maxscore SET SA1max = $SA1max, SA2max = $SA2max, SA3max = $SA3max WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
        } else if ($SAamt == 2) {
            $SA1max = $_POST['SA1max'];
            $SA2max = $_POST['SA2max'];
            $result = $db->query("UPDATE maxscore SET SA1max = $SA1max, SA2max = $SA2max WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
        } else if ($SAamt == 1) {
            $SA1max = $_POST['SA1max'];
            $result = $db->query("UPDATE maxscore SET SA1max = $SA1max WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
        }
        // Update FA max score to database
        if($FAamt == 10) {
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

            $result = $db->query("UPDATE maxscore SET FA1max = $FA1max, FA2max = $FA2max, FA3max = $FA3max, FA4max = $FA4max, FA5max = $FA5max, FA6max = $FA6max, FA7max = $FA7max, FA8max = $FA8max, FA9max = $FA9max, FA10max = $FA10max WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
        } else if ($FAamt == 9) {
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

            $result = $db->query("UPDATE maxscore SET FA1max = $FA1max, FA2max = $FA2max, FA3max = $FA3max, FA4max = $FA4max, FA5max = $FA5max, FA6max = $FA6max, FA7max = $FA7max, FA8max = $FA8max, FA9max = $FA9max WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
        } else if ($FAamt == 9) {
            $FA1max = $_POST['FA1max'];
            $FA2max = $_POST['FA2max'];
            $FA3max = $_POST['FA3max'];
            $FA4max = $_POST['FA4max'];
            $FA5max = $_POST['FA5max'];
            $FA6max = $_POST['FA6max'];
            $FA7max = $_POST['FA7max'];
            $FA8max = $_POST['FA8max'];
            $FA9max = $_POST['FA9max'];

            $result = $db->query("UPDATE maxscore SET FA1max = $FA1max, FA2max = $FA2max, FA3max = $FA3max, FA4max = $FA4max, FA5max = $FA5max, FA6max = $FA6max, FA7max = $FA7max, FA8max = $FA8max WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
        } else if ($FAamt == 8) {
            $FA1max = $_POST['FA1max'];
            $FA2max = $_POST['FA2max'];
            $FA3max = $_POST['FA3max'];
            $FA4max = $_POST['FA4max'];
            $FA5max = $_POST['FA5max'];
            $FA6max = $_POST['FA6max'];
            $FA7max = $_POST['FA7max'];
            $FA8max = $_POST['FA8max'];
           
            $result = $db->query("UPDATE maxscore SET FA1max = $FA1max, FA2max = $FA2max, FA3max = $FA3max, FA4max = $FA4max, FA5max = $FA5max, FA6max = $FA6max, FA7max = $FA7max, FA8max = $FA8max WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
        } else if ($FAamt == 7) {
            $FA1max = $_POST['FA1max'];
            $FA2max = $_POST['FA2max'];
            $FA3max = $_POST['FA3max'];
            $FA4max = $_POST['FA4max'];
            $FA5max = $_POST['FA5max'];
            $FA6max = $_POST['FA6max'];
            $FA7max = $_POST['FA7max'];

            $result = $db->query("UPDATE maxscore SET FA1max = $FA1max, FA2max = $FA2max, FA3max = $FA3max, FA4max = $FA4max, FA5max = $FA5max, FA6max = $FA6max, FA7max = $FA7max WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
        } else if ($FAamt == 6) {
            $FA1max = $_POST['FA1max'];
            $FA2max = $_POST['FA2max'];
            $FA3max = $_POST['FA3max'];
            $FA4max = $_POST['FA4max'];
            $FA5max = $_POST['FA5max'];
            $FA6max = $_POST['FA6max'];

            $result = $db->query("UPDATE maxscore SET FA1max = $FA1max, FA2max = $FA2max, FA3max = $FA3max, FA4max = $FA4max, FA5max = $FA5max, FA6max = $FA6max WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
        } else if ($FAamt == 5) {
            $FA1max = $_POST['FA1max'];
            $FA2max = $_POST['FA2max'];
            $FA3max = $_POST['FA3max'];
            $FA4max = $_POST['FA4max'];
            $FA5max = $_POST['FA5max'];

            $result = $db->query("UPDATE maxscore SET FA1max = $FA1max, FA2max = $FA2max, FA3max = $FA3max, FA4max = $FA4max, FA5max = $FA5max WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
        } else if ($FAamt == 4) {
            $FA1max = $_POST['FA1max'];
            $FA2max = $_POST['FA2max'];
            $FA3max = $_POST['FA3max'];
            $FA4max = $_POST['FA4max'];

            $result = $db->query("UPDATE maxscore SET FA1max = $FA1max, FA2max = $FA2max, FA3max = $FA3max, FA4max = $FA4max WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
        } else if ($FAamt == 3) {
            $FA1max = $_POST['FA1max'];
            $FA2max = $_POST['FA2max'];
            $FA3max = $_POST['FA3max'];

            $result = $db->query("UPDATE maxscore SET FA1max = $FA1max, FA2max = $FA2max, FA3max = $FA3max WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
        } else if ($FAamt == 2) {
            $FA1max = $_POST['FA1max'];
            $FA2max = $_POST['FA2max'];

            $result = $db->query("UPDATE maxscore SET FA1max = $FA1max, FA2max = $FA2max WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
        } else if ($FAamt == 1) {
            $FA1max = $_POST['FA1max'];

            $result = $db->query("UPDATE maxscore SET FA1max = $FA1max WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
        }

        if (!$result) {
            mysqli_error($db);
        } else {
            echo "<script>alert('Successfully set')</script>";
            echo "<script>javascript:history.go(-2);</script>";
        }
    }
?>