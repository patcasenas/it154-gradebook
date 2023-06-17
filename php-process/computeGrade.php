<?php
    require_once("php/dbConfig.php");
    // $modNum = $_GET['modNum'];

    $getModNum = $db->query("SELECT modNum FROM moduleinfo WHERE courseCode = '".$courseCode."'");

    while($row = $getModNum->fetch_assoc()) {
        $modNum = $row['modNum'];
        
        $summative = $db->query("
        SELECT s.sumID, s.modNum, s.username, s.SA1, s.SA2, s.SA3, s.SAavg, s.60per, ta.SAamt, ms.SA1max, ms.SA2max, ms.SA3max
        FROM summative AS s
        LEFT JOIN studentinfo AS si ON s.username = si.username
        LEFT JOIN tblamt AS ta ON s.modNum = ta.modNum AND ta.modNum = '".$modNum."' AND ta.courseCode = '".$courseCode."'
        LEFT JOIN maxscore AS ms ON s.modNum = ms.modNum AND ms.modNum = '".$modNum."' AND ms.courseCode = '".$courseCode."'
        WHERE s.modNum = '".$modNum."' AND ta.courseCode = '".$courseCode."' AND ta.modNum = '".$modNum."'
        ORDER BY si.lastName ASC;");

        if(!$summative) {
            mysqli_error($db);
        } else {
            while ($row = $summative->fetch_assoc()) {
                $sumID = $row['sumID'];
                $SAamt = $row['SAamt'];
                $SA1max = $row['SA1max'];
                $SA2max = $row['SA2max'];
                $SA3max = $row['SA3max'];
                $SAavg = 0;

                for($i = 1; $i <= $SAamt; $i++) {
                    $SA = $row['SA'.$i];
                    $SAmax = $row['SA'.$i.'max'];
                    $SAavg += $SA / $SAmax;
                }

                $computeSA = ($SAavg * 100) / $SAamt;
                $sixtyper = $computeSA * 0.6;

                $db->query("UPDATE summative SET SAavg = $computeSA, 60per = $sixtyper WHERE sumID = '".$sumID."'");
            }        
        }
        $formative = $db->query("
        SELECT f.formID, f.modNum, f.username, f.FA1, f.FA2, f.FA3, f.FA4, f.FA5, f.FA6, f.FA7, f.FA8, f.FA9, f.FA10, f.FAavg, f.40per, ta.FAamt, FA1max, FA2max, FA3max, FA4max, FA5max, FA6max, FA7max, FA8max, FA9max, FA10max
        FROM formative AS f
        LEFT JOIN studentinfo AS si ON f.username = si.username
        LEFT JOIN tblamt AS ta ON f.modNum = ta.modNum AND ta.courseCode = '".$courseCode."' AND ta.modNum = '".$modNum."'
        LEFT JOIN maxscore AS ms ON f.modNum = ms.modNum AND ms.courseCode = '".$courseCode."' AND ms.modNum = '".$modNum."'
        WHERE f.modNum = '".$modNum."' AND ta.courseCode = '".$courseCode."' AND ta.modNum = '".$modNum."'
        ORDER BY si.lastName ASC;");
        
        if(!$formative) {
            mysqli_error($db);
        } else {
            while ($row = $formative->fetch_assoc()) {
                $formID = $row['formID'];
                $username = $row['username'];
                $FAamt = $row['FAamt'];
                $FAavg = 0;
                
                for ($i = 1; $i <= $FAamt; $i++) {
                    $FA = $row['FA'.$i];
                    $FAmax = $row['FA'.$i.'max'];
                    $FAavg += $FA / $FAmax;
                }
                
                $computeFA = ($FAavg * 100) / $FAamt;
                $fortyper = $computeFA * 0.4;
                
                $db->query("UPDATE formative SET FAavg = $computeFA, 40per = $fortyper WHERE formID = '".$formID."'");
            }        
        }
    }
?>