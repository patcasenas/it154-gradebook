<?php
    require("php/dbConfig.php");
    require_once("php/session_start.php");
    include("php/navbar.php");
    // include("php-process/totalgrades.php");
    $courseCode = $_SESSION['courseCode'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Summarized Grades</title>
</head>
<body>
    <div class="container" id="container">
        <span class="title">View Summarized Grades</span>
        <?php
            $section = $db->query("SELECT DISTINCT section FROM runavg WHERE courseCode = '".$courseCode."' ");
            $sections = array();
            if (mysqli_num_rows($section) > 0) {
                while ($row = $section->fetch_assoc()) {
                    $sections[] = $row;
                }
            }
        ?>
        <div class="select-section-obe">
            <form action="" method="post" style="display:flex">
                <select name="section[]" style="height: 5vh; margin-right: 1vw">
                    <option value="0" selected="selected" hidden>Filter Sections</option>
                    <?php
                        foreach($sections as $key => $value) {
                            echo '<option value="' . $sections[$key]['section'] . '">' . $sections[$key]['section'] . '</option>';
                        }
                    ?>
                </select>
                <div>
                    <p style="padding: 0; margin: 0;">Select a module below to view summarized grades</p>
                    <?php
                        $mod = $db->query("SELECT modNum FROM moduleinfo WHERE courseCode = '".$courseCode."'");
                        while ($row = $mod->fetch_assoc()) {
                            $modNum = $row['modNum'];
                            echo '<button name="modbtn" value="'.$modNum.'" type="submit" class="sh rad">Module '.$modNum.' Grades</button>';
                        }
                    ?>
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
            include("php-process/totalgrades.php");
            $studData = $db->query("SELECT r.username, r.section, r.courseCode, r.modNum, r.studProg, r.grade, r.transmutation, si.lastName, si.firstName 
                                    FROM runavg AS r
                                    LEFT JOIN (SELECT lastName, firstName, username FROM studentinfo WHERE courseCode = '".$courseCode."' AND section = '".$section."') AS si ON r.username = si.username
                                    WHERE r.courseCode = '".$courseCode."' AND r.modNum = '".$modNum."' AND r.section = '".$section."'
                                    ORDER BY si.lastName") ?>
            <table class="students-table">
                <thead>
                    <tr>
                        <th colspan="6"><?php echo "Module " . $modNum?></th>
                    </tr>
                    <tr>
                        <th class="program">Program</th>
                        <th class="section">Section</th>
                        <th>Email Address</th>
                        <th>Name</th>
                        <th class="grade-total">Grade Total</th>
                        <th class="module-grade">Module Grade</th>
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