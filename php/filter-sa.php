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
        echo "";
    } else {
        echo $data;
    }
    $query = "SELECT s.sumID, s.modID, s.studNum, s.SA1, s.SA2, s.SA3, s.SAavg, si.lastName, si.firstName, si.studProg 
            FROM summative AS s
            LEFT JOIN studentinfo AS si ON s.studNum = si.studNum
            WHERE si.section IN ('$data') AND modID = $modID
            ORDER BY si.lastName ASC";  
    $studData = $db->query($query);

    $section = "SELECT SA1max, SA2max, SA3max FROM maxscore WHERE modID = $modID";
    $result = $db->query($section);

            if (!$studData && !$result) {
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
                            <th>SA 1</th>
                            <th>SA 2</th>
                            <th>SA 3</th>
                            <th>Average</th>
                        </tr>
                    <?php $row = $result->fetch_assoc() ?>
                        <tr>
                            <th>Program</th>
                            <th>Student Number</th>
                            <th>Student Name</th>
                            <th><?php echo $row['SA1max'];?></th>
                            <th><?php echo $row['SA2max']; ?></th>
                            <th><?php echo $row['SA3max'];?></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php while($row = $studData->fetch_assoc()) {?>
                    <tr>
                        <td class="student-data-module"><?php echo $row['studProg'];?></td>
                        <td class="student-data-module"><?php echo $row['studNum'];?></td>
                        <td class="student-data-module"><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                        <td class="student-data-module"><?php echo $row['SA1'];?></td>
                        <td class="student-data-module"><?php echo $row['SA2']; ?></td>
                        <td class="student-data-module"><?php echo $row['SA3'];?></td>
                        <td class="student-data-module"><?php echo $row['SAavg'];?></td>
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