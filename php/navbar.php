<?php 
    require $_SERVER["DOCUMENT_ROOT"] . "/it154-gradebook/php/head.php";
    $courseCode = implode($_SESSION['courseTitle']);
    $sql = $db->query("SELECT courseTitle FROM courseinfo WHERE courseCode = '".$courseCode."'");
    $row = mysqli_fetch_assoc($sql);
?>
</style>
<nav>
    <div class="top-nav">
        <span id="hamburger-menu" onclick="openNav()">&#9776;</span>
        <div class="logo-container">
            <img src="/it154-gradebook/img/igrade-white@1x.png" id="nav-logo" alt="iGradebook">
        </div>
        <div class="top-nav-container">
            <span class="nav-courseCode"><?php echo $courseCode . " - " . $row['courseTitle']?></span>
            <a href="/it154-gradebook/php/logout.php" class="logout-link">Logout</a>
        </div>
    </div>
    <div id="sidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="/it154-gradebook/classlist.php" class="nav-link">Class List</a>
            <a href="/it154-gradebook/sa-mod1.php" class="nav-link">Module 1</a>
            <a href="/it154-gradebook/sa-mod2.php" class="nav-link">Module 2</a>
            <a href="/it154-gradebook/sa-mod3.php" class="nav-link">Module 3</a>
            <a href="/it154-gradebook/viewmodulegrades.php" class="nav-link">View Module Grades</a>
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
  document.getElementById("students-table").style.width= "80%";
  document.getElementById("delete-list").style.width = "90%"
  document.getElementById("upload-list").style.marginRight = "9%";
}
</script>
   
