<?php
    require("php/dbConfig.php");
    $sql = $db->query("SELECT DISTINCT section FROM summative WHERE courseCode = '".$courseCode."' ORDER BY section ASC");
    $sections = array();
    if(mysqli_num_rows($sql)>0) {
        while($row = $sql->fetch_assoc()) {
            $sections[] = $row;
        }
    }
    $modNum = $_GET['modNum'];
$maxscore = $db->query("SELECT * FROM maxscore WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
$tblamt = $db->query("SELECT * FROM tblamt WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
$row = $tblamt->fetch_assoc();
$SA = $row['SAamt'];
?>
<div class="select-section">
    <form method="POST">
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
<?php
    if (isset($_POST['submit'])) {
        $_SESSION['section'] = $_POST['section'];
    }

    if (isset($_SESSION['section'])) {
        $section = implode($_SESSION['section']);

        if ($section == 0) {
            echo "<script>alert('Select a section from the dropdown')</script>";?>
            <table class="students-table">
                <thead>
                <tr>
                    <th width="10%" rowspan="2">Program</th>
                    <th width="10%" rowspan="2">Section</th>
                    <th width="10%" rowspan="2">Student Number</th>
                    <th rowspan="2">Student Name</th>
                    <?php if ($SA >= 1) {
                        $row = $maxscore->fetch_assoc(); ?>
                        <th width="10%">SA 1</th>
                    <?php } ?>
                    <?php if ($SA >= 2) { ?>
                        <th width="10%">SA 2</th>
                    <?php } ?>
                    <?php if ($SA >= 3) { ?>
                        <th width="10%">SA 3</th>
                    <?php } ?>
                    <th width="10%" rowspan="2">Average</th>
                    <th width="10%" rowspan="2">60%</th>
                </tr>
                <tr></tr>
                </thead>
                <tbody>
                <tr>
                    <?php if ($SA == 1) {?>
                        <td colspan="7">No section selected...</td>
                    <?php }
                    if ($SA == 2) { ?>
                    <td colspan="8">No section selected...</td>
                    <?php }
                    if ($SA == 3) { ?>
                        <td colspan="9">No section selected...</td>
                    <?php } ?>
                </tr>
                </tbody>
            </table>
        <?php } else {
            $studData = $db->query("SELECT s.sumID, s.section, s.modNum, s.username, s.SA1, s.SA2, s.SA3, s.SAavg, s.60per, si.lastName, si.firstName, si.studProg 
            FROM summative AS s 
            LEFT JOIN studentinfo AS si ON s.username = si.username 
            WHERE si.section IN ('$section') AND s.modNum = $modNum AND s.courseCode = '".$courseCode."'
            ORDER BY si.lastName ASC");  
            if (!$studData && !$maxscore && !$tblamt) {
                echo mysqli_error($db);
            } else { ?>
                <table class="students-table">
                    <thead>
                        <tr>
                            <th width="5%" rowspan="2">Program</th>
                            <th width="5%" rowspan="2">Section</th>
                            <th width="20%" rowspan="2">Email Address</th>
                            <th rowspan="2">Student Name</th>
                            <?php if ($SA >= 1) {
                                $row = $maxscore->fetch_assoc(); ?>
                                <th width="10%">SA 1</th>
                            <?php } ?>
                            <?php if ($SA >= 2) { ?>
                                <th width="10%">SA 2</th>
                            <?php } ?>
                            <?php if ($SA >= 3) { ?>
                                <th width="10%">SA 3</th>
                            <?php } ?>
                            <th width="10%" rowspan="2">Average</th>
                            <th width="10%" rowspan="2">60%</th>
                        </tr>
                        <tr>
                            <?php if ($SA >= 1) { ?>
                                <th><?php echo $row['SA1max']; ?></th>
                            <?php } ?>
                            <?php if ($SA >= 2) { ?>
                                <th><?php echo $row['SA2max']; ?></th>
                            <?php } ?>
                            <?php if ($SA >= 3) { ?>
                                <th><?php echo $row['SA3max']; ?></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $studData->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['studProg']; ?></td>
                                <td><?php echo $row['section']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['lastName'] . ", " . $row['firstName']; ?></td>
                                <?php if ($SA >= 1) { ?>
                                    <td><?php echo $row['SA1']; ?></td>
                                <?php } ?>
                                <?php if ($SA >= 2) { ?>
                                    <td><?php echo $row['SA2']; ?></td>
                                <?php } ?>
                                <?php if ($SA >= 3) { ?>
                                    <td><?php echo $row['SA3']; ?></td>
                                <?php } ?>
                                <td><?php echo $row['SAavg']; ?></td>
                                <td><?php echo $row['60per']; ?>%</td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <th colspan="4">Total passed</th>
                            <?php 
                                $sql = $db->query("SELECT SA1max, SA2max, SA3max FROM maxscore WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
                                $row = $sql->fetch_assoc();
                                $totalPass1 = $row['SA1max'] * 0.70;
                                $totalPass2 = $row['SA2max'] * 0.70;
                                $totalPass3 = $row['SA3max'] * 0.70;
                                $sql1 = $db->query("SELECT SA1, SA2, SA3 FROM summative WHERE modNum = $modNum AND courseCode = '".$courseCode."' AND section = '".$section."'");
                                $count = $count2 = $count3 = 0;
                                
                                while ($row = $sql1->fetch_assoc()) {
                                    $SA1 = $row['SA1'];
                                    $SA2 = $row['SA2'];
                                    $SA3 = $row['SA3'];
                                    
                                    if ($SA1 >= $totalPass1) {
                                        $count++;
                                    }
                                    if ($SA2 >= $totalPass2) {
                                        $count2++;
                                    }
                                    if ($SA3 >= $totalPass3) {
                                        $count3++;
                                    }
                                }
                                ?>
                                <?php if ($SA >= 1) {?>
                                    <td><?php echo $count; ?></td>
                                <?php } if ($SA >= 2) {?>
                                    <td><?php echo $count2; ?></td>
                                <?php } if ($SA >= 3) {?>
                                    <td><?php echo $count3; ?></td>
                                <?php }

                                if ($SA == 3) {
                                    echo '<td></td>
                                        <td></td>';
                                } else if ($SA == 2) {
                                    echo '<td></td>';
                                }?>
                        </tr>
                    </tbody>
                </table>
            <?php }
            }
    } ?>
