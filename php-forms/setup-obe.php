<?php
    require("../php/dbConfig.php");
    require_once("../php/session_start.php");
    include("../php/navbar.php");
    $program = $db->query("SELECT studProg FROM soitprogram ORDER BY studProg ASC");
    $studProg = array();
    if (mysqli_num_rows($program) > 0) {
        while ($row = $program->fetch_assoc()) {
            $studProg[] = $row;
        }
    }
    // echo '<pre>',print_r($studProg,1),'</pre>';
    $courseCode = $_SESSION['courseCode'];
    $sql = $db->query("SELECT courseTitle FROM courseinfo WHERE courseCode = '".$courseCode."'");
    $row = $sql->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>OBE Course Assessment Setup</title>
</head>
<body>
    <div class="container" id="container">
        <span class="title">OBE Course Assessment Setup</span><br>
        <form action="../php-process/obe-print.php" method="post" target="_blank">
        <form action="" method="post" target="_blank">
            <fieldset>
                <legend>Setup Course</legend>
                <label>Program:&emsp;</label>
                    <select name="program[]" required>
                        <option value="0" selected="selected" hidden>Select a Program</option>
                        <?php
                            foreach ($studProg as $key => $value) {
                                echo '<option value=' . $studProg[$key]['studProg'] . '>' . $studProg[$key]['studProg'] . '</option>';
                            }
                        ?>
                    </select><br><br>
                    <label for="SY">SY:&emsp;</label>20<input type="number" name="SYstart" min="22" value="22">- 20<input type="number" name="SYend" min="23" value="23"><br><br>
                    <label for="term">Term:&emsp;</label><select name="term">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select><br><br>
                    <label for="courseCode">Course Code:&emsp;</label><input type="text" value=<?php echo $courseCode ?> name="courseCode" readonly><br><br>
                    <label for="courseTitle">Course Title:&emsp;</label><input type="text" value=<?php echo "'" . $row['courseTitle'] . "'" ?> name="courseTitle" readonly>
            </fieldset><br>
            <fieldset>
                <legend>OBE Course Assessment Details</legend>
                <table style="width: 100%;" class="table">
                    <thead>
                        <tr>
                            <th rowspan="2"></th>
                            <th rowspan="2">Course Outcomes</th>
                            <th rowspan="2">Contribution to SO</th>
                            <th colspan="2" style="padding:5px;">Assessments</th>
                            <th rowspan="2">Target No. of Students Passed (%)</th>
                            <th rowspan="2">Recommendation</th>
                        </tr>
                        <tr>
                            <th>Assessment Task</th>
                            <th>Min. Satisfactory (%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i <= 3; $i++): ?>
                        <tr>
                            <td>CO<?php echo $i; ?></td>
                            <td><textarea name="CO<?php echo $i; ?>"<?php if ($i === 1) echo ' required'; ?>></textarea></td>
                            <td><textarea name="contribution<?php echo $i; ?>" min="1" maxLength="3"
                                    oninput="this.value=this.value.slice(0,this.maxLength)"></textarea></td>
                            <td><textarea name="task<?php echo $i; ?>"></textarea></td>
                            <td><input type="number" name="satisfactory<?php echo $i; ?>" value="70" min="1" maxLength="2"
                                    oninput="this.value=this.value.slice(0,this.maxLength)" required readonly></td>
                            <td><input type="number" name="target<?php echo $i; ?>" value="70" min="1" maxLength="2"
                                    oninput="this.value=this.value.slice(0,this.maxLength)" required readonly></td>
                            <td><textarea name="recommendation<?php echo $i; ?>"></textarea></td>
                        </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
        </fieldset><br>
        <div class="index-form-btns">
            <input type="reset" value="Reset" id="cancel-btn">
            <input type="submit" value="Print" name="save">
        </div>
        </form>
    </div>
</body>
</html>