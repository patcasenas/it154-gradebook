<?php
require_once("dbConfig.php");
$section = $db->query("SELECT DISTINCT section FROM runavg ORDER BY section ASC");
$sections = array();
if(mysqli_num_rows($section)>0) {
    while($row = $section->fetch_assoc()){
        $sections[] = $row;
    }
}
// echo '<pre>' . print_r($sections) . '</pre>';
?>
<form method="get">
        <select name="section[]">
            <option value="0" selected="selected" hidden> Filter Sections</option>
            <?php
                foreach($sections as $key => $value) {
                    echo '<option value='.$sections[$key]['section'] . '>' . 
                    $sections[$key]['section'] . '</option>';
                }?>
        </select>
        <button name="modbtn" value="1" type="submit">Module 1</button>
        <button name="modbtn" value="2" type="submit">Module 2</button>
        <button name="modbtn" value="3" type="submit">Module 3</button>
    </form>

    <?php
        if(isset($_GET['modbtn'])) {
            $modbtn = $_GET['modbtn'];
            $_SESSION['filter'] = $_GET['section'];
        }
        if(isset($_SESSION['filter'])) {
            $data = implode($_SESSION['filter']);
            if ($data == 0) {
                echo "<script>alert('Select a section from the dropdown')</script>";
                echo "<script>window.location.href='viewmodulegrades.php'</script>";
            } else {
                echo $data;
            }
            $studData = $db->query("SELECT r.studNum, r.section, r.studProg, r.modID, r.gradeTotal, r.transmutation, si.lastName, si.firstName
            FROM runavg AS r
            LEFT JOIN studentinfo AS si ON si.studNum = r.studNum
            WHERE r.section IN ('$data') AND modID = $modbtn
            ORDER BY si.lastName ASC");?>

            <table class="students-table">
            <thead>
                <tr>
                    <th>Program</th>
                    <th>Section</th>
                    <th>Student Number</th>
                    <th>Name</th>
                    <th>Grade Total</th>
                    <th>Module Grade</th>
                </tr>
            </thead>
    
            <?php 
                while ($row = $studData->fetch_assoc()) {
                $studNum = $row['studNum'];
                $section = $row['section'];
                $studProg = $row['studProg'];
                $lastName = $row['lastName'];
                $firstName = $row['firstName'];
                $gradeTotal = $row['gradeTotal'];
                $transmutation = $row['transmutation'];?>
                <tbody>
                    <tr>
                        <td class="student-data-module"><?php echo $studProg?></td>
                        <td class="student-data-module"><?php echo $section?></td>
                        <td class="student-data-module"><?php echo $studNum?></td>
                        <td class="student-data-module"><?php echo $lastName . ", " . $firstName?></td>
                        <td class="student-data-module"><?php echo $gradeTotal?></td>
                        <td class="student-data-module"><?php echo $transmutation?></td>
                    </tr>
                </tbody>
            <?php } ?>
            </table>    
        <?php } ?>