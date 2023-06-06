<?php
    require("php/dbConfig.php");
    require_once("php/session_start.php");
    include("php/navbar.php");
    include("php-process/totalgrades.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Module Grades</title>
</head>
<body>
    <div class="container" id="container">
        <span class="title">View Module Grades</span>
        <div class="obe-setup">
            <button onclick="window.location.href='php-forms/setup-obe.php'" class="sh rad">Setup OBE Course Assessment</button>
        </div>
        <?php
            $section = $db->query("SELECT DISTINCT section FROM runavg WHERE courseCode = '".$courseCode."'");
            $sections = array();
            if(mysqli_num_rows($section) > 0) {
                while($row = $section->fetch_assoc()) {
                    $sections[] = $row;
                }
            }
        ?>
        <div class="select-section-obe">
            <form action="" method="post" style="display:flex">
                <select name="section[]" style="height: 5vh; margin-right: 1vw">
                    <option value="0" name="section" selected="selected" hidden>Filter Sections</option>
                    <?php
                        foreach($sections as $key=>$value) {
                            echo '<option value=' . $sections[$key]['section'] . '>' . $sections[$key]['section'] . '</option>';
                        }
                    ?>
                </select>
                <div>
                    <p style="padding: 0; margin: 0;">Select a module below to view summarized grades</p>
                    <button name="modbtn" value="1" type="submit" class="sh rad">Module 1 Grades</button>
                    <button name="modbtn" value="2" type="submit" class="sh rad">Module 2 Grades</button>
                    <button name="modbtn" value="3" type="submit" class="sh rad">Module 3 Grades</button>
                </div>
            </form>
        </div>
</body>
</html>

<?php
    if(isset($_POST['modbtn'])) {
        $section = implode($_POST['section']);
        $modNum = $_POST['modbtn'];
        if ($section == 0) {
            echo "<script>alert('Select a section from the dropdown')</script>";
            echo "<script>window.location.href='viewmodulegrades.php'</script>";
        } else {
            $studData = $db->query("SELECT r.username, r.section, r.studProg, r.modNum, r.grade, r.transmutation, si.lastName, si.firstName
            FROM runavg AS r
            LEFT JOIN studentinfo AS si ON si.username = r.username
            WHERE r.section IN ('$section') AND modNum = $modNum AND r.courseCode = '" . $courseCode . "'
            ORDER BY si.lastName ASC"); ?>
            <table class="students-table">
                <thead>
                    <tr>
                        <th colspan="6"><?php echo "Module " . $modNum?></th>
                    </tr>
                    <tr>
                        <th>Program</th>
                        <th>Section</th>
                        <th>Email Address</th>
                        <th>Name</th>
                        <th>Grade Total</th>
                        <th>Module Grade</th>
                    </tr>
                </thead>
                <?php
                while ($row = $studData->fetch_assoc()) {
                    $username = $row['username'];
                    $section = $row['section'];
                    $studProg = $row['studProg'];
                    $lastName = $row['lastName'];
                    $firstName = $row['firstName'];
                    $grade = $row['grade'];
                    $transmutation = $row['transmutation']; ?>
                    <tbody>
                        <tr>
                            <td class="student-data-module"><?php echo $studProg ?></td>
                            <td class="student-data-module"><?php echo $section ?></td>
                            <td class="student-data-module"><?php echo $username ?></td>
                            <td class="student-data-module"><?php echo $lastName . ", " . $firstName ?></td>
                            <td class="student-data-module"><?php echo $grade ?></td>
                            <td class="student-data-module"><?php echo $transmutation ?></td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
    </div>
        <?php }
    }
?>