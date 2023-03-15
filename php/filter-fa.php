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

            }else {
               include("php/fa-studentData.php");
           }
} else {
    echo "Select a section from the dropdown";
}
?>