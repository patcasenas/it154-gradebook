<?php
require("../php/dbConfig.php");
$modNum = $_GET['modNum'];
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['file'];
        $tmpFilePath = $file['tmp_name'];
        $fileName = pathinfo($file['name'], PATHINFO_FILENAME);
        $tableName = preg_replace('/[^a-zA-Z0-9_]/', '_', $fileName);
        $handle = fopen($tmpFilePath, "r");
        $headers = fgetcsv($handle, 10000, ",");
        
        // Remove unwanted characters from column names
        $headers = array_map(function($header) {
            return preg_replace('/[\(\)\[\]\|\,\:\+\-\s\/\!]+/', '_', $header);
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
            // header("Location:../formative.php?modNum=$modNum");
        }
    } else {
        echo "<script>alert('Error reading CSV file. Please try again.')</script>";
    }
include("importFromCSV.php");
?>