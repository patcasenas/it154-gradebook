<?php
    require_once("php/dbConfig.php");
    $modNum = session_id();
    $courseCode = implode($_SESSION['courseTitle']);

    $studData = $db->query("SELECT s.sumID, s.modNum, s.studNum, s.SA1, s.SA2, s.SA3, s.SAavg, s.60per, ta.SAamt, ms.SA1max, ms.SA2max, ms.SA3max 
                            FROM summative AS s
                            LEFT JOIN studentinfo AS si ON s.studNum = si.studNum
                            LEFT JOIN 
                            (SELECT * FROM tblamt 
                            where modNum = '".$modNum."' and courseCode = '".$courseCode."') AS ta ON s.modNum = ta.modNum
                            LEFT JOIN 
                            (SELECT * FROM maxscore 
                            where modNum = '".$modNum."' and courseCode = '".$courseCode."')
                            AS ms ON s.modNum = ms.modNum
                            WHERE s.modNum = 1 AND ta.courseCode = '".$courseCode."' AND ta.modNum = '".$modNum."'
                            ORDER BY si.lastName ASC;");
    if(!$studData) {
        mysqli_error($db);
    } else {
        while($row = $studData->fetch_assoc()) {
            $sumID = $row['sumID'];
            $SA1 = $row['SA1'];
            $SA2 = $row['SA2'];
            $SA3 = $row['SA3'];
            $SAavg = $row['SAavg'];
            $SAamt = $row['SAamt'];
            $SA1max = $row['SA1max'];
            $SA2max = $row['SA2max'];
            $SA3max = $row['SA3max'];
            if($SAamt == 3) {
                $computeSA = ($SA1/$SA1max+$SA2/$SA2max+$SA3/$SA3max)*100/$SAamt;
                $sixtyper = $computeSA*0.6;
                $updateSA = "UPDATE summative SET SAavg = $computeSA, 60per = $sixtyper WHERE sumID = '".$sumID."'";
                mysqli_query($db,$updateSA);
            } else if($SAamt == 2) {
                $computeSA = ($SA1/$SA1max+$SA2/$SA2max)*100/$SAamt;
                $sixtyper = $computeSA*0.6;
                $db->query("UPDATE summative SET SAavg = $computeSA, 60per = $sixtyper WHERE sumID = '".$sumID."'");    
            } else if($SAamt == 1) {
                $computeSA = ($SA1/$SA1max)*100/$SAamt;
                $sixtyper = $computeSA*0.6;
                $db->query("UPDATE summative SET SAavg = $computeSA, 60per = $sixtyper WHERE sumID = '".$sumID."'");    
            }
        }
    }
?>