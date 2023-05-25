<?php
    require_once("../php/dbConfig.php");
    require_once("../php/session_start.php");
    $section = implode($_SESSION['filter']);
    $modNum = session_id();
    $courseCode = implode($_SESSION['courseTitle']);

    if(isset($_POST['submit'])) {
        $query = $db->query("SELECT SAamt FROM tblamt WHERE modNum = '".$modNum."'");
        $row = $query->fetch_assoc();
        $fileMimes = array(
            'text/x-comma-separated-values',
            'text/comma-separated-values',
            'application/octet-stream',
            'application/vnd.ms-excel',
            'application/x-csv',
            'text/x-csv',
            'text/csv',
            'application/csv',
            'application/excel',
            'application/vnd.msexcel',
            'text/plain'
        );
        if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes)) {
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            fgetcsv($csvFile);
            if($row['SAamt'] == 3) { 
                while(($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE) {
                    $studNum = $getData[0];
                    $SA1 = $getData[1];
                    
                }
            }
        }
    }
?>