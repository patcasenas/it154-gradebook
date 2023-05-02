<?php 
    $query = $db->query("SELECT * FROM tblamt WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
    $row = $query->fetch_assoc();
?>
<div id="overlay1">
    <div id="assessment-form">
        <div id="close-btn" onclick="offSet()">&times;</div>
        <h2>Set Assessment Amount</h2>
        <form method="post">
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
<?php
if(isset($_POST['submit'])) {
$SAamt = $_POST['SAamt'];
$FAamt = $_POST['FAamt'];

$update = $db->query("UPDATE tblamt SET SAamt=$SAamt, FAamt=$FAamt WHERE modNum = $modNum AND courseCode = '".$courseCode."'");

echo "<script>alert('Maximum amount of assessments have been updated successully.');</script>";
echo "<script>javascript:history.go(-1);</script>";
}
?>