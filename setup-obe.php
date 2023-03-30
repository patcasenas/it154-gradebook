<?php
    require_once("php/dbConfig.php");
    include("php/navbar.php");
    $program = $db->query("SELECT DISTINCT studProg FROM soitprogram ORDER BY studProg ASC");
    $studProg = array();
    if(mysqli_num_rows($program)>0) {
        while($row = $program->fetch_assoc()) {
            $studProg[] = $row;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Setup OBE Course Assessment</title>
</head>
<body>
    <div class="container">
    <h1>Setup OBE Course Assessment</h1>
    <form action="php/setup-obe.php" method="post">
    <fieldset>
        <legend>Setup Course Info</legend>
        <label>Program:&emsp;<select name="program[]">
            <option value="0" selected="selected" hidden>Select from the dropdown</option>
            <?php
                foreach($studProg as $key => $value) {
                    echo '<option value='.$studProg[$key]['studProg'] . '>' .
                    $studProg[$key]['studProg'] . '</option>';
                }?>
        </select></label><br><br>
        <label for="schoolYear">SY:&emsp;<input type="number" name="schoolYear"></label>
        <label for="schoolTerm">Term:&emsp;<input type="number" name="schoolTerm" min="1" maxlength="1" oninput="this.value=this.value.slice(0,this.maxLength)">Q</label><br><br>
        <label for="courseCode">Course Code:&emsp;<input type="text" name="courseCode"></label><br><br>
        <label for="courseTitle">Course Title:&emsp;<input type="text" name="courseTitle"></label>
    </fieldset><br>
    <fieldset>
        <legend>OBE Course Assessment Details</legend>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th colspan="2">Assessments</th>
                    <th></th>
                    <th colspan="2">No. of Students who Satisfied the Outcomes/Quarter</th>
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
                    <th>Frequency</th>
                    <th>%</th>
                    <th rowspan="2">Recommendation</th>
                </tr>
            </thead>
            <tr>
            <td>1</td>
            <td><textarea name="CO1" required></textarea></td>
            <td><textarea name="contribution1" min="1" maxLength="3" oninput="this.value=this.value.slice(0,this.maxLength)" required></textarea></td>
            <td><textarea name="task1" min="1" maxLength="10" oninput="this.value=this.value.slice(0,this.maxLength)" required></textarea></td>
            <td><input type="number" name="satisfactory1" value="70" min="1" maxLength="2" oninput="this.value=this.value.slice(0,this.maxLength)" required></td>
            <td><input type="number" name="target1" value="70" min="1" maxLength="2" oninput="this.value=this.value.slice(0,this.maxLength)" required></td>
            <td><input type="number" name="freq1" required></td>
            <td><input type="number" name="freqper1" required></td>
            <td><textarea name="recommendation1" required></textarea></td>
            </tr>
            <tr>
            <td>2</td>
            <td><textarea name="CO2"></textarea></td>
            <td><textarea name="contribution2" min="1" maxLength="3" oninput="this.value=this.value.slice(0,this.maxLength)"></textarea></td>
            <td><textarea name="task2"></textarea></td>
            <td><textarea name="satisfactory2"></textarea></td>
            <td><textarea name="target2"></textarea></td>
            <td><textarea name="freq2"></textarea></td>
            <td><textarea name="freqper2"></textarea></td>
            <td><textarea name="recommendation2"></textarea></td>
            </tr>
            <tr>
            <td>3</td>
            <td><textarea name="CO3"></textarea></td>
            <td><textarea name="contribution3" min="1" maxLength="3" oninput="this.value=this.value.slice(0,this.maxLength)"></textarea></td>
            <td><textarea name="task3"></textarea></td>
            <td><textarea name="satisfactory3"></textarea></td>
            <td><textarea name="target3"></textarea></td>
            <td><textarea name="freq3"></textarea></td>
            <td><textarea name="freqper3"></textarea></td>
            <td><textarea name="recommendation3"></textarea></td>
            </tr>
        </table>
    </fieldset><br>
    <input type="reset" value="Reset">
    <input type="submit" value="Save" name="save">
    </form>
    </div>
</body>
</html>