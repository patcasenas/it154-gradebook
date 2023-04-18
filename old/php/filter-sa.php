<?php 
require("dbConfig.php");
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
    <form method="get">
        <select name="section[]">
            <option value="0" selected="selected" hidden>Filter Sections</option>
            <?php
                foreach($sections as $key => $value) {
                    echo '<option value='.$sections[$key]['section'] . '>' . 
                    $sections[$key]['section'] . '</option>';
                }?>
        </select>
        <input type="submit" name="submit" value="Filter">
    </form> 
</body>

</html>
<?php
// session_start();
if(isset($_GET['submit'])) {
    $_SESSION['filter'] = $_GET['section'];
}
if(isset($_SESSION['filter'])) {
    $data = implode($_SESSION['filter']);
    $modID = session_id();
    if ($data == 0) {
        echo "<script>alert('Select a section from the dropdown')</script>";
        // echo "<script>javascript:history.go(-1);</script>";
    } else {
        echo $data;
    }

        $studData = $db->query("SELECT s.sumID, s.modID, s.studNum, s.SA1, s.SA2, s.SA3, s.SAavg, s.60per, si.lastName, si.firstName, si.studProg
                                FROM summative AS s
                                LEFT JOIN studentinfo AS si ON s.studNum = si.studNum
                                WHERE si.section IN ('$data') AND s.modID = $modID
                                ORDER BY si.lastName ASC");  
        $maxscore = $db->query("SELECT * FROM maxscore WHERE modID = $modID");
        $tblamt = $db->query("SELECT * FROM `tblamt` WHERE modID = $modID;");
        $row = $tblamt->fetch_assoc(); 
        $SA = $row['SAamt'];
        
        if (!$studData && !$maxscore && !$tblamt) {
            echo mysqli_error($db);
        } 
        else if ($SA == 3){ ?>
            <table class="students-table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>SA 1</th>
                        <th>SA 2</th>
                        <th>SA 3</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php $row = $maxscore->fetch_assoc() ?>
                    <tr>
                        <th>Program</th>
                        <th>Student Number</th>
                        <th>Student Name</th>
                        <th><?php echo $row['SA1max'];?></th>
                        <th><?php echo $row['SA2max']; ?></th>
                        <th><?php echo $row['SA3max'];?></th>
                        <th>Average</th>
                        <th>60%</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = $studData->fetch_assoc()) {?>
                    <tr>
                        <td class="student-data-module"><?php echo $row['studProg'];?></td>
                        <td class="student-data-module"><?php echo $row['studNum'];?></td>
                        <td class="student-data-module"><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                        <td class="student-data-module"><?php echo $row['SA1'];?></td>
                        <td class="student-data-module"><?php echo $row['SA2']; ?></td>
                        <td class="student-data-module"><?php echo $row['SA3'];?></td>
                        <td class="student-data-module"><?php echo $row['SAavg'];?></td>
                        <td class="student-data-module"><?php echo $row['60per'];?>%</td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        <?php } else if ($SA == 2) { ?>
            <table class="students-table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>SA 1</th>
                        <th>SA 2</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php $row = $maxscore->fetch_assoc() ?>
                    <tr>
                        <th>Program</th>
                        <th>Student Number</th>
                        <th>Student Name</th>
                        <th><?php echo $row['SA1max'];?></th>
                        <th><?php echo $row['SA2max']; ?></th>
                        <th>Average</th>
                        <th>60%</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = $studData->fetch_assoc()) {?>
                    <tr>
                        <td class="student-data-module"><?php echo $row['studProg'];?></td>
                        <td class="student-data-module"><?php echo $row['studNum'];?></td>
                        <td class="student-data-module"><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                        <td class="student-data-module"><?php echo $row['SA1'];?></td>
                        <td class="student-data-module"><?php echo $row['SA2']; ?></td>
                        <td class="student-data-module"><?php echo $row['SAavg'];?></td>
                        <td class="student-data-module"><?php echo $row['60per'];?>%</td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        <?php } else if ($SA == 1) { ?>
            <table class="students-table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>SA 1</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php $row = $maxscore->fetch_assoc() ?>
                    <tr>
                        <th>Program</th>
                        <th>Student Number</th>
                        <th>Student Name</th>
                        <th><?php echo $row['SA1max'];?></th>
                        <th>Average</th>
                        <th>60%</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = $studData->fetch_assoc()) {?>
                    <tr>
                        <td class="student-data-module"><?php echo $row['studProg'];?></td>
                        <td class="student-data-module"><?php echo $row['studNum'];?></td>
                        <td class="student-data-module"><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                        <td class="student-data-module"><?php echo $row['SA1'];?></td>
                        <td class="student-data-module"><?php echo $row['SAavg'];?></td>
                        <td class="student-data-module"><?php echo $row['60per'];?>%</td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        <?php }
} ?>