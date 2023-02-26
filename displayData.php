<?php include ("php/dbConfig.php");
if(isset($_POST['section']) && isset($_POST['submit'])) {
    $section = $_POST['section'];
    $query = "SELECT lastName, firstName, section FROM studentinfo WHERE section = '$section'
    ORDER BY lastName ASC";
    $result1 = $db->query($query);
    echo num_rows($result1);
    if($result1->num_rows>0) {
        $studentData = mysqli_fetch_all($result1, MYSQLI_ASSOC);
    } else {
        $studentData=[];
    }
// } header("Location:section.php");
?>
