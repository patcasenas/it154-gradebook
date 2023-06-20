<?php 
    require $_SERVER["DOCUMENT_ROOT"] . "/it154-gradebook/php/head.php";
    $courseCode = $_SESSION['courseCode'];
    $sql = $db->query("SELECT courseTitle FROM courseinfo WHERE courseCode = '".$courseCode."'");
    $row = mysqli_fetch_assoc($sql);
?>
</style>
<nav>
    <div class="top-nav">
        <span id="hamburger-menu" onclick="openNav()"><i class="fa-solid fa-bars" style="color: #ebebee;"></i></span>
        <div class="logo-container">
            <img src="/it154-gradebook/img/igrade-white@1x.png" id="nav-logo" alt="iGradebook">
        </div>
        <div class="top-nav-container">
            <span class="nav-courseCode"><?php echo $courseCode . " - " . $row['courseTitle']?></span>
            <a href="php/logout.php" class="logout-link">Logout</a>
        </div>
    </div>
    <div id="sidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa-solid fa-xmark" style="color: #ebebee;"></i></a>
            <a href="classlist.php?courseCode=<?php echo $courseCode?>" class="nav-link">Class List</a>
            <?php
                $mod = $db->query("SELECT modNum FROM moduleinfo WHERE courseCode = '".$courseCode."'");
                while ($row = $mod->fetch_assoc()) {
                    $modNum = $row['modNum'];
                    // echo '<a href="summative.php?modNum='.$modNum.'" class="nav-link">' . 'Module ' . $modNum . '</a>';
                    echo '<ul style="padding:0; margin: 0">';
                    echo '<li class="nav-link">Module '.$modNum.'</li>';
                        echo '<ul>';
                            echo '<a href="summative.php?modNum='.$modNum.'" class="nav-link">' . 'Summative</a>';
                            echo '<a href="formative.php?modNum='.$modNum.'" class="nav-link">' . 'Formative</a>';
                        echo '</ul>';
                    echo '</ul>';
                }
            ?>
            <a href="viewmodulegrades.php" class="nav-link">View Module Grades</a>
            <a href="setup-obe.php" class="nav-link">OBE Setup</a>
    </div>
</nav>
<script>
function openNav() {
  document.getElementById("sidenav").style.width = "10%";
  document.getElementById("container").style.marginLeft = "11%";
  document.getElementById("students-table").style.width= "90%";
  document.getElementById("delete-list").style.width = "95%"
  document.getElementById("upload-list").style.marginRight = "4%"
}

function closeNav() {
  document.getElementById("sidenav").style.width = "0";
  document.getElementById("container").style.marginLeft= "1%";
  document.getElementById("students-table").style.width= "90%";
  document.getElementById("delete-list").style.width = "90%"
  document.getElementById("upload-list").style.marginRight = "9%";
}
</script>
   
