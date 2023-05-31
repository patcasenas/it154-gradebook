<?php
    $modNum = $_GET['modNum'];
    $tblamt = $db->query("SELECT * FROM tblamt WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
    $row = $tblamt->fetch_assoc();
    $SAamt = $row['SAamt'];
    $FAamt = $row['FAamt'];
    $query = $db->query("SELECT modNum FROM moduleinfo WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
    $roww = $query->fetch_assoc();
    $modURL = $roww['modNum'];
?>
<div id="overlay">
    <div id="editcourse-form">
        <div id="close-btn" onclick="offMax()">&times;</div>
        <h2>Assign Max Scores</h2>
        <form action="php-process/maxscore.php?modNum=<?php echo $modURL?>" method="post">
            <!-- Summative Assessment max score -->
            <fieldset class="SAedit">
            <legend>Summative Assessment</legend>
            <?php 
                for($i = 1; $i <= $SAamt; $i++) {?>
                    <label for="SA<?php echo $i?>max"><?php echo "SA ". $i?><input type="number" name="SA<?php echo $i?>max" min="1" required></label>
            <?php } ?>
            </fieldset><br>
            <!-- Formative Assessment max score -->
            <fieldset class="FAedit">
            <legend>Formative Assessment</legend>
            <?php 
                for($i = 1; $i <= $FAamt; $i++) {?>
                    <label for="FA<?php echo $i?>max"><?php echo "FA ". $i?><input type="number" name="FA<?php echo $i?>max" min="1" required></label>
            <?php } ?>
            </fieldset>
            <!-- Submit/Cancel buttons -->
            <div class="index-form-btns">
                <input type="button" value="Cancel" onclick="offMax()" id="cancel-btn"/>
                <input type="submit" value="Save" name="submit">
            </div>
        </form>
    </div>
</div>
<script>
        function onMax() {
            document.getElementById("overlay").style.display = "block";
        }

        function offMax() {
            document.getElementById("overlay").style.display = "none";
        }
</script>