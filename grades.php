<?php 
    require_once("php/dbConfig.php");
    include("phpcompute/grades.php");
    include("php/navbar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Module Grades</title>
</head>
<body>
    <?php
        $studData = $db->query("SELECT r.studNum, r.section, r.studProg, r.modID, r.gradeTotal, r.transmutation, si.lastName, si.firstName
        FROM runavg AS r
        LEFT JOIN studentinfo AS si ON si.studNum = r.studNum
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
            <a href=""></a>
        <?php while ($row = $studData->fetch_assoc()) {
            $studNum = $row['studNum'];
            $section = $row['section'];
            $studProg = $row['studProg'];
            $lastName = $row['lastName'];
            $firstName = $row['firstName'];
            $modID = $row['modID'];
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
</body>
</html>