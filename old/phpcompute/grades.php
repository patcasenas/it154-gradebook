<?php
    require_once("php/dbConfig.php");

    // joins all data
    $data = $db->query("SELECT s.modID, s.studNum, s.SAavg, s.60per, f.FAavg, f.40per
    FROM summative AS s
    RIGHT JOIN formative AS f ON s.studNum = f.studNum");

   
    while ($row = $data->fetch_assoc()) {
        $fortyper = $row['40per'];
        $sixtyper = $row['60per'];
        $SAavg = $row['SAavg'];
        $FAavg = $row['FAavg'];

        $update = $db->query("UPDATE runavg SET 60per = (SELECT 60per FROM summative WHERE runavg.modID = summative.modID AND runavg.studNum = summative.studNum), 
                SAavg = (SELECT SAavg FROM summative WHERE runavg.modID = summative.modID AND runavg.studNum = summative.studNum),
                40per = (SELECT 40per FROM formative WHERE runavg.modID = formative.modID AND runavg.studNum = formative.studNum),
                FAavg = (SELECT FAavg FROM formative WHERE runavg.modID = formative.modID AND runavg.studNum = formative.studNum)");
    }

    $runAvg = $db->query("SELECT * FROM runavg");
    while ($row = $runAvg->fetch_assoc()) {
        $fortyper = $row['40per'];
        $sixtyper = $row['60per'];
        $studNum = $row['studNum'];
        $runAvgID = $row['runAvgID'];

        $compute = $fortyper+$sixtyper;
        $updateGrade = $db->query("UPDATE runavg SET gradeTotal = $compute WHERE runAvgID = '".$runAvgID."'");
    }

    $transmute = $db->query("SELECT gradeTotal, transmutation, runAvgID FROM runavg");
    while ($row = $transmute->fetch_assoc()) {
        $gradeTotal = $row['gradeTotal'];
        $runAvgID = $row['runAvgID'];

        if ($gradeTotal <= 59.90) {
            $updateTrans = $db->query("UPDATE runavg SET transmutation = 'IP' WHERE runAvgID = '".$runAvgID."'");
        } else if ($gradeTotal <= 69.99 && $gradeTotal >= 60.00) {
            $updateGrade = $db->query("UPDATE runavg SET transmutation = 'I' WHERE runAvgID = '".$runAvgID."'");
        } else if ($gradeTotal <= 72.90 && $gradeTotal >= 70.00) {
            $updateGrade = $db->query("UPDATE runavg SET transmutation = 3.00 WHERE runAvgID = '".$runAvgID."'");
        } else if ($gradeTotal <= 76.90 && $gradeTotal >= 73.00) {
            $updateGrade = $db->query("UPDATE runavg SET transmutation = 2.75 WHERE runAvgID = '".$runAvgID."'");
        } else if ($gradeTotal <= 80.90 && $gradeTotal >= 77.00) {
            $updateGrade = $db->query("UPDATE runavg SET transmutation = 2.50 WHERE runAvgID = '".$runAvgID."'");
        } else if ($gradeTotal <= 83.90 && $gradeTotal >= 81.00) {
            $updateGrade = $db->query("UPDATE runavg SET transmutation = 2.25 WHERE runAvgID = '".$runAvgID."'");
        } else if ($gradeTotal <= 86.90 && $gradeTotal >= 84.00) {
            $updateGrade = $db->query("UPDATE runavg SET transmutation = 2.00 WHERE runAvgID = '".$runAvgID."'");
        } else if ($gradeTotal <= 90.90 && $gradeTotal >= 87.00) {
            $updateGrade = $db->query("UPDATE runavg SET transmutation = 1.75 WHERE runAvgID = '".$runAvgID."'");
        } else if ($gradeTotal <= 93.90 && $gradeTotal >= 91.00) {
            $updateGrade = $db->query("UPDATE runavg SET transmutation = 1.50 WHERE runAvgID = '".$runAvgID."'");
        } else if ($gradeTotal <= 96.90 && $gradeTotal >= 94.00) {
            $updateGrade = $db->query("UPDATE runavg SET transmutation = 1.25 WHERE runAvgID = '".$runAvgID."'");
        } else if ($gradeTotal <= 100.00 && $gradeTotal >=97.00) {
            $updateGrade = $db->query("UPDATE runavg SET transmutation = 1.00 WHERE runAvgID = '".$runAvgID."'");
        }
    }
?>
