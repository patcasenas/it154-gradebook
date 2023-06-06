<!-- Imports students to their course -->
<?php
include_once ("../php/dbConfig.php");
include_once ("../php/session_start.php");
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

        // Displays course title
        $courseCode = $_SESSION['courseCode'];
        // Parse data from CSV file line by line
        while(($line = fgetcsv($csvFile)) !== FALSE){
            $lastName   = $line[0];
            $firstName  = $line[1];
            $studProg = $line[2];
            $section = $line[3];
            $username  = $line[4];
            
            $db->query("INSERT INTO studentinfo (lastName, firstName, username, studProg, section, courseCode) VALUES (UPPER('".$lastName."'), '".$firstName."', '".$username."', UPPER('".$studProg."'), UPPER('".$section."'), UPPER('".$courseCode."'))");    
            
            for ($i=1; $i<=3; $i++) {
                $db->query("INSERT INTO summative (username, modNum, courseCode, section) VALUES ('".$username."', $i, '".$courseCode."', '".$section."')");
                $db->query("INSERT INTO formative (username, modNum, courseCode, section) VALUES ('".$username."', $i, '".$courseCode."', '".$section."')");
            }

            for ($i = 1; $i <= 3; $i++) {
                $db->query("INSERT INTO runavg (username, section, studProg, modNum, courseCode) VALUES ('".$username."', '".$section."', '".$studProg."', $i, '".$courseCode."')");
            }            
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
// Redirect to the listing page
header("Location: ../classlist.php".$qstring);
?>