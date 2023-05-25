<?php
    require_once("php/dbConfig.php");
    $modNum = session_id();
    $courseCode = implode($_SESSION['courseTitle']);

    $studData = $db->query("SELECT f.formID, f.modNum, f.studNum, f.FA1, f.FA2, f.FA3, f.FA4, f.FA5, f.FA6, f.FA7, f.FA8, f.FA9, f.FA10, f.FAavg, f.40per, ta.FAamt, FA1max, FA2max, FA3max, FA4max, FA5max, FA6max, FA7max, FA8max, FA9max, FA10max 
                            FROM formative AS f 
                            LEFT JOIN studentinfo AS si ON f.studNum = si.studNum 
                            LEFT JOIN 
                            (SELECT * FROM tblamt 
                            where modNum = '".$modNum."' and courseCode = '".$courseCode."') AS ta ON f.modNum = ta.modNum
                            LEFT JOIN 
                            (SELECT * FROM maxscore 
                            where modNum = '".$modNum."' and courseCode = '".$courseCode."')
                            AS ms ON f.modNum = ms.modNum
                            WHERE f.modNum = 1 AND ta.courseCode = '".$courseCode."' AND ta.modNum = '".$modNum."'
                            ORDER BY si.lastName ASC;");
    
    if(!$studData) {
        mysqli_error($db);
    } else {
        while ($row = $studData->fetch_assoc()) {
            $formID = $row['formID'];
            $studNum = $row['studNum'];
            $FA1 = $row['FA1'];
            $FA2 = $row['FA2'];
            $FA3 = $row['FA3'];
            $FA4 = $row['FA4'];
            $FA5 = $row['FA5'];
            $FA6 = $row['FA6'];
            $FA7 = $row['FA7'];
            $FA8 = $row['FA8'];
            $FA9 = $row['FA9'];
            $FA10 = $row['FA10'];
            $FAavg = $row['FAavg'];
            $FAamt = $row['FAamt'];
            $FA1max = $row['FA1max'];
            $FA2max = $row['FA2max'];
            $FA3max = $row['FA3max'];
            $FA4max = $row['FA4max'];
            $FA5max = $row['FA5max'];
            $FA6max = $row['FA6max'];
            $FA7max = $row['FA7max'];
            $FA8max = $row['FA8max'];
            $FA9max = $row['FA9max'];
            $FA10max = $row['FA10max'];
            
            if($FAamt == 1) {
                $computeFA = ($FA1/$FA1max)*100/$FAamt;
                $fortyper = $computeFA*0.4;
                $db->query("UPDATE formative SET FAavg = $computeFA, 40per = $fortyper WHERE formID = '".$formID."'");
            } else if($FAamt == 2) {
                $computeFA = ($FA1/$FA1max+$FA2/$FA2max)*100/$FAamt;
                $fortyper = $computeFA*0.4;
                $db->query("UPDATE formative SET FAavg = $computeFA, 40per = $fortyper WHERE formID = '".$formID."'");
            } else if($FAamt == 3) {
                $computeFA = ($FA1/$FA1max+$FA2/$FA2max+$FA3/$FA3max)*100/$FAamt;
                $fortyper = $computeFA*0.4;
                $db->query("UPDATE formative SET FAavg = $computeFA, 40per = $fortyper WHERE formID = '".$formID."'");
            } else if($FAamt == 4) {
                $computeFA = ($FA1/$FA1max+$FA2/$FA2max+$FA3/$FA3max+$FA4/$FA4max)*100/$FAamt;
                $fortyper = $computeFA*0.4;
                $db->query("UPDATE formative SET FAavg = $computeFA, 40per = $fortyper WHERE formID = '".$formID."'");
            } else if($FAamt == 5) {
                $computeFA = ($FA1/$FA1max+$FA2/$FA2max+$FA3/$FA3max+$FA4/$FA4max+$FA5/$FA5max)*100/$FAamt;
                $fortyper = $computeFA*0.4;
                $db->query("UPDATE formative SET FAavg = $computeFA, 40per = $fortyper WHERE formID = '".$formID."'");
            } else if ($FAamt == 6) {
                $computeFA = ($FA1/$FA1max+$FA2/$FA2max+$FA3/$FA3max+$FA4/$FA4max+$FA5/$FA5max+$FA6/$FA6max)*100/$FAamt;
                $fortyper = $computeFA*0.4;
                $db->query("UPDATE formative SET FAavg = $computeFA, 40per = $fortyper WHERE formID = '".$formID."'");                
            } else if ($FAamt == 7) {
                $computeFA = ($FA1/$FA1max+$FA2/$FA2max+$FA3/$FA3max+$FA4/$FA4max+$FA5/$FA5max+$FA6/$FA6max+$FA7/$FA7max)*100/$FAamt;
                $fortyper = $computeFA*0.4;
                $db->query("UPDATE formative SET FAavg = $computeFA, 40per = $fortyper WHERE formID = '".$formID."'");
            } else if ($FAamt == 8) {
                $computeFA = ($FA1/$FA1max+$FA2/$FA2max+$FA3/$FA3max+$FA4/$FA4max+$FA5/$FA5max+$FA6/$FA6max+$FA7/$FA7max+$FA8/$FA8max)*100/$FAamt;
                $fortyper = $computeFA*0.4;
                $db->query("UPDATE formative SET FAavg = $computeFA, 40per = $fortyper WHERE formID = '".$formID."'");
            } else if ($FAamt == 9) {
                $computeFA = ($FA1/$FA1max+$FA2/$FA2max+$FA3/$FA3max+$FA4/$FA4max+$FA5/$FA5max+$FA6/$FA6max+$FA7/$FA7max+$FA8/$FA8max+$FA9/$FA9max)*100/$FAamt;
                $fortyper = $computeFA*0.4;
                $db->query("UPDATE formative SET FAavg = $computeFA, 40per = $fortyper WHERE formID = '".$formID."'");
            } else if ($FAamt == 10) {
                $computeFA = ($FA1/$FA1max+$FA2/$FA2max+$FA3/$FA3max+$FA4/$FA4max+$FA5/$FA5max+$FA6/$FA6max+$FA7/$FA7max+$FA8/$FA8max+$FA9/$FA9max+$FA10/$FA10max)*100/$FAamt;
                $fortyper = $computeFA*0.4;
                $db->query("UPDATE formative SET FAavg = $computeFA, 40per = $fortyper WHERE formID = '".$formID."'");
            }
        }
    }
?>