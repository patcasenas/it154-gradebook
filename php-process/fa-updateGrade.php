<?php
include_once("../php/dbConfig.php");
$modNum = $_GET['modNum'];

if(isset($_POST['btn-update'])){
  if(isset($_POST['update'])){
    foreach($_POST['update'] as $updateid){
      $FA1 = $_POST['FA1_'.$updateid];
      $FA2 = $_POST['FA2_'.$updateid];
      $FA3 = $_POST['FA3_'.$updateid];
      $FA4 = $_POST['FA4_'.$updateid];
      $FA5 = $_POST['FA5_'.$updateid];
      $FA6 = $_POST['FA6_'.$updateid];
      $FA7 = $_POST['FA7_'.$updateid];
      $FA8 = $_POST['FA8_'.$updateid];
      $FA9 = $_POST['FA9_'.$updateid];
      $FA10 = $_POST['FA10_'.$updateid];

      if($FA1 !='' || $FA2 !='' || $FA3 != '' || $FA4 !='' || $FA5 != '' || $FA6 !='' || $FA7 != '' || $FA8 !='' || $FA9 != '' || $FA10 != '') {
        $updateGrade = "UPDATE formative SET 
                        FA1 = '".$FA1."', FA2 = '".$FA2."', FA3 = '".$FA3."', FA4 = '".$FA4."', FA5 = '".$FA5."', FA6 = '".$FA6."', FA7 = '".$FA7."', FA8 = '".$FA8."', FA9 = '".$FA9."', FA10 = '".$FA10."'
                        WHERE formID='".$updateid."'";
        mysqli_query($db,$updateGrade);
    } 
      if(!$updateGrade) {
        echo "error" . mysqli_error($db);
      } else {
        echo "<script>alert('Grades have been updated successfully.');</script>";
        header("Location:../formative.php?modNum=$modNum");
      }
    } 
  }
}
?>