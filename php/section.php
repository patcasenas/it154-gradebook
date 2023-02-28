<?php 
require("dbConfig.php");
$sql = "SELECT DISTINCT section FROM studentinfo";
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
if(isset($_GET['submit'])) {
    $data = implode($_GET['section']);
    $query = "SELECT s.sumID, s.modID, s.studNum, s.SA1, s.SA2, s.SA3, s.SAavg, si.lastName, si.firstName, si.studProg 
            FROM summative AS s
            LEFT JOIN studentinfo AS si ON s.studNum = si.studNum
            WHERE section IN ('$data')";
            
    $query1 = $query . "AND modID = '1' ORDER BY si.lastName ASC";
            $result = $db->query($query1);
            if (!$result) {
                echo mysqli_error($db);
            } else {
                mysqli_error($db);
           }
}
?>