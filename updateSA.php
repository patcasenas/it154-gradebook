<?php
    require_once("php/session_start.php");
    require("php/dbConfig.php");
    include("php/navbar.php");
    $modNum = $_GET['modNum'];
    $section = implode($_SESSION['section']);
    $courseCode = $_SESSION['courseCode'];

    $studData = $db->query("SELECT s.sumID, s.modNum, s.username, s.section, s.SA1, s.SA2, s.SA3, s.SAavg, s.60per, si.lastName, si.firstName, si.studProg 
                            FROM summative AS s
                            LEFT JOIN studentinfo AS si ON s.username = si.username
                            WHERE si.section IN ('$section') AND modNum = $modNum AND s.courseCode = '".$courseCode."'
                            ORDER BY si.lastName ASC");  
    $maxscore = $db->query("SELECT SA1max, SA2max, SA3max FROM maxscore WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
    $tblamt = $db->query("SELECT * FROM tblamt WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
    $row = $tblamt->fetch_assoc();
    $SAamt = $row['SAamt'];
    $modURL = $db->query("SELECT modNum FROM moduleinfo WHERE modNum = '".$modNum."' AND courseCode = '".$courseCode."'");
    $roww = $modURL->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo "Update Module " . $modNum . " Grades - Summative" ?></title>
</head>
<body>
    <div class="container" id="container">
    <span class="title">Update Summative Assessment Grades</span>
        <div class="student-cont">
                <div class="upload-form">
                <form action="php-process/uploadGrade.php?modNum=<?php echo $roww['modNum']?>" method="post" enctype="multipart/form-data">
                    <input type="file" name="file"/>
                    <button type="submit" id="uploadGrade" class="sh rad"><span class="material-symbols-rounded">cloud_upload</span>&emsp;Upload Grades</button>
                </form>
        </div>
    <form action="../php-process/sa-updateGrade.php?modNum=<?php echo $roww['modNum'] . "&&courseCode=" . $courseCode?>" method="post">
        <?php
        $tableHeaders = [
            3 => ['SA1', 'SA2', 'SA3'],
            2 => ['SA1', 'SA2'],
            1 => ['SA1']
        ];

        $colspans = [
            3 => 16,
            2 => 14,
            1 => 12
        ];

        $row = $maxscore->fetch_assoc();
        $headers = $tableHeaders[$SAamt];
        $colspan = $colspans[$SAamt];
        ?>
        <table class="students-table">
            <tr>
                <th width="10%" rowspan="2">Program</th>
                <th width="10%" rowspan="2">Section</th>
                <th rowspan="2">Email Address</th>
                <th rowspan="2">Student Name</th>
                <?php foreach ($headers as $header) { ?>
                    <th width="10%"><?php echo $header; ?></th>
                <?php } ?>
                <th width="10%" rowspan="2">Average</th>
                <th width="10%" rowspan="2">60%</th>
            </tr>
            <tr>
                <?php for ($i = 1; $i <= $SAamt; $i++) { ?>
                    <th><?php echo $row['SA'.$i.'max']; ?></th>
                <?php } ?>
            </tr>
            <?php while ($row = $studData->fetch_assoc()) {
                $sumID = $row['sumID'];
                $username = $row['username'];
                ?>
                <tr>
                    <input type="checkbox" name="update[]" value='<?= $sumID ?>' checked hidden />
                    <td><?php echo $row['studProg']; ?></td>
                    <td><?php echo $row['section']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                    <?php foreach ($headers as $header) {
                        $grade = $row[$header];
                        ?>
                        <td>
                            <input type="number" class="edit-grade" name='<?= $header ?>_<?= $sumID ?>' value='<?= $grade ?>' maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                        </td>
                    <?php } ?>
                    <td><?php echo $row['SAavg'] ?></td>
                    <td><?php echo $row['60per'] ?></td>
                </tr>
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