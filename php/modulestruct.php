<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once("dbConfig.php");
        // Insert students to formative and summative table
        $db->query ("INSERT INTO formative (studNum, formID) SELECT studNum, studID FROM studentinfo");
        $db->query ("INSERT INTO summative (studNum, sumID) SELECT studNum, studID FROM studentinfo");
    ?>
</head>
<body>
    <table>
    <thead>
                <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>SA 1</th>
                    <th>SA 2</th>
                    <th>SA 3</th>
                    <th>Average</th>
                </tr>
            </thead>
            <tbody>
    <?php
        $result = $db->query ("SELECT s.studNum, s.SA1, s.SA2, s.SA3, s.SAavg, si.lastName, si.firstName 
        FROM summative AS s 
        LEFT JOIN studentinfo AS si ON s.studNum = si.studNum ");

            while($row = $result->fetch_assoc()) {?>
                <tr>
                    <td><?php echo $row['lastName'];?></td>
                    <td><?php echo $row['firstName'];?></td>
                    <td><?php echo $row['SA1'];?></td>
                    <td><?php echo $row['SA2'];?></td>
                    <td><?php echo $row['SA3'];?></td>
                    <td><?php echo $row['SAavg'];?></td>
                </tr>
        <?php }?>
    </tbody></table>
</body>
</html>