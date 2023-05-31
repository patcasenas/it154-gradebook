<?php
    $modNum = $_GET['modNum'];
    $query = $db->query("SELECT * FROM tblamt WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
    $row = $query->fetch_assoc();
    $query = $db->query("SELECT modNum FROM moduleinfo WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
    $roww = $query->fetch_assoc();
    $modURL = $roww['modNum'];
?>
<div id="overlay1">
    <div id="assessment-form">
        <div id="close-btn" onclick="offSet()">&times;</div>
        <h2>Set Assessment Amount</h2>
        <form method="post" action="php-process/assessmentAmt.php?modNum=<?php echo $modURL?>">
        <label for="SAamt">Input the amount of SA for this module (min 1, max 3):&emsp;<input type="number" 
            name="SAamt" value="<?php echo $row['SAamt']?>" min="1" max="3" required></label><br>
        <label for="FAamt">Input the amount of FA for this module (min 1, max 10):&emsp;<input type="number" 
            name="FAamt" value="<?php echo $row['FAamt']?>" min="1" max="10" required></label><br>
        <div class="index-form-btns">
            <input type="button" value="Cancel" onclick="offSet()" id="cancel-btn"/>
            <input type="submit" value="Save" name="submit">
        </div>
        </form>
    </div>
</div>
<script>
        function onSet() {
            document.getElementById("overlay1").style.display = "block";
        }

        function offSet() {
            document.getElementById("overlay1").style.display = "none";
        }
</script>