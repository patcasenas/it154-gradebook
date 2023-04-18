<?php
    include("php/navbar.php");
    require_once("php/dbConfig.php");
    include("php/session_start.php");

    $modID = session_id();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" method="post" onsubmit="return confirm('Are you sure you want to save?')">
        <?php
            $query = $db->query("SELECT * FROM tblamt WHERE modID = $modID");
            $row = $query->fetch_assoc();
        ?>
            <label for="SAamt">Input the amount of SA for this term: (min 1, max 3)<input type="number" 
                name="SAamt" value="<?php echo $row['SAamt']?>" min="1" max="3" required></label><br>
            <label for="FAamt">Input the amount of FA for this term: (min 5, max 10)<input type="number" 
                name="FAamt" value="<?php echo $row['FAamt']?>" min="5" max="10" required></label><br>
            <input type="submit" name="submit" value="Save">
        </form>
    </div>
</body>
</html>
<?php
if(isset($_POST['submit'])) {
    $SAamt = $_POST['SAamt'];
    $FAamt = $_POST['FAamt'];

    $update = $db->query("UPDATE tblamt SET SAamt=$SAamt, FAamt=$FAamt WHERE modID=$modID");
    
    echo "<script>alert('Maximum amount of assessments have been updated successully.');</script>";
    echo "<script>javascript:history.go(-2);</script>";
}
?>