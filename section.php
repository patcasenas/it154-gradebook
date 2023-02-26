<?php 
require("php/dbConfig.php");
?>
<html>
<body>
<form action="displayData.php" method="post">
    <select>
    <option value="">Filter Sections</option>
    <?php
    $sql = "SELECT DISTINCT section FROM studentinfo ORDER BY section ASC";
    $result = $db->query($sql);
    if($result->num_rows>0) {
        while($optionData=$result->fetch_assoc()) {
            $option = $optionData['section'];
            ?>
            <option value="<?php echo $option; ?>"><?php echo $option; ?></option>
        <?php }
    }?>
    </select>
    <input type="submit" name="submit">
</form>

</body>
</html>