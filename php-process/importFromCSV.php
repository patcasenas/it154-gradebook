<?php
    require_once("../php/dbConfig.php");
    $result = $db->query("SHOW TABLES LIKE 'gc%'");

    if ($result) {
        while ($row = $result->fetch_row()) {
            $tableName = $row[0];
            // echo $tableName . '<br>';
            $firstPos = strpos($tableName, "_");
            $secondPos = strpos($tableName, "_", $firstPos + 1);

            $courseCode = strtoupper(substr($tableName, $firstPos +1, $secondPos - $firstPos - 1));
            // echo $courseCode . '<br>';
            
            $thirdPos = strpos($tableName, "_", $secondPos+1);
            $section = strtoupper(substr($tableName, $secondPos + 1, $thirdPos - $secondPos - 1));
            // echo $section . '<br>';


            $query = $db->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$tableName' AND COLUMN_NAME LIKE 'M%'");

    if ($query) {
        while ($row = $query->fetch_assoc()) {
            $columnName = $row['COLUMN_NAME'];
            // echo $columnName . '<br>';

            if (preg_match('/\d+/', $columnName, $matches)) {
                $modNum = $matches[0];
                // echo $modNum . '<br>';
            }

            $firstUnder = strpos($columnName, "_");
            $secondUnder = strpos($columnName, "_", $firstUnder + 1);

            $assessment = substr($columnName, $firstUnder + 1, $secondUnder - $firstUnder - 1);
            // echo $assessment . '<br>';

            $studData = $db->query("SELECT * FROM $tableName");
            while ($row = $studData->fetch_assoc()) {
                if (strpos($columnName, "SA") !== false) {
                    if ($assessment == "Total") {
                        continue;
                    } elseif ($assessment == "SA") {
                        $assessment = "SA1";
                    }
                    $value = $row[$columnName];
                    $db->query("UPDATE summative SET $assessment = '".$value."' WHERE modNum = $modNum AND courseCode = '".$courseCode."' AND username ='".$row['Username']."'");
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