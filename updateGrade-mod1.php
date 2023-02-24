<!DOCTYPE html>
<html lang="en">
<head>
    <?php
            require("php/dbConfig.php");
            include("php/navbar.php");
        ?>
</head>

<body>
    <div class="container">
        <form action='php/updateGrade.php' method="post">
            <input type="submit" value="Save Records" name='btn-update'><br><br>
            <table>
                <tr>
                    <th><input type="checkbox" id='checkAll'>Check</th>
                    <th>Name</th>
                    <th>SA1</th>
                    <th>SA2</th>
                    <th>SA3</th>
                    <th>Average</th>
                </tr>

                <?php
                        $query = "SELECT s.sumID, s.modID, s.studNum, s.SA1, s.SA2, s.SA3, s.SAavg, si.lastName, si.firstName, si.studProg 
                                    FROM summative AS s
                                    LEFT JOIN studentinfo AS si ON s.studNum = si.studNum
                                    WHERE modID = 1
                                    ORDER BY si.lastName ASC";
                        $result = mysqli_query($db,$query);

                        while($row = mysqli_fetch_array($result)) {
                            $sumID = $row['sumID'];
                            $lastName = $row['lastName'];
                            $firstName = $row['firstName'];
                            $SA1 = $row['SA1'];
                            $SA2 = $row['SA2'];
                            $SA3 = $row['SA3'];
                            $SAavg = $row['SAavg'];
                            ?>
                <tr>
                    <td><input type="checkbox" name='update[]' value='<?= $sumID ?>'></td>
                    <td><?php echo $lastName . ", " . $firstName ?></td>
                    <td><input type="number" name="SA1_<?= $sumID ?>" value='<?= $SA1 ?>'></td>
                    <td><input type="number" name="SA2_<?= $sumID ?>" value='<?= $SA2 ?>'></td>
                    <td><input type="number" name="SA3_<?= $sumID ?>" value='<?= $SA3 ?>'></td>
                    <td>0</td>
                </tr>
                <?php }
                    ?>
            </table>
        </form>
    </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

  // Check/Uncheck ALl
  $('#checkAll').change(function(){
    if($(this).is(':checked')){
      $('input[name="update[]"]').prop('checked',true);
    }else{
      $('input[name="update[]"]').each(function(){
         $(this).prop('checked',false);
      });
    }
  });

  // Checkbox click
  $('input[name="update[]"]').click(function(){
    var total_checkboxes = $('input[name="update[]"]').length;
    var total_checkboxes_checked = $('input[name="update[]"]:checked').length;

    if(total_checkboxes_checked == total_checkboxes){
       $('#checkAll').prop('checked',true);
    }else{
       $('#checkAll').prop('checked',false);
    }
  });
});
</script>
<?php
if(isset($_POST['btn-update'])){
  if(isset($_POST['update'])){
    foreach($_POST['update'] as $updateid){

      $SA1 = $_POST['SA1_'.$updateid];
      $SA2 = $_POST['SA2_'.$updateid];
      $SA3 = $_POST['SA3_'.$updateid];
      if($SA1 !='' && $SA2 !='' && $SA3 != '') {
        $updateGrade = "UPDATE summative SET 
                        SA1 = '".$SA1."', SA2 = '".$SA2."', SA3 = '".$SA3."'
                        WHERE sumID=".$updateid;
        mysqli_query($db,$updateGrade);
    } else {
      echo "error" . mysqli_error($db);
    }
      } 
    }
  }
  ?>