<!-- Imports students to their course -->
<?php
// Load the database configuration file
include_once 'dbConfig.php';

if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
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
                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT id FROM studentinfo WHERE studNum = '".$line[2]."'";
                $prevResult = $db->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $db->query("UPDATE studentinfo SET lastName = '".$lastName."', firstName = '".$firstName."', studProg = '".$studProg."', modified = NOW() WHERE studNum = '".$studNum."'");
                }else{
                    // Insert member data in the database
                    $db->query("INSERT INTO studentinfo (lastName, firstName, studNum, studProg) VALUES ('".$lastName."', '".$firstName."', '".$studNum."', '".$studProg."')");
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
header("Location: ../importStud.php".$qstring);
?>