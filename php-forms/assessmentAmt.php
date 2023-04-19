<?php
    require ("../php/navbar.php");
    require_once("../php/dbConfig.php");
    include("../php/session_start.php");

    $modNum = session_id();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assessment Amount</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
        <?php
            $courseCode = implode($_SESSION['courseTitle']);
            $query = $db->query("SELECT * FROM tblamt WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
            $row = $query->fetch_assoc();
        ?>
            <label for="SAamt">Input the amount of SA for this module: (min 1, max 3)<input type="number" 
                name="SAamt" value="<?php echo $row['SAamt']?>" min="1" max="3" required></label><br>
            <label for="FAamt">Input the amount of FA for this module: (min 1, max 10)<input type="number" 
                name="FAamt" value="<?php echo $row['FAamt']?>" min="1" max="10" required></label><br>
            <button onclick="window.history.go(-1); return false;">Cancel</button>
            <input type="submit" name="submit" value="Save">
        </form>
    </div>
</body>
</html>
<?php
if(isset($_POST['submit'])) {
    $SAamt = $_POST['SAamt'];
    $FAamt = $_POST['FAamt'];

    $update = $db->query("UPDATE tblamt SET SAamt=$SAamt, FAamt=$FAamt WHERE modNum = $modNum AND courseCode = '".$courseCode."'");
    
    echo "<script>alert('Maximum amount of assessments have been updated successully.');</script>";
    echo "<script>javascript:history.go(-2);</script>";
}
?>