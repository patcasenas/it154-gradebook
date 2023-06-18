<?php
require("../php/dbConfig.php");
require("../php/session_start.php");
$modNum = $_GET['modNum'];
$courseCode = $_SESSION['courseCode'];

    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['file'];
        $tmpFilePath = $file['tmp_name'];
        $fileName = pathinfo($file['name'], PATHINFO_FILENAME);
        $tableName = preg_replace('/[^a-zA-Z0-9_]/', '_', $fileName);
        $handle = fopen($tmpFilePath, "r");
        $headers = fgetcsv($handle, 10000, ",");
        
        // Remove unwanted characters from column names
        $headers = array_map(function($header) {
            return preg_replace('/[\(\)\[\]\|\,\:\+\-\s\/\!\*]+/', '_', $header);
        }, $headers);
        
        $tableCols = implode(' VARCHAR(255),', $headers) . ' VARCHAR(255)';
        $createQuery = "CREATE TABLE IF NOT EXISTS $tableName ($tableCols)";
        $query = $db->query($createQuery);
        
        while (($data = fgetcsv($handle, 10000, ",")) !== false) {
            $cols = implode(", ", array_map('trim', $headers));
            $values = "'" . implode("', '", array_map('trim', $data)) . "'";
        
            $insertQuery = "INSERT INTO $tableName ($cols) VALUES ($values)";
            $sql = $db->query($insertQuery);
        }
        
        fclose($handle);
        if (!$insertQuery) {
            mysqli_error($db);
        } else {
            echo "<script>alert('Successfully uploaded student grades')</script>";
        }
    } else {
        echo "<script>alert('Error reading CSV file. Please try again.')</script>";
    }
    $result = $db->query("SHOW TABLES LIKE 'gc%'");
    if ($result) {
        while ($row = $result->fetch_row()) {
            $tableName = $row[0];
            $firstPos = strpos($tableName, "_");
            $secondPos = strpos($tableName, "_", $firstPos + 1);
            
            $thirdPos = strpos($tableName, "_", $secondPos+1);
            $section = strtoupper(substr($tableName, $secondPos + 1, $thirdPos - $secondPos - 1));


            $query = $db->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$tableName' AND COLUMN_NAME LIKE 'M%'");

            if ($query) {
                while ($row = $query->fetch_assoc()) {
                    $columnName = $row['COLUMN_NAME'];

                    if (preg_match('/\d+/', $columnName, $matches)) {
                        $modNum = $matches[0];
                    }

                    $firstUnder = strpos($columnName, "_");
                    $secondUnder = strpos($columnName, "_", $firstUnder + 1);

                    $assessment = substr($columnName, $firstUnder + 1, $secondUnder - $firstUnder - 1);

                    $studData = $db->query("SELECT * FROM $tableName");
                    while ($row = $studData->fetch_assoc()) {
                        if (strpos($columnName, "SA") !== false) {
                            $value = $row[$columnName];
                            $updateSA = $db->query("UPDATE summative SET $assessment = '".$value."' WHERE modNum = $modNum AND courseCode = '".$courseCode."' AND username ='".$row['Username']."'");
                            // echo "UPDATE summative SET $assessment = '".$value."' WHERE modNum = $modNum AND courseCode = '".$courseCode."' AND username ='".$row['Username']."'" . '<br>';
                        }

                        if (strpos($columnName, "FA") !== false) {
                            $value = $row[$columnName];
                            $db->query("UPDATE formative SET $assessment = '".$value."' WHERE modNum = $modNum AND courseCode = '".$courseCode."' AND username ='".$row['Username']."'");
                        }                
                    }
                }
            }
        }
    $deleteTable = $db->query("SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME LIKE 'gc%'");

    while ($row = $deleteTable->fetch_assoc()) {
        $tableName = $row['TABLE_NAME'];
        $db->query("DROP TABLE IF EXISTS `$tableName`");
    }
    header("Location:../summative.php?modNum=$modNum");
}
?>