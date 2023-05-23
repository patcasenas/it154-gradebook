<?php 
require("php/dbConfig.php");
$sql = "SELECT DISTINCT section FROM studentinfo ORDER BY section ASC";
$result = mysqli_query($db,$sql);
$sections = array();
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)) {
        $sections[] = $row;
    }
}
// echo '<pre>' . print_r($sections) . '</pre>'; 
?>
<html>

<body>
    <div class="select-section">
        <form action="" method="get">
            <select name="section[]">
                <option value="0" selected="selected" hidden>Filter Sections</option>
                <?php
        foreach($sections as $key => $value) {
            echo '<option value='.$sections[$key]['section'] . '>' . '&#160;'.
            $sections[$key]['section'] . '</option>';
        }
        ?>
            </select>
            <input type="submit" name="submit" value="Filter">
        </form>
    </div>
</body>

</html>
<?php
if(isset($_GET['submit'])) {
    $_SESSION['filter'] = $_GET['section'];
}
if(isset($_SESSION['filter'])) {
    $section = implode($_SESSION['filter']);
    $modNum = session_id();
    // echo $modID;
    if ($section == 0) {
        echo "<script>alert('Select a section from the dropdown')</script>";
    }
    $studData = $db->query("SELECT f.formID, f.section, f.modNum, f.studNum, f.FA1, f.FA2, f.FA3, f.FA4, f.FA5, f.FA6, f.FA7, f.FA8, f.FA9, f.FA10, f.40per, f.FAavg, si.lastName, si.firstName, si.studProg 
                FROM formative AS f 
                LEFT JOIN studentinfo AS si ON f.studNum = si.studNum 
                WHERE si.section IN ('$section') AND modNum = $modNum AND f.courseCode = '".$courseCode."'
                ORDER BY si.lastName ASC");
    $maxscore = $db->query("SELECT * FROM maxscore WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
    $tblamt = $db->query("SELECT * FROM tblamt WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
    $row = $tblamt->fetch_assoc();
    $FAamt = $row['FAamt'];
    if (!$maxscore && !$studData && !$tblamt) {
        echo mysqli_error($db);
    }
    if ($FAamt == 10) {?>
<table class="students-table">
    <thead>
        <tr>
            <th width="5%" rowspan="2">Program</th>
            <th width="5%" rowspan="2">Section</th>
            <th width="10%" rowspan="2">Student Number</th>
            <th rowspan="2">Student Name</th>
            <th width="5%">FA 1</th>
            <th width="5%">FA 2</th>
            <th width="5%">FA 3</th>
            <th width="5%">FA 4</th>
            <th width="5%">FA 5</th>
            <th width="5%">FA 6</th>
            <th width="5%">FA 7</th>
            <th width="5%">FA 8</th>
            <th width="5%">FA 9</th>
            <th width="5%">FA 10</th>
            <th width="5%" rowspan="2">Average</th>
            <th width="5%" rowspan="2">40%</th>
        </tr>
        <?php $row = $maxscore->fetch_assoc() ?>
        <tr>
            <th><?php echo $row['FA1max']?></th>
            <th><?php echo $row['FA2max']?></th>
            <th><?php echo $row['FA3max']?></th>
            <th><?php echo $row['FA4max']?></th>
            <th><?php echo $row['FA5max']?></th>
            <th><?php echo $row['FA6max']?></th>
            <th><?php echo $row['FA7max']?></th>
            <th><?php echo $row['FA8max']?></th>
            <th><?php echo $row['FA9max']?></th>
            <th><?php echo $row['FA10max']?></th>
        </tr>
    </thead>
    <tbody>
        <?php
                    while($row = $studData->fetch_assoc()) {?>
        <tr>
            <td><?php echo $row['studProg'];?></td>
            <td><?php echo $row['section'];?></td>
            <td><?php echo $row['studNum'];?></td>
            <td><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
            <td><?php echo $row['FA1'];?></td>
            <td><?php echo $row['FA2']; ?></td>
            <td><?php echo $row['FA3'];?></td>
            <td><?php echo $row['FA4'];?></td>
            <td><?php echo $row['FA5']; ?></td>
            <td><?php echo $row['FA6'];?></td>
            <td><?php echo $row['FA7'];?></td>
            <td><?php echo $row['FA8']; ?></td>
            <td><?php echo $row['FA9'];?></td>
            <td><?php echo $row['FA10'];?></td>
            <td><?php echo $row['FAavg'];?></td>
            <td><?php echo $row['40per'];?></td>
        </tr>
        <?php }?>
    </tbody>
</table>
<?php } else if ($FAamt == 9) {?>
<table class="students-table">
    <thead>
        <tr>
            <th width="5%" rowspan="2">Program</th>
            <th width="5%" rowspan="2">Section</th>
            <th width="10%" rowspan="2">Student Number</th>
            <th rowspan="2">Student Name</th>
            <th width="5%">FA 1</th>
            <th width="5%">FA 2</th>
            <th width="5%">FA 3</th>
            <th width="5%">FA 4</th>
            <th width="5%">FA 5</th>
            <th width="5%">FA 6</th>
            <th width="5%">FA 7</th>
            <th width="5%">FA 8</th>
            <th width="5%">FA 9</th>
            <th width="5%" rowspan="2">Average</th>
            <th width="5%" rowspan="2">40%</th>
        </tr>
        <?php $row = $maxscore->fetch_assoc() ?>
        <tr>
            <th><?php echo $row['FA1max']?></th>
            <th><?php echo $row['FA2max']?></th>
            <th><?php echo $row['FA3max']?></th>
            <th><?php echo $row['FA4max']?></th>
            <th><?php echo $row['FA5max']?></th>
            <th><?php echo $row['FA6max']?></th>
            <th><?php echo $row['FA7max']?></th>
            <th><?php echo $row['FA8max']?></th>
            <th><?php echo $row['FA9max']?></th>
        </tr>
    </thead>
    <tbody>
        <?php
                    while($row = $studData->fetch_assoc()) {?>
        <tr>
            <td><?php echo $row['studProg'];?></td>
            <td><?php echo $row['section'];?></td>
            <td><?php echo $row['studNum'];?></td>
            <td><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
            <td><?php echo $row['FA1'];?></td>
            <td><?php echo $row['FA2']; ?></td>
            <td><?php echo $row['FA3'];?></td>
            <td><?php echo $row['FA4'];?></td>
            <td><?php echo $row['FA5']; ?></td>
            <td><?php echo $row['FA6'];?></td>
            <td><?php echo $row['FA7'];?></td>
            <td><?php echo $row['FA8']; ?></td>
            <td><?php echo $row['FA9'];?></td>
            <td><?php echo $row['FAavg'];?></td>
            <td><?php echo $row['40per'];?></td>
        </tr>
        <?php }?>
    </tbody>
    <?php } else if($FAamt == 8) {?>
    <table class="students-table">
        <thead>
            <tr>
                <th width="5%" rowspan="2">Program</th>
                <th width="5%" rowspan="2">Section</th>
                <th width="10%" rowspan="2">Student Number</th>
                <th rowspan="2">Student Name</th>
                <th width="5%">FA 1</th>
                <th width="5%">FA 2</th>
                <th width="5%">FA 3</th>
                <th width="5%">FA 4</th>
                <th width="5%">FA 5</th>
                <th width="5%">FA 6</th>
                <th width="5%">FA 7</th>
                <th width="5%">FA 8</th>
                <th width="10%" rowspan="2">Average</th>
                <th width="10%" rowspan="2">40%</th>
            </tr>
            <?php $row = $maxscore->fetch_assoc() ?>
            <tr>
                <th><?php echo $row['FA1max']?></th>
                <th><?php echo $row['FA2max']?></th>
                <th><?php echo $row['FA3max']?></th>
                <th><?php echo $row['FA4max']?></th>
                <th><?php echo $row['FA5max']?></th>
                <th><?php echo $row['FA6max']?></th>
                <th><?php echo $row['FA7max']?></th>
                <th><?php echo $row['FA8max']?></th>
            </tr>
        </thead>
        <tbody>
            <?php
                    while($row = $studData->fetch_assoc()) {?>
            <tr>
                <td><?php echo $row['studProg'];?></td>
                <td><?php echo $row['section'];?></td>
                <td><?php echo $row['studNum'];?></td>
                <td><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                <td><?php echo $row['FA1'];?></td>
                <td><?php echo $row['FA2']; ?></td>
                <td><?php echo $row['FA3'];?></td>
                <td><?php echo $row['FA4'];?></td>
                <td><?php echo $row['FA5']; ?></td>
                <td><?php echo $row['FA6'];?></td>
                <td><?php echo $row['FA7'];?></td>
                <td><?php echo $row['FA8']; ?></td>
                <td><?php echo $row['FAavg'];?></td>
                <td><?php echo $row['40per'];?></td>
            </tr>
            <?php }?>
        </tbody>
        <?php } else if($FAamt == 7) {?>
        <table class="students-table">
            <thead>
                <tr>
                    <th width="5%" rowspan="2">Program</th>
                    <th width="5%" rowspan="2">Section</th>
                    <th width="10%" rowspan="2">Student Number</th>
                    <th rowspan="2">Student Name</th>
                    <th width="5%">FA 1</th>
                    <th width="5%">FA 2</th>
                    <th width="5%">FA 3</th>
                    <th width="5%">FA 4</th>
                    <th width="5%">FA 5</th>
                    <th width="5%">FA 6</th>
                    <th width="5%">FA 7</th>
                    <th width="10%" rowspan="2">Average</th>
                    <th width="10%" rowspan="2">40%</th>
                </tr>
                <?php $row = $maxscore->fetch_assoc() ?>
                <tr>
                    <th><?php echo $row['FA1max']?></th>
                    <th><?php echo $row['FA2max']?></th>
                    <th><?php echo $row['FA3max']?></th>
                    <th><?php echo $row['FA4max']?></th>
                    <th><?php echo $row['FA5max']?></th>
                    <th><?php echo $row['FA6max']?></th>
                    <th><?php echo $row['FA7max']?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = $studData->fetch_assoc()) {?>
                <tr>
                    <td><?php echo $row['studProg'];?></td>
                    <td><?php echo $row['section'];?></td>
                    <td><?php echo $row['studNum'];?></td>
                    <td><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                    <td><?php echo $row['FA1'];?></td>
                    <td><?php echo $row['FA2']; ?></td>
                    <td><?php echo $row['FA3'];?></td>
                    <td><?php echo $row['FA4'];?></td>
                    <td><?php echo $row['FA5']; ?></td>
                    <td><?php echo $row['FA6'];?></td>
                    <td><?php echo $row['FA7'];?></td>
                    <td><?php echo $row['FAavg'];?></td>
                    <td><?php echo $row['40per'];?></td>
                </tr>
                <?php }?>
            </tbody>
            <?php } else if($FAamt == 6) {?>
            <table class="students-table">
                <thead>
                    <tr>
                        <th width="10%" rowspan="2">Program</th>
                        <th width="10%" rowspan="2">Section</th>
                        <th width="10%" rowspan="2">Student Number</th>
                        <th rowspan="2">Student Name</th>
                        <th width="5%">FA 1</th>
                        <th width="5%">FA 2</th>
                        <th width="5%">FA 3</th>
                        <th width="5%">FA 4</th>
                        <th width="5%">FA 5</th>
                        <th width="5%">FA 6</th>
                        <th width="10%" rowspan="2">Average</th>
                        <th width="10%" rowspan="2">40%</th>
                    </tr>
                    <?php $row = $maxscore->fetch_assoc() ?>
                    <tr>
                        <th><?php echo $row['FA1max']?></th>
                        <th><?php echo $row['FA2max']?></th>
                        <th><?php echo $row['FA3max']?></th>
                        <th><?php echo $row['FA4max']?></th>
                        <th><?php echo $row['FA5max']?></th>
                        <th><?php echo $row['FA6max']?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row = $studData->fetch_assoc()) {?>
                    <tr>
                        <td><?php echo $row['studProg'];?></td>
                        <td><?php echo $row['section'];?></td>
                        <td><?php echo $row['studNum'];?></td>
                        <td><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                        <td><?php echo $row['FA1'];?></td>
                        <td><?php echo $row['FA2']; ?></td>
                        <td><?php echo $row['FA3'];?></td>
                        <td><?php echo $row['FA4'];?></td>
                        <td><?php echo $row['FA5']; ?></td>
                        <td><?php echo $row['FA6'];?></td>
                        <td><?php echo $row['FAavg'];?></td>
                        <td><?php echo $row['40per'];?></td>
                    </tr>
                    <?php }?>
                </tbody>
                <?php } else if($FAamt == 5) { ?>
                <table class="students-table">
                    <thead>
                        <tr>
                            <th width="10%" rowspan="2">Program</th>
                            <th width="10%" rowspan="2">Section</th>
                            <th width="10%" rowspan="2">Student Number</th>
                            <th rowspan="2">Student Name</th>
                            <th width="5%">FA 1</th>
                            <th width="5%">FA 2</th>
                            <th width="5%">FA 3</th>
                            <th width="5%">FA 4</th>
                            <th width="5%">FA 5</th>
                            <th width="10%" rowspan="2">Average</th>
                            <th width="10%" rowspan="2">40%</th>
                        </tr>
                        <?php $row = $maxscore->fetch_assoc() ?>
                        <tr>
                            <th><?php echo $row['FA1max']?></th>
                            <th><?php echo $row['FA2max']?></th>
                            <th><?php echo $row['FA3max']?></th>
                            <th><?php echo $row['FA4max']?></th>
                            <th><?php echo $row['FA5max']?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    while($row = $studData->fetch_assoc()) {?>
                        <tr>
                            <td><?php echo $row['studProg'];?></td>
                            <td><?php echo $row['section'];?></td>
                            <td><?php echo $row['studNum'];?></td>
                            <td><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                            <td><?php echo $row['FA1'];?></td>
                            <td><?php echo $row['FA2']; ?></td>
                            <td><?php echo $row['FA3'];?></td>
                            <td><?php echo $row['FA4'];?></td>
                            <td><?php echo $row['FA5']; ?></td>
                            <td><?php echo $row['FAavg'];?></td>
                            <td><?php echo $row['40per'];?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                    <?php } else if($FAamt == 4) { ?>
                    <table class="students-table">
                        <thead>
                            <tr>
                                <th width="10%" rowspan="2">Program</th>
                                <th width="10%" rowspan="2">Section</th>
                                <th width="10%" rowspan="2">Student Number</th>
                                <th rowspan="2">Student Name</th>
                                <th width="5%">FA 1</th>
                                <th width="5%">FA 2</th>
                                <th width="5%">FA 3</th>
                                <th width="5%">FA 4</th>
                                <th width="10%" rowspan="2">Average</th>
                                <th width="10%" rowspan="2">40%</th>
                            </tr>
                            <?php $row = $maxscore->fetch_assoc() ?>
                            <tr>
                                <th><?php echo $row['FA1max']?></th>
                                <th><?php echo $row['FA2max']?></th>
                                <th><?php echo $row['FA3max']?></th>
                                <th><?php echo $row['FA4max']?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    while($row = $studData->fetch_assoc()) {?>
                            <tr>
                                <td><?php echo $row['studProg'];?></td>
                                <td><?php echo $row['section'];?></td>
                                <td><?php echo $row['studNum'];?></td>
                                <td><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                                <td><?php echo $row['FA1'];?></td>
                                <td><?php echo $row['FA2']; ?></td>
                                <td><?php echo $row['FA3'];?></td>
                                <td><?php echo $row['FA4'];?></td>
                                <td><?php echo $row['FAavg'];?></td>
                                <td><?php echo $row['40per'];?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                        <?php } else if($FAamt == 3) { ?>
                        <table class="students-table">
                            <thead>
                                <tr>
                                    <th width="10%" rowspan="2">Program</th>
                                    <th width="10%" rowspan="2">Section</th>
                                    <th width="10%" rowspan="2">Student Number</th>
                                    <th rowspan="2">Student Name</th>
                                    <th width="10%">FA 1</th>
                                    <th width="10%">FA 2</th>
                                    <th width="10%">FA 3</th>
                                    <th width="10%" rowspan="2">Average</th>
                                    <th width="10%" rowspan="2">40%</th>
                                </tr>
                                <?php $row = $maxscore->fetch_assoc() ?>
                                <tr>
                                    <th><?php echo $row['FA1max']?></th>
                                    <th><?php echo $row['FA2max']?></th>
                                    <th><?php echo $row['FA3max']?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                    while($row = $studData->fetch_assoc()) {?>
                                <tr>
                                    <td><?php echo $row['studProg'];?></td>
                                    <td><?php echo $row['section'];?></td>
                                    <td><?php echo $row['studNum'];?></td>
                                    <td><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                                    <td><?php echo $row['FA1'];?></td>
                                    <td><?php echo $row['FA2']; ?></td>
                                    <td><?php echo $row['FA3'];?></td>
                                    <td><?php echo $row['FAavg'];?></td>
                                    <td><?php echo $row['40per'];?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                            <?php } else if($FAamt == 2) { ?>
                            <table class="students-table">
                                <thead>
                                    <tr>
                                        <th width="10%" rowspan="2">Program</th>
                                        <th width="10%" rowspan="2">Section</th>
                                        <th width="10%" rowspan="2">Student Number</th>
                                        <th rowspan="2">Student Name</th>
                                        <th width="10%">FA 1</th>
                                        <th width="10%">FA 2</th>
                                        <th width="10%" rowspan="2">Average</th>
                                        <th width="10%" rowspan="2">40%</th>
                                    </tr>
                                    <?php $row = $maxscore->fetch_assoc() ?>
                                    <tr>
                                        <th><?php echo $row['FA1max']?></th>
                                        <th><?php echo $row['FA2max']?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                    while($row = $studData->fetch_assoc()) {?>
                                    <tr>
                                        <td><?php echo $row['studProg'];?></td>
                                        <td><?php echo $row['section'];?></td>
                                        <td><?php echo $row['studNum'];?></td>
                                        <td><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                                        <td><?php echo $row['FA1'];?></td>
                                        <td><?php echo $row['FA2']; ?></td>
                                        <td><?php echo $row['FAavg'];?></td>
                                        <td><?php echo $row['40per'];?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                                <?php } else if($FAamt == 1) { ?>
                                <table class="students-table">
                                    <thead>
                                        <tr>
                                            <th width="10%" rowspan="2">Program</th>
                                            <th width="10%" rowspan="2">Section</th>
                                            <th width="10%" rowspan="2">Student Number</th>
                                            <th rowspan="2">Student Name</th>
                                            <th width="20%">FA 1</th>
                                            <th width="10%" rowspan="2">Average</th>
                                            <th width="10%" rowspan="2">40%</th>
                                        </tr>
                                        <?php $row = $maxscore->fetch_assoc() ?>
                                        <tr>
                                            <th><?php echo $row['FA1max']?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                    while($row = $studData->fetch_assoc()) {?>
                                        <tr>
                                            <td><?php echo $row['studProg'];?></td>
                                            <td><?php echo $row['section'];?></td>
                                            <td><?php echo $row['studNum'];?></td>
                                            <td><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                                            <td><?php echo $row['FA1'];?></td>
                                            <td><?php echo $row['FAavg'];?></td>
                                            <td><?php echo $row['40per'];?></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                    <?php }
}
?>