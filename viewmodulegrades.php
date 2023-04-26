<?php
    require_once("php/dbConfig.php");
    include("php-compute/grades.php");
    include("php/navbar.php");
    include("php/session_start.php");
    $courseCode = implode($_SESSION['courseTitle']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Module Grades</title>
</head>

<body>
    <h1>View Module Grades</h1>
    <button onclick="window.location.href='php-forms/setup-obe.php'">Setup OBE Course Assessment</button>
    <?php
        $section = $db->query("SELECT DISTINCT section FROM runavg WHERE courseCode = '".$courseCode."' ORDER BY section ASC");
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
        <button name="modbtn" value="1" type="submit">Module 1 Grades</button>
        <button name="modbtn" value="2" type="submit">Module 2 Grades</button>
        <button name="modbtn" value="3" type="submit">Module 3 Grades</button>
    </form>
</body>
</html>

<?php
    if(isset($_GET['modbtn'])) {
        $section = implode($_GET['section']);
        $modNum = $_GET['modbtn'];
        if ($section == 0) {
            echo "<script>alert('Select a section from the dropdown')</script>";
            echo "<script>window.location.href='viewmodulegrades.php'</script>";
        } else {?>
            <h4>Module <?php echo $modNum;?></h4>
            <?php echo $section;
        }
        $studData = $db->query("SELECT r.studNum, r.section, r.studProg, r.modNum, r.grade, r.transmutation, si.lastName, si.firstName
        FROM runavg AS r
        LEFT JOIN studentinfo AS si ON si.studNum = r.studNum
        WHERE r.section IN ('$section') AND modNum = $modNum AND R.courseCode = '".$courseCode."'
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
            $grade = $row['grade'];
            $transmutation = $row['transmutation'];?>
            <tbody>
                <tr>
                    <td class="student-data-module"><?php echo $studProg?></td>
                    <td class="student-data-module"><?php echo $section?></td>
                    <td class="student-data-module"><?php echo $studNum?></td>
                    <td class="student-data-module"><?php echo $lastName . ", " . $firstName?></td>
                    <td class="student-data-module"><?php echo $grade?></td>
                    <td class="student-data-module"><?php echo $transmutation?></td>
                </tr>
            </tbody>
        <?php } ?>
        </table>   
   <?php }
?>