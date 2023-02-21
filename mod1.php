<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "php/navbar.php"; ?>
    <?php include "php/dbConfig.php"; ?>
    <title>IT154-8 GRADEBOOK</title>
</head>
<body>
    <table>
    <thead>
                <tr>
                    <th>Student Number</th>
                </tr>
            </thead>
            <tbody>
    <?php    
        $result = $db->query ("SELECT * FROM summative");
            while($row = $result->fetch_assoc()) {?>
                <tr>
                    <td><?php echo $row['studNum']; ?></td>
                </tr>
        <?php }?>
    </tbody></table>
</body>
</html>
<!-- <?php 
        // Insert studNum into summative table    
        // $db->query ("INSERT INTO summative (studNum, sumID) SELECT studnum, studID FROM studentinfo");
?> -->