<?php
include("dbConfig.php");

if(isset($_GET['submit'])) {
    ?>
<table>
    <thead>
        <tr>
            <th>Section</th>
            <th>Name</th>
            <th>SA 1</th>
            <th>SA 2</th>
            <th>SA 3</th>
        </tr>
    </thead>
    <tbody>
        <?php            
            $data = implode($_GET['section']);
            $query = "SELECT s.sumID, s.modID, s.studNum, s.SA1, s.SA2, s.SA3, s.SAavg, si.lastName, si.firstName, si.studProg 
            FROM summative AS s
            LEFT JOIN studentinfo AS si ON s.studNum = si.studNum
            WHERE modID = 1 AND si.section IN ('$data')
            ORDER BY si.lastName ASC";
            $result = $db->query($query);
            if (!$result) {
                echo mysqli_error($db);
            } else {
                while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $data;?></td>
                    <td class="student-data-module"><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                    <td class="student-data-module"><?php echo $row['SA1'];?></td>
                    <td class="student-data-module"><?php echo $row['SA2']; ?></td>
                    <td class="student-data-module"><?php echo $row['SA3'];?></td>
                </tr>
           <?php }}
            ?>
    </tbody>
</table>
<?php } ?>
<!-- end submit -->