<?php 
require("php/dbConfig.php");
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
<form action="php/displayData.php" method="post">
    <select name="section[]">
    <option value="0" selected="selected" hidden>Filter Sections</option>
    <?php
    foreach($sections as $key => $value) {
        // echo $section['section'];
        echo '<option value='.$sections[$key]['section'] . '>' . 
        $sections[$key]['section'] . '</option>';
    }
    ?>
    </select>
    <input type="submit" name="submit">
</form>
</body>
</html>