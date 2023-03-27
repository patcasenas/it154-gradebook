<?php 
 require_once("php/session_start.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
            require("php/dbConfig.php");
            include("php/navbar.php");
        ?>
</head>
<?php
        $data = implode($_SESSION['filter']);
        echo $data;
        $modID = session_id();

        $studData = $db->query("SELECT s.sumID, s.modID, s.studNum, s.SA1, s.SA2, s.SA3, s.SAavg, si.lastName, si.firstName, si.studProg 
                                FROM summative AS s
                                LEFT JOIN studentinfo AS si ON s.studNum = si.studNum
                                WHERE si.section IN ('$data') AND modID = $modID
                                ORDER BY si.lastName ASC");  
        $maxscore = $db->query("SELECT SA1max, SA2max, SA3max FROM maxscore WHERE modID = $modID");
        $tblamt = $db->query("SELECT * FROM tblamt WHERE modID = $modID");
        $row = $tblamt->fetch_assoc();
        $SAamt = $row['SAamt'];
  ?>

<body>
    <div class="container">
        <form action="php/sa-updateGrade.php" method="post">
            <input type="button" value="Back" onclick="history.go(-1)" />
            <input type="submit" value="Update Records" name="btn-update"><br><br>

            <?php if ($SAamt == 3) { ?>
                <table class="stud-tbl">
                    <tr>
                        <th></th>
                    </tr>
                    <tr>
                        <th><input type="checkbox" id="selectAll"></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>SA 1</th>
                        <th>SA 2</th>
                        <th>SA 3</th>
                        <th>Average</th>
                    </tr>
                    <tr>
                        <th>Select All</th>
                        <th>Program</th>
                        <th>Student Number</th>
                        <th>Student Name</th>
                        <?php $row = $maxscore->fetch_assoc()?>
                        <th><?php echo $row['SA1max'];?></th>
                        <th><?php echo $row['SA2max']; ?></th>
                        <th><?php echo $row['SA3max'];?></th>
                        <th></th>
                    </tr>
                    <?php
                        while($row = $studData->fetch_assoc()) {
                            $sumID = $row['sumID'];
                            $studNum = $row['studNum'];
                            $SA1 = $row['SA1'];
                            $SA2 = $row['SA2'];
                            $SA3 = $row['SA3'];
                            $SAavg = $row['SAavg'];
                    ?>
                    <tr>
                        <td><input type="checkbox" name="update[]" value='<?= $sumID?>'></td>
                        <td class="student-data-module"><?php echo $row['studProg'];?></td>
                        <td class="student-data-module"><?php echo $row['studNum'];?></td>
                        <td class="student-data-module"><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                        <td><input type="number" name='SA1_<?= $sumID?>' value='<?= $SA1 ?>' maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"></td>
                        <td><input type="number" name='SA2_<?= $sumID?>' value='<?= $SA2 ?>' maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"></td>
                        <td><input type="number" name='SA3_<?= $sumID?>' value='<?= $SA3 ?>' maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"></td>
                        <td><?php echo $row['SAavg']?></td>
                    </tr>
                    <?php }?>
                </table>
            <?php } else if ($SAamt == 2) {?>
                <table class="stud-tbl">
                    <tr>
                        <th></th>
                    </tr>
                    <tr>
                        <th><input type="checkbox" id="selectAll"></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>SA 1</th>
                        <th>SA 2</th>
                        <th>Average</th>
                    </tr>
                    <tr>
                        <th>Select All</th>
                        <th>Program</th>
                        <th>Student Number</th>
                        <th>Student Name</th>
                        <?php $row = $maxscore->fetch_assoc()?>
                        <th><?php echo $row['SA1max'];?></th>
                        <th><?php echo $row['SA2max']; ?></th>
                        <th></th>
                    </tr>
                    <?php
                        while($row = $studData->fetch_assoc()) {
                            $sumID = $row['sumID'];
                            $studNum = $row['studNum'];
                            $SA1 = $row['SA1'];
                            $SA2 = $row['SA2'];
                            $SAavg = $row['SAavg'];
                    ?>
                    <tr>
                        <td><input type="checkbox" name="update[]" value='<?= $sumID?>'></td>
                        <td class="student-data-module"><?php echo $row['studProg'];?></td>
                        <td class="student-data-module"><?php echo $row['studNum'];?></td>
                        <td class="student-data-module"><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                        <td><input type="number" name='SA1_<?= $sumID?>' value='<?= $SA1 ?>' maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"></td>
                        <td><input type="number" name='SA2_<?= $sumID?>' value='<?= $SA2 ?>' maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"></td>
                        <td><?php echo $row['SAavg']?></td>
                    </tr>
                    <?php }?>
            </table>
            <?php } else if ($SAamt == 1) {?>
                <table class="stud-tbl">
                    <tr>
                        <th></th>
                    </tr>
                    <tr>
                        <th><input type="checkbox" id="selectAll"></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>SA 1</th>
                        <th>Average</th>
                    </tr>
                    <tr>
                        <th>Select All</th>
                        <th>Program</th>
                        <th>Student Number</th>
                        <th>Student Name</th>
                        <?php $row = $maxscore->fetch_assoc()?>
                        <th><?php echo $row['SA1max'];?></th>
                        <th></th>
                    </tr>
                    <?php
                        while($row = $studData->fetch_assoc()) {
                            $sumID = $row['sumID'];
                            $studNum = $row['studNum'];
                            $SA1 = $row['SA1'];

                            $SAavg = $row['SAavg'];
                    ?>
                    <tr>
                        <td><input type="checkbox" name="update[]" value='<?= $sumID?>'></td>
                        <td class="student-data-module"><?php echo $row['studProg'];?></td>
                        <td class="student-data-module"><?php echo $row['studNum'];?></td>
                        <td class="student-data-module"><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                        <td><input type="number" name='SA1_<?= $sumID?>' value='<?= $SA1 ?>' maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"></td>
                     <td><?php echo $row['SAavg']?></td>
                    </tr>
                <?php }?>
                </table>
            <?php }?>
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