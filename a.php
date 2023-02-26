<?php
include('database.php');
?>
!-----display data-->
    <?php
    if(isset($students)>0)
    {
    ?>
    <table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>S.N</th>
        <th>Full Name</th>
        <th>Email Address</th>
    </tr>
    <?php
       if(count($students)>0)
       {
    $sn=1;
    foreach ($students as $student) {
     ?>
<tr>
    <td><?php echo $sn; ?></td>
    <td><?php echo $student['fullName']; ?></td>
    <td><?php echo $student['emailAddress']; ?></td>
</tr>
     <?php
   $sn++; 
   }
}else{
    echo "<tr><td colspan='3'>No Data Found</td></tr>";
}
?>
</table>
<?php
}
?>