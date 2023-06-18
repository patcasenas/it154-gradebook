<?php
$data = $db->query("SELECT r.raID, s.modNum, s.username, s.SAavg, s.60per, f.FAavg, f.40per
            FROM summative AS s
            LEFT JOIN (SELECT 40per, FAavg, username FROM formative WHERE courseCode = '".$courseCode."' AND section = '".$section."' AND modNum = '".$modNum."') AS f ON s.username = f.username
            LEFT JOIN (SELECT raID, username FROM runavg WHERE courseCode = '".$courseCode."' AND section = '".$section."' AND modNum = '".$modNum."') AS r ON r.username = s.username
            WHERE s.courseCode = '".$courseCode."' AND s.section = '".$section."' AND s.modNum = '".$modNum."'");
            
            while($row = $data->fetch_assoc()) {
                $fortyper = $row['40per'];
                $sixtyper = $row['60per'];
                $SAavg = $row['SAavg'];
                $FAavg = $row['FAavg'];
                $raID = $row['raID'];
                $username = $row['username'];
        
                $update = $db->query("UPDATE runavg SET 60per = $sixtyper, 
                                    SAavg = $SAavg,
                                    40per = $fortyper,
                                    FAavg = $FAavg WHERE raID = $raID");
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