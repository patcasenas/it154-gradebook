<?php
require("../php/dbConfig.php");
require("../php/session_start.php");
if(isset($_POST['submit'])) {
    $modNum = $_GET['modNum'];
    $courseCode = $_SESSION['courseCode'];
    $query = $db->query("SELECT * FROM tblamt WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
    $row = $query->fetch_assoc();
    $SAamt = $_POST['SAamt'];
    $FAamt = $_POST['FAamt'];

$update = $db->query("UPDATE tblamt SET SAamt=$SAamt, FAamt=$FAamt WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
$updateMax = $db->query("UPDATE maxscore SET SA1max=1, SA2max=1, SA3max=1, FA1max=1, FA2max=1, FA3max=1, FA4max=1, FA5max=1, FA6max=1, FA7max=1, FA8max=1, FA9max=1, FA10max=1 WHERE modNum = $modNum AND courseCode = '".$courseCode."'");

echo "<script>alert('Maximum amount of assessments have been updated successully.');</script>";
header("Location: ../summative.php?modNum=" . $modNum);
}
?>