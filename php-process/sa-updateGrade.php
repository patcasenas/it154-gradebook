<?php
include_once("../php/dbConfig.php");
$modNum = $_GET['modNum'];
if(isset($_POST['btn-update'])){
  if(isset($_POST['update'])){
    foreach($_POST['update'] as $updateid){
      $SA1 = $_POST['SA1_'.$updateid];
      $SA2 = $_POST['SA2_'.$updateid];
      $SA3 = $_POST['SA3_'.$updateid];

      if($SA1 !='' || $SA2 !='' || $SA3 != '') {
        $updateGrade = "UPDATE summative SET 
                        SA1 = '".$SA1."', SA2 = '".$SA2."', SA3 = '".$SA3."'
                        WHERE sumID='".$updateid."'";
        mysqli_query($db,$updateGrade);
    } 
      if(!$updateGrade) {
        echo "error" . mysqli_error($db);
      } else {
        echo "<script>alert('Grades have been updated successfully.');</script>";
        header ("Location: ../summative.php?modNum=$modNum");
      }
    } 
  }
}
?>