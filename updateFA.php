<?php 
  session_start();
?>
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
        <form action="php/fa-updateGrade.php" method="post">
            <input type="button" value="Back" onclick="history.go(-1)" />
            <input type="submit" value="Update Records" name="btn-update"><br><br>

            <table class="stud-tbl">
                <tr>
                    <th><input type="checkbox" id="selectAll"></th>
                </tr>
                <tr>
                    <th>Select All</th>
                    <th>Program</th>
                    <th>Student Number</th>
                    <th>Student Name</th>
                    <th>FA 1</th>
                    <th>FA 2</th>
                    <th>FA 3</th>
                    <th>FA 4</th>
                    <th>FA 5</th>
                    <th>FA 6</th>
                    <th>FA 7</th>
                    <th>FA 8</th>
                    <th>FA 9</th>
                    <th>FA 10</th>
                    <th>Average</th>
                </tr>
                <?php
          $data = implode($_SESSION['filter']);
          echo $data;
          $modID = session_id();
        //   echo $modID;
          $query = "SELECT f.formID, f.modID, f.studNum, f.FA1, f.FA2, f.FA3, f.FA4, f.FA5, f.FA6, f.FA7, f.FA8, f.FA9, f.FA10, f.FAavg, si.lastName, si.firstName, si.studProg 
            FROM formative AS f
            LEFT JOIN studentinfo AS si ON f.studNum = si.studNum
            WHERE si.section IN ('$data') AND modID = $modID
            ORDER BY si.lastName ASC";
          $result = $db->query($query);

          while($row = mysqli_fetch_array($result)) {
            $formID = $row['formID'];
            $studNum = $row['studNum'];
            $FA1 = $row['FA1'];
            $FA2 = $row['FA2'];
            $FA3 = $row['FA3'];
            $FA4 = $row['FA4'];
            $FA5 = $row['FA5'];
            $FA6 = $row['FA6'];
            $FA7 = $row['FA7'];
            $FA8 = $row['FA8'];
            $FA9 = $row['FA9'];
            $FA10 = $row['FA10'];
            $FAavg = $row['FAavg'];
        ?>
                <tr>
                    <td><input type="checkbox" name="update[]" value='<?= $formID?>'></td>
                    <td class="student-data-module"><?php echo $row['studProg'];?></td>
                    <td class="student-data-module"><?php echo $row['studNum'];?></td>
                    <td class="student-data-module"><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                    <td><input type="number" name='FA1_<?= $formID?>' value='<?= $FA1 ?>'></td>
                    <td><input type="number" name='FA2_<?= $formID?>' value='<?= $FA2 ?>'></td>
                    <td><input type="number" name='FA3_<?= $formID?>' value='<?= $FA3 ?>'></td>
                    <td><input type="number" name='FA4_<?= $formID?>' value='<?= $FA4 ?>'></td>
                    <td><input type="number" name='FA5_<?= $formID?>' value='<?= $FA5 ?>'></td>
                    <td><input type="number" name='FA6_<?= $formID?>' value='<?= $FA6 ?>'></td>
                    <td><input type="number" name='FA7_<?= $formID?>' value='<?= $FA7 ?>'></td>
                    <td><input type="number" name='FA8_<?= $formID?>' value='<?= $FA8 ?>'></td>
                    <td><input type="number" name='FA9_<?= $formID?>' value='<?= $FA9 ?>'></td>
                    <td><input type="number" name='FA10_<?= $formID?>' value='<?= $FA10 ?>'></td>
                    <td><?php echo $row['FAavg']?></td>
                </tr>
                <?php }?>
            </table>
        </form>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    // Check/Uncheck All
    $('#selectAll').change(function() {
        if ($(this).is(':checked')) {
            $('input[name="update[]"]').prop('checked', true);
        } else {
            $('input[name="update[]"]').each(function() {
                $(this).prop('checked', false);
            });
        }
    });

    // Checkbox click
    $('input[name="update[]"]').click(function() {
        var total_checkboxes = $('input[name="update[]"]').length;
        var total_checkboxes_checked = $('input[name="update[]"]:checked').length;

        if (total_checkboxes_checked == total_checkboxes) {
            $('#selectAll').prop('checked', true);
        } else {
            $('#selectAll').prop('checked', false);
        }
    });
});
</script>

</html>