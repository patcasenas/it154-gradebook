<?php
    require_once("../php/dbConfig.php");
    require("../php/session_start.php");
    if(isset($_POST['submit'])) {
        $modNum = $_GET['modNum'];
        $courseCode = $_SESSION['courseCode'];
        $tblamt = $db->query("SELECT * FROM tblamt WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
        $row = $tblamt->fetch_assoc();
        $SAamt = $row['SAamt'];
        $FAamt = $row['FAamt'];

        $updateSA = "UPDATE maxscore SET ";
        for($i = 1; $i <= $SAamt; $i++) {
            $updateSA .= "SA".$i."max = ".$_POST['SA'.$i.'max'];
            if ($i != $SAamt) {
                $updateSA .= ", ";
            }
        }
        $updateSA .= " WHERE modNum = '".$modNum."' AND courseCode = '".$courseCode."'";
        $result = $db->query($updateSA);

        $updateFA = "UPDATE maxscore SET ";
        for($i = 1; $i <= $FAamt; $i++) {
            $updateFA .= "FA".$i."max = ".$_POST['FA'.$i.'max'];
            if ($i != $FAamt) {
                $updateFA .= ", ";
            }
        }
        $updateFA .= " WHERE modNum = '".$modNum."' AND courseCode = '".$courseCode."'";
        $results = $db->query($updateFA);
        
        if(!$updateFA && !$updateSA) {
            mysqli_error($db);
        } else {
            echo "<script>alert('Successfully set')</script>";
            header("Location: ../summative.php?modNum=" . $modNum);
        }
    }
?>