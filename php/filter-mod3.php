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
    if ($data == 0) {
        
    } else {
        echo $data;
    }
    $query = "SELECT s.sumID, s.modID, s.studNum, s.SA1, s.SA2, s.SA3, s.SAavg, si.lastName, si.firstName, si.studProg 
            FROM summative AS s
            LEFT JOIN studentinfo AS si ON s.studNum = si.studNum
            WHERE si.section IN ('$data') AND modID = '3'
            ORDER BY si.lastName ASC";
            
    $result = $db->query($query);
            if (!$result) {
                echo mysqli_error($db);
            } else if ($data == 0) {
                echo "Select a section from the dropdown";

            }else {
               include("php/studentData.php");
           }
} else {
    echo "Select a section from the dropdown";
}
?>