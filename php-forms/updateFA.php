<?php
    require("../php/dbConfig.php");
    require_once("../php/session_start.php");
    include("../php/navbar.php");
    $modNum = $_GET['modNum'];
    $section = implode($_SESSION['section']);
    $courseCode = $_SESSION['courseCode'];

    $studData = $db->query("SELECT f.formID, f.modNum, f.studNum, f.section, f.FA1, f.FA2, f.FA3, f.FA4, f.FA5, f.FA6, f.FA7, f.FA8, f.FA9, f.FA10, f.FAavg, f.40per, si.lastName, si.firstName, si.studProg 
    FROM formative AS f
    LEFT JOIN studentinfo AS si ON f.studNum = si.studNum
    WHERE si.section IN ('$section') AND modNum = $modNum AND f.courseCode = '".$courseCode."'
    ORDER BY si.lastName ASC");
    $maxscore = $db->query("SELECT FA1max, FA2max, FA3max, FA4max, FA5max, FA6max, FA7max, FA8max, FA9max, FA10max FROM maxscore WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
    $tblamt = $db->query("SELECT * FROM tblamt WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
    $row = $tblamt->fetch_assoc();
    $FAamt = $row['FAamt'];
    $modURL = $db->query("SELECT modNum FROM moduleinfo WHERE modNum = '".$modNum."' AND courseCode = '".$courseCode."'");
    $roww = $modURL->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Module <?php echo $modNum;?> - Formative</title>
</head>
<body>
    <div class="container" id="container">
        <span class="title">Update Formative Assessment Grades</span>
            <div class="student-cont">
                <div class="upload-form">
                    <form action="php-process/uploadGrade.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="file"/>
                        <button type="submit" name="upload" id="uploadGrade" class="sh rad"><span class="material-symbols-rounded">cloud_upload</span>&emsp;Upload Grades</button>
                    </form>
                </div>
            </div>
        <form action="../php-process/fa-updateGrade.php?modNum=<?php echo $roww['modNum'] . "&&courseCode=" . $courseCode; ?>" method="post">
            <?php
                $tableHeaders = [
                    10 => ['FA1', 'FA2', 'FA3', 'FA4', 'FA5', 'FA6', 'FA7', 'FA8', 'FA9', 'FA10'],
                    9 => ['FA1', 'FA2', 'FA3', 'FA4', 'FA5', 'FA6', 'FA7', 'FA8', 'FA9'],
                    8 => ['FA1', 'FA2', 'FA3', 'FA4', 'FA5', 'FA6', 'FA7', 'FA8'],
                    7 => ['FA1', 'FA2', 'FA3', 'FA4', 'FA5', 'FA6', 'FA7'],
                    6 => ['FA1', 'FA2', 'FA3', 'FA4', 'FA5', 'FA6'],
                    5 => ['FA1', 'FA2', 'FA3', 'FA4', 'FA5'],
                    4 => ['FA1', 'FA2', 'FA3', 'FA4'],
                    3 => ['FA1', 'FA2', 'FA3'],
                    2 => ['FA1', 'FA2'],
                    1 => ['FA1']
                ];
                $row = $maxscore->fetch_assoc();
                $headers = $tableHeaders[$FAamt];
            ?>
            <table class="students-table">
                <tr>
                    <th width="5%" rowspan="2">Program</th>
                    <th width="5%" rowspan="2">Section</th>
                    <th width="8%" rowspan="2">Student Number</th>
                    <th width="10%" rowspan="2">Student Name</th>
                    <?php foreach ($headers as $header) { ?>
                        <th width="5%"><?php echo $header?></th>
                    <?php }?>
                    <th width="5%" rowspan="2">Average</th>
                    <th width="5%" rowspan="2">40%</th>
                </tr>
                <tr>
                    <?php for ($i = 1; $i <= $FAamt; $i++) { ?>
                        <th><?php echo $row['FA'.$i.'max']; ?></th>
                    <?php } ?>
                </tr>
                <?php while ($row = $studData->fetch_assoc()) {
                    $formID = $row['formID'];
                    $studNum = $row['studNum'];?>
                    <tr>
                    <input type="checkbox" name="update[]" value='<?= $formID ?>' checked hidden />
                    <td><?php echo $row['studProg']; ?></td>
                    <td><?php echo $row['section']; ?></td>
                    <td><?php echo $row['studNum']; ?></td>
                    <td><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                    <?php foreach ($headers as $header) {
                        $grade = $row[$header];
                        ?>
                        <td>
                            <input type="number" class="edit-grade" name='<?= $header ?>_<?= $formID ?>' value='<?= $grade ?>' maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                        </td>
                    <?php } ?>
                    <td><?php echo $row['FAavg'];?></td>
                    <td><?php echo $row['40per'];?></td>
                <?php } ?>
            </table>

            <div class="updategrades-cont">
                <input type="button" value="Cancel" onclick="history.go(-1)" id="cancel-btn" />
                <input type="submit" value="Update Records" name="btn-update" class="sh rad">
            </div>
        </form>
    </div>
</body>
</html>