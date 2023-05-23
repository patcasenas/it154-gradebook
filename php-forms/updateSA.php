<?php 
 require_once("../php/session_start.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
            require("../php/dbConfig.php");
            include("../php/navbar.php");
    ?>
    <title>Update Grades</title>
</head>
<?php
        $data = implode($_SESSION['filter']);
        $courseCode = implode($_SESSION['courseTitle']);
        $modNum = session_id();

        $studData = $db->query("SELECT s.sumID, s.modNum, s.studNum, s.section, s.SA1, s.SA2, s.SA3, s.SAavg, s.60per, si.lastName, si.firstName, si.studProg 
                                FROM summative AS s
                                LEFT JOIN studentinfo AS si ON s.studNum = si.studNum
                                WHERE si.section IN ('$data') AND modNum = $modNum AND s.courseCode = '".$courseCode."'
                                ORDER BY si.lastName ASC");  
        $maxscore = $db->query("SELECT SA1max, SA2max, SA3max FROM maxscore WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
        $tblamt = $db->query("SELECT * FROM tblamt WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
        $row = $tblamt->fetch_assoc();
        $SAamt = $row['SAamt'];
  ?>

<body>
    <div class="container" id="container">
        <form action="../php-process/sa-updateGrade.php" method="post">
            <?php if ($SAamt == 3) { ?>
                <table class="students-table">
                    <tr>
                        <th width="10%" rowspan="2">Program</th>
                        <th width="10%" rowspan="2">Section</th>
                        <th width="10%" rowspan="2">Student Number</th>
                        <th rowspan="2">Student Name</th>
                        <th width="10%">SA 1</th>
                        <th width="10%">SA 2</th>
                        <th width="10%">SA 3</th>
                        <th width="10%" rowspan="2">Average</th>
                        <th width="10%" rowspan="2">60%</th>
                    </tr>
                    <?php $row = $maxscore->fetch_assoc() ?>
                    <tr>
                        <th><?php echo $row['SA1max'];?></th>
                        <th><?php echo $row['SA2max']; ?></th>
                        <th><?php echo $row['SA3max'];?></th>
                    </tr>
                    <?php
                        while($row = $studData->fetch_assoc()) {
                            $sumID = $row['sumID'];
                            $studNum = $row['studNum'];
                            $SA1 = $row['SA1'];
                            $SA2 = $row['SA2'];
                            $SA3 = $row['SA3'];
                    ?>
                    <tr>
                        <input type="checkbox" name="update[]" value='<?= $sumID?>' checked hidden/>
                        <td><?php echo $row['studProg'];?></td>
                        <td><?php echo $row['section'];?></td>
                        <td><?php echo $row['studNum'];?></td>
                        <td><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                        <td><input type="number" name='SA1_<?= $sumID?>' value='<?= $SA1 ?>' maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"></td>
                        <td><input type="number" name='SA2_<?= $sumID?>' value='<?= $SA2 ?>' maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"></td>
                        <td><input type="number" name='SA3_<?= $sumID?>' value='<?= $SA3 ?>' maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"></td>
                        <td><?php echo $row['SAavg']?></td>
                        <td><?php echo $row['60per']?></td>
                    </tr>
                    <?php }?>
                </table>
            <?php } else if ($SAamt == 2) {?>
                <table class="students-table">
                    <tr>
                        <th width="10%" rowspan="2">Program</th>
                        <th width="10%" rowspan="2">Section</th>
                        <th width="10%" rowspan="2">Student Number</th>
                        <th rowspan="2">Student Name</th>
                        <th width="10%">SA 1</th>
                        <th width="10%">SA 2</th>
                        <th width="10%" rowspan="2">Average</th>
                        <th width="10%" rowspan="2">60%</th>
                    </tr>
                    <?php $row = $maxscore->fetch_assoc() ?>
                    <tr>
                        <th><?php echo $row['SA1max'];?></th>
                        <th><?php echo $row['SA2max']; ?></th>
                    </tr>
                    <?php
                        while($row = $studData->fetch_assoc()) {
                            $sumID = $row['sumID'];
                            $studNum = $row['studNum'];
                            $SA1 = $row['SA1'];
                            $SA2 = $row['SA2'];
                    ?>
                    <tr>
                        <input type="checkbox" name="update[]" value='<?= $sumID?>' checked hidden/>
                        <td><?php echo $row['studProg'];?></td>
                        <td><?php echo $row['section'];?></td>
                        <td><?php echo $row['studNum'];?></td>
                        <td><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                        <td><input type="number" name='SA1_<?= $sumID?>' value='<?= $SA1 ?>' maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"></td>
                        <td><input type="number" name='SA2_<?= $sumID?>' value='<?= $SA2 ?>' maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"></td>
                        <td><?php echo $row['SAavg']?></td>
                        <td><?php echo $row['60per']?></td>
                    </tr>
                    <?php }?>
                </table>
            <?php } else if ($SAamt == 1) {?>
                <table class="students-table">
                    <tr>
                        <th width="10%" rowspan="2">Program</th>
                        <th width="10%" rowspan="2">Section</th>
                        <th width="10%" rowspan="2">Student Number</th>
                        <th rowspan="2">Student Name</th>
                        <th width="10%">SA 1</th>
                        <th width="10%" rowspan="2">Average</th>
                        <th width="10%" rowspan="2">60%</th>
                    </tr>
                    <?php $row = $maxscore->fetch_assoc() ?>
                    <tr>
                        <th><?php echo $row['SA1max'];?></th>
                    </tr>
                    <?php
                        while($row = $studData->fetch_assoc()) {
                            $sumID = $row['sumID'];
                            $studNum = $row['studNum'];
                            $SA1 = $row['SA1'];
                    ?>
                    <tr>
                        <input type="checkbox" name="update[]" value='<?= $sumID?>' checked hidden/>
                        <td><?php echo $row['studProg'];?></td>
                        <td><?php echo $row['section'];?></td>
                        <td><?php echo $row['studNum'];?></td>
                        <td><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                        <td><input type="number" class="edit-grade" name='SA1_<?= $sumID?>' value='<?= $SA1 ?>' maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"></td>
                        <td><?php echo $row['SAavg']?></td>
                        <td><?php echo $row['60per']?></td>
                    </tr>
                    <?php }?>
                </table>
            <?php }?>
            <div class="updategrades-cont">
                <input type="button" value="Cancel" onclick="history.go(-1)" id="cancel-btn"/>
                <input type="submit" value="Update Records" name="btn-update" class="sh rad">
            </div>            
        </form>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
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