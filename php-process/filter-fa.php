<?php 
    require("php/dbConfig.php");
    $sql = $db->query("SELECT DISTINCT section FROM studentinfo ORDER BY section ASC");
    $sections = array();
    if(mysqli_num_rows($sql)>0){
        while($row = mysqli_fetch_assoc($sql)) {
            $sections[] = $row;
        }
    }
    $maxscore = $db->query("SELECT * FROM maxscore WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
    $tblamt = $db->query("SELECT * FROM tblamt WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
    $row = $tblamt->fetch_assoc();
    $FAamt = $row['FAamt'];
?>
    <div class="select-section">
        <form action="" method="POST">
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
<?php
if(isset($_POST['submit'])) {
    $_SESSION['section'] = $_POST['section'];
}
if(isset($_SESSION['section'])) {
    $section = implode($_SESSION['section']);

    if ($section == 0) {
        echo "<script>alert('Select a section from the dropdown')</script>";?>
            <table class="students-table">
                <thead>
                    <tr>
                        <th width="5%" rowspan="2">Program</th>
                        <th width="5%" rowspan="2">Section</th>
                        <th width="10%" rowspan="2">Student Number</th>
                        <th rowspan="2">Student Name</th>

                        <?php 
                        $row = $maxscore->fetch_assoc();
                        $faColumns = min($FAamt, 10);
                        for ($i = 1; $i <= $faColumns; $i++) {
                            echo "<th width='5%'>FA $i</th>";
                        }
                        ?>

                        <th width="5%" rowspan="2">Average</th>
                        <th width="5%" rowspan="2">40%</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $maxColspan = 16;
                        $minFAamt = 1;
                        $maxFAamt = 10;
                        
                        if ($FAamt >= $minFAamt && $FAamt <= $maxFAamt) {
                            $colspan = $maxColspan - ($maxFAamt - $FAamt);
                            echo '<tr><td colspan="' . $colspan . '">No section selected...</td></tr>';
                        }                        
                    ?>
                </tbody>
            </table>
    <?php } else {
            $studData = $db->query("SELECT f.formID, f.section, f.modNum, f.studNum, f.FA1, f.FA2, f.FA3, f.FA4, f.FA5, f.FA6, f.FA7, f.FA8, f.FA9, f.FA10, f.40per, f.FAavg, si.lastName, si.firstName, si.studProg 
                        FROM formative AS f 
                        LEFT JOIN studentinfo AS si ON f.studNum = si.studNum 
                        WHERE si.section IN ('$section') AND modNum = $modNum AND f.courseCode = '".$courseCode."'
                        ORDER BY si.lastName ASC");

            if (!$maxscore && !$studData && !$tblamt) {
                echo mysqli_error($db);
            }
            ?>

            <table class="students-table">
                <thead>
                    <tr>
                        <th width="5%" rowspan="2">Program</th>
                        <th width="5%" rowspan="2">Section</th>
                        <th width="10%" rowspan="2">Student Number</th>
                        <th rowspan="2">Student Name</th>

                        <?php 
                        $row = $maxscore->fetch_assoc();
                        $faColumns = min($FAamt, 10);
                        for ($i = 1; $i <= $faColumns; $i++) {
                            echo "<th width='5%'>FA $i</th>";
                        }
                        ?>

                        <th width="5%" rowspan="2">Average</th>
                        <th width="5%" rowspan="2">40%</th>
                    </tr>
                    <tr>
                        <?php 
                        for ($i = 1; $i <= $faColumns; $i++) {
                            echo "<th>" . $row["FA{$i}max"] . "</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row = $studData->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['studProg']}</td>";
                        echo "<td>{$row['section']}</td>";
                        echo "<td>{$row['studNum']}</td>";
                        echo "<td>{$row['lastName']}, {$row['firstName']}</td>";
                        
                        for ($i = 1; $i <= $faColumns; $i++) {
                            echo "<td>{$row["FA{$i}"]}</td>";
                        }

                        echo "<td>{$row['FAavg']}</td>";
                        echo "<td>{$row['40per']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
<?php
            }
}
?>