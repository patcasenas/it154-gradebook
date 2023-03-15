<?php require_once("dbConfig.php"); ?>
<table class="students-table">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>FA 1</th>
            <th>FA 2</th>
            <th>FA 3</th>
            <th>FA 4</th>
            <th>FA 5</th>
            <th>FA 6</th>
            <th>FA 7</th>
            <th>FA 8</th>
            <th>FA 9</th>
            <th>FA 10</th>
            <th>Average</th>
        </tr>
    <?php $row = $result->fetch_assoc() ?>
        <tr>
            <th>Program</th>
            <th>Student Number</th>
            <th>Student Name</th>
            <th><?php echo $row['FA1max']?></th>
            <th><?php echo $row['FA2max']?></th>
            <th><?php echo $row['FA3max']?></th>
            <th><?php echo $row['FA4max']?></th>
            <th><?php echo $row['FA5max']?></th>
            <th><?php echo $row['FA6max']?></th>
            <th><?php echo $row['FA7max']?></th>
            <th><?php echo $row['FA8max']?></th>
            <th><?php echo $row['FA9max']?></th>
            <th><?php echo $row['FA10max']?></th>
            <th></th>
        </tr>
    </thead>
    <?php
        while($row = $studData->fetch_assoc()) {?>
    <tr>
        <td class="student-data-module"><?php echo $row['studProg'];?></td>
        <td class="student-data-module"><?php echo $row['studNum'];?></td>
        <td class="student-data-module"><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
        <td class="student-data-module"><?php echo $row['FA1'];?></td>
        <td class="student-data-module"><?php echo $row['FA2']; ?></td>
        <td class="student-data-module"><?php echo $row['FA3'];?></td>
        <td class="student-data-module"><?php echo $row['FA4'];?></td>
        <td class="student-data-module"><?php echo $row['FA5']; ?></td>
        <td class="student-data-module"><?php echo $row['FA6'];?></td>
        <td class="student-data-module"><?php echo $row['FA7'];?></td>
        <td class="student-data-module"><?php echo $row['FA8']; ?></td>
        <td class="student-data-module"><?php echo $row['FA9'];?></td>
        <td class="student-data-module"><?php echo $row['FA10'];?></td>
        <td class="student-data-module"><?php echo $row['FAavg'];?></td>
    </tr>
    <?php }?>
    <tbody>
    </tbody>
</table>