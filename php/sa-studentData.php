<?php require_once("dbConfig.php"); ?>
<table class="students-table">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>SA 1</th>
            <th>SA 2</th>
            <th>SA 3</th>
            <th>Average</th>
        </tr>
    <?php $row = $result->fetch_assoc() ?>
        <tr>
            <th>Program</th>
            <th>Student Number</th>
            <th>Student Name</th>
            <th><?php echo $row['SA1max'];?></th>
            <th><?php echo $row['SA2max']; ?></th>
            <th><?php echo $row['SA3max'];?></th>
            <th></th>
        </tr>
    </thead>
    <?php while($row = $studData->fetch_assoc()) {?>
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