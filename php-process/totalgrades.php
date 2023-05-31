<?php
    require_once("php/dbConfig.php");

    $data = $db->query("SELECT s.modNum, s.studNum, s.SAavg, s.60per, f.FAavg, f.40per
                        FROM summative AS s
                        RIGHT JOIN formative AS f ON s.studNum = f.studNum");
    
    while($row = $data->fetch_assoc()) {
        $fortyper = $row['40per'];
        $sixtyper = $row['60per'];
        $SAavg = $row['SAavg'];
        $FAavg = $row['FAavg'];

        $update = $db->query("UPDATE runavg SET 60per = (SELECT 60per FROM summative WHERE runavg.modNum = summative.modNum AND runavg.studNum = summative.studNum), 
                            SAavg = (SELECT SAavg FROM summative WHERE runavg.modNum = summative.modNum AND runavg.studNum = summative.studNum),
                            40per = (SELECT 40per FROM formative WHERE runavg.modNum = formative.modNum AND runavg.studNum = formative.studNum),
                            FAavg = (SELECT FAavg FROM formative WHERE runavg.modNum = formative.modNum AND runavg.studNum = formative.studNum)");
    }

    $runAvg = $db->query("SELECT * FROM runavg");
    while($row = $runAvg->fetch_assoc()) {
        $fortyper = $row['40per'];
        $sixtyper = $row['60per'];
        $studNum = $row['studNum'];
        $raID = $row['raID'];

        $compute = $fortyper+$sixtyper;
        $updateGrade = $db->query("UPDATE runavg SET grade = $compute WHERE raID = '".$raID."'");
    }

    $transmute = $db->query("SELECT grade, transmutation, raID FROM runavg");
    while ($row = $transmute->fetch_assoc()) {
        $grade = $row['grade'];
        $raID = $row['raID'];

        switch (true) {
            case ($grade <= 59.90):
                $updateTrans = $db->query("UPDATE runavg SET transmutation = 'IP' WHERE raID = '".$raID."'");
                break;
            case ($grade <= 69.99 && $grade >= 60.00):
                $updateGrade = $db->query("UPDATE runavg SET transmutation = 'I' WHERE raID = '".$raID."'");
                break;
            case ($grade <= 72.90 && $grade >= 70.00):
                $updateGrade = $db->query("UPDATE runavg SET transmutation = 3.00 WHERE raID = '".$raID."'");
                break;
            case ($grade <= 76.90 && $grade >= 73.00):
                $updateGrade = $db->query("UPDATE runavg SET transmutation = 2.75 WHERE raID = '".$raID."'");
                break;
            case ($grade <= 80.90 && $grade >= 77.00):
                $updateGrade = $db->query("UPDATE runavg SET transmutation = 2.50 WHERE raID = '".$raID."'");
                break;
            case ($grade <= 83.90 && $grade >= 81.00):
                $updateGrade = $db->query("UPDATE runavg SET transmutation = 2.25 WHERE raID = '".$raID."'");
                break;
            case ($grade <= 86.90 && $grade >= 84.00):
                $updateGrade = $db->query("UPDATE runavg SET transmutation = 2.00 WHERE raID = '".$raID."'");
                break;
            case ($grade <= 90.90 && $grade >= 87.00):
                $updateGrade = $db->query("UPDATE runavg SET transmutation = 1.75 WHERE raID = '".$raID."'");
                break;
            case ($grade <= 93.90 && $grade >= 91.00):
                $updateGrade = $db->query("UPDATE runavg SET transmutation = 1.50 WHERE raID = '".$raID."'");
                break;
            case ($grade <= 96.90 && $grade >= 94.00):
                $updateGrade = $db->query("UPDATE runavg SET transmutation = 1.25 WHERE raID = '".$raID."'");
                break;
            case ($grade <= 100.00 && $grade >= 97.00):
                $updateGrade = $db->query("UPDATE runavg SET transmutation = 1.00 WHERE raID = '".$raID."'");
                break;
        }
}
?>