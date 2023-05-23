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
        <form method="get">
            <select name="section[]">
                <option value="0" selected="selected" hidden>Filter Sections</option>
                <?php
                    foreach($sections as $key => $value) {
                        echo '<option value='.$sections[$key]['section'] . '>' . '&#160;'.
                        $sections[$key]['section'] . '</option>';
                    }?>
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
    $courseCode = implode($_SESSION['courseTitle']);
    $modNum = session_id();
    if ($section == 0) {
        echo "<script>alert('Select a section from the dropdown')</script>";
    } 
        $studData = $db->query("SELECT s.sumID, s.section, s.modNum, s.studNum, s.SA1, s.SA2, s.SA3, s.SAavg, s.60per, si.lastName, si.firstName, si.studProg 
                                FROM summative AS s 
                                LEFT JOIN studentinfo AS si ON s.studNum = si.studNum 
                                WHERE si.section IN ('$section') AND s.modNum = $modNum AND s.courseCode = '".$courseCode."'
                                ORDER BY si.lastName ASC");  
        $maxscore = $db->query("SELECT * FROM maxscore WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
        $tblamt = $db->query("SELECT * FROM tblamt WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
        $row = $tblamt->fetch_assoc();
        $SA = $row['SAamt'];
        if (!$studData && !$maxscore && !$tblamt) {
            echo mysqli_error($db);
        } 
        else if ($SA == 3){ ?>
<table class="students-table">
    <thead>
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
    </thead>
    <tbody>
        <?php while($row = $studData->fetch_assoc()) {?>
        <tr>
            <td><?php echo $row['studProg'];?></td>
            <td><?php echo $row['section'];?></td>
            <td><?php echo $row['studNum'];?></td>
            <td><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
            <td><?php echo $row['SA1'];?></td>
            <td><?php echo $row['SA2']; ?></td>
            <td><?php echo $row['SA3'];?></td>
            <td><?php echo $row['SAavg'];?></td>
            <td><?php echo $row['60per'];?>%</td>
        </tr>
        <?php }?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <th>Total passed</th>
            <?php 
                            $sql = $db->query("SELECT SA1max, SA2max, SA3max FROM maxscore WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
                            $row = $sql->fetch_assoc();
                            $totalPass1 = $row['SA1max'] * 0.70;
                            $totalPass2 = $row['SA2max'] * 0.70;
                            $totalPass3 = $row['SA3max'] * 0.70;
                            $sql1 = $db->query("SELECT SA1, SA2, SA3 FROM summative WHERE modNum = $modNum AND courseCode = '".$courseCode."' AND section = '".$section."'");
                            $count = 0;
                            $count2 = 0;
                            $count3 = 0;
                            while($row = $sql1->fetch_assoc()) {
                                $SA1 = $row['SA1'];
                                $SA2 = $row['SA2'];
                                $SA3 = $row['SA3'];
                                for($i=0;$i<mysqli_num_rows($sql1);$i++) {
                                    if($SA1>=$totalPass1) {
                                        $count++;
                                        break;
                                    }
                                }
                                for($i=0;$i<mysqli_num_rows($sql1);$i++) {
                                    if($SA2>=$totalPass2) {
                                        $count2++;
                                        break;
                                    }
                                }
                                for($i=0;$i<mysqli_num_rows($sql1);$i++) {
                                    if($SA2>=$totalPass3) {
                                        $count3++;
                                        break;
                                    }
                                }
                            }?>
            <td><?php echo $count; ?></td>
            <td><?php echo $count2; ?></td>
            <td><?php echo $count3; ?></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
<?php } else if ($SA == 2) { ?>
<table class="students-table">
    <thead>
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
    </thead>
    <tbody>
        <?php while($row = $studData->fetch_assoc()) {?>
        <tr>
            <td><?php echo $row['studProg'];?></td>
            <td><?php echo $row['section'];?></td>
            <td><?php echo $row['studNum'];?></td>
            <td><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
            <td><?php echo $row['SA1'];?></td>
            <td><?php echo $row['SA2']; ?></td>
            <td><?php echo $row['SAavg'];?></td>
            <td><?php echo $row['60per'];?>%</td>
        </tr>
        <?php }?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <th>Total passed</th>
            <?php 
                            $sql = $db->query("SELECT SA1max, SA2max FROM maxscore WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
                            $row = $sql->fetch_assoc();
                            $totalPass1 = $row['SA1max'] * 0.70;
                            $totalPass2 = $row['SA2max'] * 0.70;
                            $sql1 = $db->query("SELECT SA1, SA2 FROM summative WHERE modNum = $modNum AND courseCode = '".$courseCode."' AND section = '".$section."'");
                            $count = 0;
                            $count2 = 0;
                            while($row = $sql1->fetch_assoc()) {
                                $SA1 = $row['SA1'];
                                $SA2 = $row['SA2'];
                                for($i=0;$i<mysqli_num_rows($sql1);$i++) {
                                    if($SA1>=$totalPass1) {
                                        $count++;
                                        break;
                                    }
                                }
                                for($i=0;$i<mysqli_num_rows($sql1);$i++) {
                                    if($SA2>=$totalPass2) {
                                        $count2++;
                                        break;
                                    }
                                }
                            }?>
            <td><?php echo $count; ?></td>
            <td><?php echo $count2; ?></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
<?php } else if ($SA == 1) { ?>
<table class="students-table">
    <thead>
        <tr>
            <th width="10%" rowspan="2">Program</th>
            <th width="10%" rowspan="2">Section</th>
            <th width="10%" rowspan="2">Student Number</th>
            <th rowspan="2">Student Name</th>
            <th width="20%">SA 1</th>
            <th width="10%" rowspan="2">Average</th>
            <th width="10%" rowspan="2">60%</th>
        </tr>
        <?php $row = $maxscore->fetch_assoc() ?>
        <tr>
            <th><?php echo $row['SA1max'];?></th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $studData->fetch_assoc()) {?>
        <tr>
            <td><?php echo $row['studProg'];?></td>
            <td><?php echo $row['section'];?></td>
            <td><?php echo $row['studNum'];?></td>
            <td><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
            <td><?php echo $row['SA1'];?></td>
            <td><?php echo $row['SAavg'];?></td>
            <td><?php echo $row['60per'];?>%</td>
        </tr>
        <?php }?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <th>Total passed</th>
            <td><?php 
                            $sql = $db->query("SELECT SA1max FROM maxscore WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
                            $row = $sql->fetch_assoc();
                            $totalPass = $row['SA1max'] * 0.70;
                            $sql1 = $db->query("SELECT SA1 FROM summative WHERE modNum = $modNum AND courseCode = '".$courseCode."' AND section = '".$section."'");
                            $count = 0;
                            while($row = $sql1->fetch_assoc()) {
                                $SA1 = $row['SA1'];
                                for($i=0;$i<mysqli_num_rows($sql1);$i++) {
                                    if($SA1>=$totalPass) {
                                        $count++;
                                        break;
                                    }
                                }
                            }
                            echo $count;
                            ?></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
<?php }
} ?>