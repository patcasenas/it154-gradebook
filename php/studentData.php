<table class="students-table">
    <thead>
        <tr>
            <th>Program</th>
            <th>Student Number</th>
            <th>Student Name</th>
            <th>SA 1</th>
            <th>SA 2</th>
            <th>SA 3</th>
            <th>Average</th>
        </tr>
    </thead>
    <?php
require_once("dbConfig.php");
while($row = $result->fetch_assoc()) {?>
    <tr>
        <td class="student-data-module"><?php echo $row['studProg'];?></td>
        <td class="student-data-module"><?php echo $row['studNum'];?></td>
        <td class="student-data-module"><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
        <td class="student-data-module"><?php echo $row['SA1'];?></td>
        <td class="student-data-module"><?php echo $row['SA2']; ?></td>
        <td class="student-data-module"><?php echo $row['SA3'];?></td>
        <td class="student-data-module"><?php echo $row['SAavg'];?></td>
    </tr>
    <?php }?>
    <tbody>
    </tbody>
</table>