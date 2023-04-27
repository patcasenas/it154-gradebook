<?php
    require("../php/dbConfig.php");
    include("../php/navbar.php");
    require("../php/session_start.php");
    $program = $db->query("SELECT DISTINCT studProg FROM soitprogram ORDER BY studProg ASC");
    $studProg = array();
    if(mysqli_num_rows($program)>0) {
        while($row = $program->fetch_assoc()) {
            $studProg[] = $row;
        }
    }
    $courseCode = implode($_SESSION['courseTitle']);
    $sql = $db->query("SELECT courseTitle FROM courseinfo WHERE courseCode = '".$courseCode."'");
    $row = $sql->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Setup OBE Course Assessment</title>
</head>
<body>
    <h1>Setup OBE Course Assessment</h1>
    <form action="../php-process/obe-print.php" method="post" target='_blank'>
        <fieldset>
            <legend>Setup Course</legend>
            <label>Program:&emsp;<select name="program[]">
                <option value="0" selected="selected" hidden>Select a Program</option>
                <?php
                    foreach($studProg as $key => $value) {
                        echo '<option value='.$studProg[$key]['studProg'] . '>'.
                        $studProg[$key]['studProg'] . '</option>';
                    }
                ?>
            </select></label><br><br>
            <label for="SY">SY:&emsp;20<input type="number" name="SYstart" min="22" value="22">- 20<input type="number" name="SYend" min="23" value="23"></label><br><br>
            <label for="term">Term:&emsp;<input type="number" name="term" min="1" max="4">Q</label><br><br>
            <label for="courseCode">Course Code:&emsp;<input type="text" value=<?php echo $courseCode?> name="courseCode" readonly></label><br><br>
            <label for="courseTitle">Course Title:&emsp;<input type="text" value=<?php echo "'".$row['courseTitle']."'"?> name="courseTitle" readonly></label>
        </fieldset><br>

        <fieldset>
            <legend>OBE Course Assessment Details</legend>
            <table>
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th colspan="3">Assessments</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th></th>
                    <th rowspan="2">Course Outcomes</th>
                    <th rowspan="2">Contribution to SO</th>
                    <th>Assessment Task</th>
                    <th>Min. Satisfactory (%)</th>
                    <th>Target No. of Students Passed (%)</th>
                    <th rowspan="2">Recommendation</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CO1</td>
                    <td><textarea name="CO1" required></textarea></td>
                    <td><textarea name="contribution1" min="1" maxLength="3" oninput="this.value=this.value.slice(0,this.maxLength)" required></textarea></td>
                    <td><textarea name="task1" min="1" maxLength="10" oninput="this.value=this.value.slice(0,this.maxLength)" required></textarea></td>
                    <td><input type="number" name="satisfactory1" value="70" min="1" maxLength="2" oninput="this.value=this.value.slice(0,this.maxLength)" required readonly></td>
                    <td><input type="number" name="target1" value="70" min="1" maxLength="2" oninput="this.value=this.value.slice(0,this.maxLength)" required readonly></td>
                    <td><textarea name="recommendation1" required></textarea></td>
                </tr>
                <tr>
                    <td>CO2</td>
                    <td><textarea name="CO2"></textarea></td>
                    <td><textarea name="contribution2" min="1" maxLength="3" oninput="this.value=this.value.slice(0,this.maxLength)"></textarea></td>
                    <td><textarea name="task2"></textarea></td>
                    <td><input type="number" name="satisfactory2" value="70" min="1" maxLength="2" oninput="this.value=this.value.slice(0,this.maxLength)" required readonly></td>
                    <td><input type="number" name="target2" value="70" min="1" maxLength="2" oninput="this.value=this.value.slice(0,this.maxLength)" required readonly></td>
                    <td><textarea name="recommendation2"></textarea></td>
                </tr>
                <tr>
                    <td>CO3</td>
                    <td><textarea name="CO3"></textarea></td>
                    <td><textarea name="contribution3" min="1" maxLength="3" oninput="this.value=this.value.slice(0,this.maxLength)"></textarea></td>
                    <td><textarea name="task3"></textarea></td>
                    <td><input type="number" name="satisfactory3" value="70" min="1" maxLength="2" oninput="this.value=this.value.slice(0,this.maxLength)" required readonly></td>
                    <td><input type="number" name="target3" value="70" min="1" maxLength="2" oninput="this.value=this.value.slice(0,this.maxLength)" required readonly></td>
                    <td><textarea name="recommendation3"></textarea></td>
                </tr>
            </tbody>
            </table>
        </fieldset>
        <input type="reset" value="Reset">
        <input type="submit" value="Print" name="save">
    </form>
</body>
</html>