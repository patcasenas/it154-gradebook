<?php
include_once("dbConfig.php");

if(isset($_POST['btn-update'])){

  if(isset($_POST['update'])){
    foreach($_POST['update'] as $updateid){

      $SA1 = $_POST['SA1_'.$updateid];
      $SA2 = $_POST['SA2_'.$updateid];

      if($SA1 !='' && $SA2 !='') {
        $updateGrade = "UPDATE summative SET SA1 = '".$SA1."', SA2 = '".$SA2."'
                        WHERE sumID=".$updateid;
        mysqli_query($db,$updateGrade);
        
        // Action
        $qstring = '?status=succ';} 
        else {
          $qstring = '?status=err';
        }
      } 
    }
  }
  header("location:../module-1.php") . $qstring;
  ?>