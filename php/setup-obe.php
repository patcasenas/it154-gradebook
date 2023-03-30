<?php
    include("dbConfig.php");

    if(isset($_POST['save'])) {
        $studProg = implode($_POST['program']);
        $schoolYear = $_POST['schoolYear'];
        $schoolTerm = $_POST['schoolTerm'];
        $courseCode = $_POST['courseCode'];
        $courseTitle = $_POST['courseTitle'];

        $insertCourse = "INSERT INTO courseinfo (studProg, schoolYear, schoolTerm, courseCode, courseTitle)
                        VALUES ('".$studProg."', $schoolYear, $schoolTerm, '".$courseCode."', '".$courseTitle."')";
        mysqli_query($db,$insertCourse);

        $CO1 = $_POST['CO1'];
        $contribution1 = $_POST['contribution1'];
        $task1 = $_POST['task1'];
        $satisfactory1 = $_POST['satisfactory1'];
        $target1 = $_POST['target1'];
        $freq1 = $_POST['freq1'];
        $freqper1 = $_POST['freqper1'];
        $recommendation1 = $_POST['recommendation1'];

        $insertCO1 = "INSERT INTO setupobe (CO, contribution, task, satisfactory, target, freq, freqper, recommendation)
                    VALUES ('".$CO1."', '".$contribution1."', '".$task1."', $satisfactory1, $target1, $freq1, $freqper1, '".$recommendation1."')";
        mysqli_query($db,$insertCO1);

        $CO2 = $_POST['CO2'];
        $contribution2 = $_POST['contribution2'];
        $task2 = $_POST['task2'];
        $satisfactory2 = $_POST['satisfactory2'];
        $target2 = $_POST['target2'];
        $freq2 = $_POST['freq2'];
        $freqper2 = $_POST['freqper2'];
        $recommendation2 = $_POST['recommendation2'];

        $insertCO2 = "INSERT INTO setupobe (CO, contribution, task, satisfactory, target, freq, freqper, recommendation)
        VALUES ('".$CO2."', '".$contribution2."', '".$task2."', $satisfactory2, $target2, $freq2, $freqper2, '".$recommendation2."')";
        mysqli_query($db,$insertCO2);

        $CO3 = $_POST['CO3'];
        $contribution3 = $_POST['contribution3'];
        $task3 = $_POST['task3'];
        $satisfactory3 = $_POST['satisfactory3'];
        $target3 = $_POST['target3'];
        $freq3 = $_POST['freq3'];
        $freqper3 = $_POST['freqper3'];
        $recommendation3 = $_POST['recommendation3'];

        $insertCO3 = "INSERT INTO setupobe (CO, contribution, task, satisfactory, target, freq, freqper, recommendation)
        VALUES ('".$CO3."', '".$contribution3."', '".$task3."', $satisfactory3, $target3, $freq3, $freqper3, '".$recommendation3."')";
        mysqli_query($db,$insertCO2);

        if(!$insertCO1 && !$insertCO2 && !$insertCO3) {
            echo "error" . mysqli_error($db);
        } else {
            echo "<script>alert('You've successfully set OBE Course Assessment');</script>";
            // echo "<script>javascript:history.go(-1);</script>";
        }
    }

?>