<!-- Imports students to their course -->
<?php
include_once 'dbConfig.php';
if(isset($_POST['importSubmit'])){
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){    
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){            
        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
        
        // Skip the first line
        fgetcsv($csvFile); 
        // Parse data from CSV file line by line
        while(($line = fgetcsv($csvFile)) !== FALSE){
            // Get row data
            $lastName   = $line[0];
            $firstName  = $line[1];
            $studNum  = $line[2];
            $studProg = $line[3];
            $section = $line[4];
            
            $db->query("INSERT INTO studentinfo (lastName, firstName, studNum, studProg, section) VALUES ('".$lastName."', '".$firstName."', '".$studNum."', '".$studProg."', '".$section."')");    
            $db->query("UPDATE studentinfo SET studProg = UPPER(studProg), section = UPPER(section), lastName = UPPER(lastName)");
        }
            
        // Close opened CSV file
        fclose($csvFile);
            
        $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }

}
$query=$db->query("SELECT studNum FROM studentinfo");
while($row = $query->fetch_assoc()){
$db->query("INSERT INTO summative (studNum, modID) VALUES ($row[studNum], 1)");
$db->query("INSERT INTO summative (studNum, modID) VALUES ($row[studNum], 2)");
$db->query("INSERT INTO summative (studNum, modID) VALUES ($row[studNum], 3)");

$db->query("INSERT INTO formative (studNum, modID) VALUES ($row[studNum], 1)");
$db->query("INSERT INTO formative (studNum, modID) VALUES ($row[studNum], 2)");
$db->query("INSERT INTO formative (studNum, modID) VALUES ($row[studNum], 3)");
}
// Redirect to the listing page
header("Location: ../index.php".$qstring);
?>