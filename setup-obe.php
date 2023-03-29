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
    <fieldset>
        <legend>Setup Course Info</legend>
        <label>Program:&emsp;<select name="program[]">
            <option value="0" selected="selected" hidden>Select from the dropdown</option>
            <?php
                foreach($studProg as $key => $value) {
                    echo '<option value='.$studProg[$key]['studProg'] . '>' .
                    $studProg[$key]['studProg'] . '</option>';
                }?>
        </select></label>
        <label for="schoolYear">SY:&emsp;<input type="number" name="schoolYear"></label>
        <label for="schoolTerm">Term:&emsp;<input type="number" name="schoolTerm" min="1" maxlength="1" oninput="this.value=this.value.slice(0,this.maxLength)">Q</label><br><br>
        <label for="courseCode">Course Code:&emsp;<input type="text" name="courseCode"></label>
        <label for="courseTitle">Course Title:&emsp;<input type="text" name="courseTitle"></label>
    </fieldset><br>
    <fieldset>
        <legend>Setup OBE Course Assessment Details</legend>
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
            <td><textarea name="CO1" rows="5" cols="50"></textarea></td>
            <td><textarea type="text" name="Contribution 1" rows="5" cols="21" min="1" maxLength="3" oninput="this.value=this.value.slice(0,this.maxLength)"></textarea></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            <tr>
            <td>2</td>
            <td><textarea name="CO2" rows="5" cols="50"></textarea></td>
            <td><textarea name="Contribution 2" rows="5" cols="21" min="1" maxLength="3" oninput="this.value=this.value.slice(0,this.maxLength)"></textarea></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            <tr>
            <td>3</td>
            <td><textarea name="CO3" rows="5" cols="50"></textarea></td>
            <td><textarea name="Contribution 3" rows="5" cols="21" min="1" maxLength="3" oninput="this.value=this.value.slice(0,this.maxLength)"></textarea></td>
            </tr>
        </table>
    </fieldset>
    </div>
</body>
</html>