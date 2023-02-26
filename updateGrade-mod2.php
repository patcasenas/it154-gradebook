<!DOCTYPE html>
<html lang="en">

<body>
    <head>
        <?php
            require("php/dbConfig.php");
            include("php/navbar.php");
        ?>
    </head>
    <div class="container">
        <form action="php/updateGrade.php" method="post">
            <input type="button" onclick="history.go(-1)" value="Back" />
            <input type="submit" value="Update Selected Records" name="btn-update"><br><br>

            <table class="students-table">
                <tr>
                    <th><input type="checkbox" id="selectAll">Select All</th>
                    <th>Program</th>
                    <th>Student Number</th>
                    <th>Student Name</th>
                    <th>SA 1</th>
                    <th>SA 2</th>
                    <th>SA 3</th>
                    <th>Average</th>
                </tr>

                <?php
            $query = ("SELECT s.sumID, s.modID, s.studNum, s.SA1, s.SA2, s.SA3, s.SAavg, si.lastName, si.firstName, si.studProg 
            FROM summative AS s 
            LEFT JOIN studentinfo AS si ON s.studNum = si.studNum 
            WHERE modID = '2'
            ORDER BY si.lastName ASC");
            $result = mysqli_query($db,$query);

            while($row = mysqli_fetch_array($result)) {
                $sumID = $row['sumID'];
                $studNum = $row['studNum'];
                $SA1 = $row['SA1'];
                $SA2 = $row['SA2'];
                $SA3 = $row['SA3'];
                $SAavg = $row['SAavg'];
            ?>
                <tr>
                    <td><input type="checkbox" name="update[]" value='<?= $sumID?>'></td>
                    <td class="student-data-module"><?php echo $row['studProg'];?></td>
                    <td class="student-data-module"><?php echo $row['studNum'];?></td>
                    <td class="student-data-module"><?php echo $row['lastName'] . ", " . $row['firstName'] ?></td>
                    <td><input type="number" name='SA1_<?= $sumID?>' value='<?= $SA1 ?>'></td>
                    <td><input type="number" name='SA2_<?= $sumID?>' value='<?= $SA2 ?>'></td>
                    <td><input type="number" name='SA3_<?= $sumID?>' value='<?= $SA3 ?>'></td>
                    <td><?php echo $row['SAavg']?></td>
                </tr>
                <?php }?>
            </table>
        </form>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    // Check/Uncheck All
    $('#selectAll').change(function() {
        if ($(this).is(':checked')) {
            $('input[name="update[]"]').prop('checked', true);
        } else {
            $('input[name="update[]"]').each(function() {
                $(this).prop('checked', false);
            });
        }
    });

    // Checkbox click
    $('input[name="update[]"]').click(function() {
        var total_checkboxes = $('input[name="update[]"]').length;
        var total_checkboxes_checked = $('input[name="update[]"]:checked').length;

        if (total_checkboxes_checked == total_checkboxes) {
            $('#selectAll').prop('checked', true);
        } else {
            $('#selectAll').prop('checked', false);
        }
    });
});
</script>
</html>
