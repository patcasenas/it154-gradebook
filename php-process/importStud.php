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
            $studNum  = $line[2];
            $studProg = $line[3];
            $section = $line[4];
            $username = $line[5];
            
            $db->query("INSERT INTO studentinfo (lastName, firstName, studNum, studProg, section, username, courseCode) VALUES ('".$lastName."', '".$firstName."', '".$studNum."', '".$studProg."', '".$section."', '".$username."', '".$courseCode."')");    
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
$query=$db->query("SELECT studNum, section FROM studentinfo");
while($row = $query->fetch_assoc()){
    $db->query("INSERT INTO summative (studNum, modNum, courseCode, section) VALUES ($row[studNum], 1, '".$courseCode."', '".$row['section']."')");
    $db->query("INSERT INTO summative (studNum, modNum, courseCode, section) VALUES ($row[studNum], 2, '".$courseCode."', '".$row['section']."')");
    $db->query("INSERT INTO summative (studNum, modNum, courseCode, section) VALUES ($row[studNum], 3, '".$courseCode."', '".$row['section']."')");

    $db->query("INSERT INTO formative (studNum, modNum, courseCode, section) VALUES ($row[studNum], 1, '".$courseCode."', '".$row['section']."')");
    $db->query("INSERT INTO formative (studNum, modNum, courseCode, section) VALUES ($row[studNum], 2, '".$courseCode."', '".$row['section']."')");
    $db->query("INSERT INTO formative (studNum, modNum, courseCode, section) VALUES ($row[studNum], 3, '".$courseCode."', '".$row['section']."')");
}

$runAvg = $db->query("SELECT si.studNum, si.courseCode, si.section, si.studProg, s.modNum
                    FROM studentinfo AS si
                    LEFT JOIN summative AS s ON s.studNum = si.studNum
                    WHERE si.courseCode = '".$courseCode."'");
while($row = $runAvg->fetch_assoc()) {
    $studNum = $row['studNum'];
    $studProg = $row['studProg'];
    $modNum = $row['modNum'];
    $section = $row['section'];
    
    $insertinto = $db->query("INSERT INTO runavg (studNum, section, studProg, modNum, courseCode) VALUES ('".$studNum."', '".$section."', '".$studProg."', $modNum, '".$courseCode."')");
}
// Redirect to the listing page
header("Location: ../classlist.php".$qstring);
?>