<?php
    require_once("php/dbConfig.php");

    $data = implode($_SESSION['filter']);
    $modID = session_id();

    $studData = $db->query("SELECT f.formID, f.modID, f.studNum, f.FA1, f.FA2, f.FA3, f.FA4, f.FA5, f.FA6, f.FA7, f.FA8, f.FA9, f.FA10, f.FAavg, ta.SAamt, FA1max, FA2max, FA3max, FA4max, FA5max, FA6max, FA7max, FA8max, FA9max, FA10max 
    FROM formative AS f 
    LEFT JOIN studentinfo AS si ON f.studNum = si.studNum 
    LEFT JOIN tblamt AS ta ON f.modID = ta.modID 
    LEFT JOIN maxscore AS ms ON f.modID = ms.modID 
    WHERE si.section IN ('BM6') AND f.modID = 1 
    ORDER BY si.lastName ASC");
?>