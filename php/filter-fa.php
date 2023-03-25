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
    <form action="" method="get">
        <select name="section[]">
            <option value="0" selected="selected" hidden>Filter Sections</option>
            <?php
    foreach($sections as $key => $value) {
        echo '<option value='.$sections[$key]['section'] . '>' . 
        $sections[$key]['section'] . '</option>';
    }
    ?>
        </select>
        <input type="submit" name="submit">
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
        
    } else {
        echo $data;
    }
    $query = "SELECT f.formID, f.modID, f.studNum, f.FA1, f.FA2, f.FA3, f.FA4, f.FA5, f.FA6, f.FA7, f.FA8, f.FA9, f.FA10, f.FAavg, si.lastName, si.firstName, si.studProg 
    FROM formative AS f 
    LEFT JOIN studentinfo AS si ON f.studNum = si.studNum 
    WHERE si.section IN ('$data') AND modID = $modID 
    ORDER BY si.lastName ASC;";
    $studData = $db->query($query);

    $maxscore = "SELECT FA1max, FA2max, FA3max, FA4max, FA5max, FA6max, FA7max, FA8max, FA9max, FA10max FROM maxscore WHERE modID = $modID";           
    $result = $db->query($maxscore);

            if (!$result && !$studData) {
                echo mysqli_error($db);
            } else if ($data == 0) {
                echo "Select a section from the dropdown";

            }else {?>
                <table class="students-table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
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
                <?php $row = $result->fetch_assoc() ?>
                    <tr>
                        <th>Program</th>
                        <th>Student Number</th>
                        <th>Student Name</th>
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
                        <th></th>
                    </tr>
                </thead>
                <?php
                    while($row = $studData->fetch_assoc()) {?>
                <tr>
                    <td class="student-data-module"><?php echo $row['studProg'];?></td>
                    <td class="student-data-module"><?php echo $row['studNum'];?></td>
                    <td class="student-data-module"><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                    <td class="student-data-module"><?php echo $row['FA1'];?></td>
                    <td class="student-data-module"><?php echo $row['FA2']; ?></td>
                    <td class="student-data-module"><?php echo $row['FA3'];?></td>
                    <td class="student-data-module"><?php echo $row['FA4'];?></td>
                    <td class="student-data-module"><?php echo $row['FA5']; ?></td>
                    <td class="student-data-module"><?php echo $row['FA6'];?></td>
                    <td class="student-data-module"><?php echo $row['FA7'];?></td>
                    <td class="student-data-module"><?php echo $row['FA8']; ?></td>
                    <td class="student-data-module"><?php echo $row['FA9'];?></td>
                    <td class="student-data-module"><?php echo $row['FA10'];?></td>
                    <td class="student-data-module"><?php echo $row['FAavg'];?></td>
                </tr>
                <?php }?>
                <tbody>
                </tbody>
            </table>
          <?php }
} else {
    echo "Select a section from the dropdown";
}
?>