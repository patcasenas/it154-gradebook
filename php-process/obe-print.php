<?php
    require("../fpdf185/fpdf.php");
    require("../php/session_start.php");
    if(isset($_POST['save'])) {
        $CO1 = $_POST['CO1'];
        $contribution1 = $_POST['contribution1'];
        $task1 = $_POST['task1'];
        $satisfactory1 = $_POST['satisfactory1'];
        $target1 = $_POST['target1'];
        $freq1 = $_POST['freq1'];
        $freqper1 = $_POST['freqper1'];
        $recommendation1 = $_POST['recommendation1'];
        $CO2 = $_POST['CO2'];
        $contribution2 = $_POST['contribution2'];
        $task2 = $_POST['task2'];
        $satisfactory2 = $_POST['satisfactory2'];
        $target2 = $_POST['target2'];
        $freq2 = $_POST['freq2'];
        $freqper2 = $_POST['freqper2'];
        $recommendation2 = $_POST['recommendation2'];
        $CO3 = $_POST['CO3'];
        $contribution3 = $_POST['contribution3'];
        $task3 = $_POST['task3'];
        $satisfactory3 = $_POST['satisfactory3'];
        $target3 = $_POST['target3'];
        $freq3 = $_POST['freq3'];
        $freqper3 = $_POST['freqper3'];
        $recommendation3 = $_POST['recommendation3'];
        ob_start();
        class PDF extends FPDF {
            function Header() {
                $this->Image('../img/mapua-logo.png', 8,8,50);
                $this->SetFont('Arial','B',12);
                $this->Cell(0,6,'OBE Course Assessment Table',0,1,'C');
            }
            function CourseInfo() {
                $db = new mysqli("localhost","root","","soit-gradebook");
                $studProg = implode($_POST['program']);
                $SYstart = $_POST['SYstart'];
                $SYend = $_POST['SYend'];
                $term = $_POST['term'];
                $courseCode = implode($_SESSION['courseTitle']);
                $sql = $db->query("SELECT DISTINCT studNum FROM studentinfo WHERE courseCode = '".$courseCode."' AND studProg = '".$studProg."'");
                $count = mysqli_num_rows($sql);
                $this->SetFont('Arial','B',10);
                $this->Ln(10);
                $this->Multicell(0,6,"Program: " . $studProg . "\n", 0);
                $this->Multicell(0,6, "School Year/Term: 20" . $SYstart . "-20" . $SYend . " " . $term . "Q" . "\n", 0);
                $this->Multicell(0,6, "Course Code: " . $courseCode . "\n", 0);
                $this->Multicell(0,6,"Total Enrolled Students: " . $count,0);
            }
            function COheader() {
                $this->SetFont('Arial','B',8);
                $this->Ln(5);
                $this->Cell(90);
                $this->Cell(125,10,"Assessment",1,0,'C');
                $this->MultiCell(50,5,"No. of Students who Satisfied\n the Outcomes/Quarter",1,'C');
                $this->Cell(60,10,"Course Outcomes",1,0,'C');
                $this->Cell(30,10,"Contribution to SO",1,0,'C');
                $this->Cell(40,10,"Assessment Task",1,0,'C');
                $this->Cell(40,10,"Min. Satisfactory(%)",1,0,'C');
                $this->Cell(45,10,"Target No of Students Passed",1,0,'C');
                $this->Cell(25,10,"Freq",1,0,'C');
                $this->Cell(25,10,"%",1,0,'C');
                $this->Cell(20,10,"Remarks",1,0,'C');
                $this->Cell(50,10,"Recommendation",1,1,'C');
            }
            function CObody() {
                $CO1 = $_POST['CO1'];
                $contribution1 = $_POST['contribution1'];
                $task1 = $_POST['task1'];
                $satisfactory1 = $_POST['satisfactory1'];
                $target1 = $_POST['target1'];
                $freq1 = $_POST['freq1'];
                $freqper1 = $_POST['freqper1'];
                $recommendation1 = $_POST['recommendation1'];

                $CO2 = $_POST['CO2'];
                $contribution2 = $_POST['contribution2'];
                $task2 = $_POST['task2'];
                $satisfactory2 = $_POST['satisfactory2'];
                $target2 = $_POST['target2'];
                $freq2 = $_POST['freq2'];
                $freqper2 = $_POST['freqper2'];
                $recommendation2 = $_POST['recommendation2'];

                $CO3 = $_POST['CO3'];
                $contribution3 = $_POST['contribution3'];
                $task3 = $_POST['task3'];
                $satisfactory3 = $_POST['satisfactory3'];
                $target3 = $_POST['target3'];
                $freq3 = $_POST['freq3'];
                $freqper3 = $_POST['freqper3'];
                $recommendation3 = $_POST['recommendation3'];

                $this->SetFont('Arial','',8);
                $this->Cell(10,40,"CO1",1,0,'C');
                $this->Cell(50,40,$CO1,1,0,'C');
                $this->Cell(30,40,$contribution1,1,0,'C');
                $this->Cell(40,40,$task1,1,0,'C');
                $this->Cell(40,40,$satisfactory1,1,0,'C');
                $this->Cell(45,40,$target1,1,0,'C');
                $this->Cell(25,40,$freq1,1,0,'C');
                $this->Cell(25,40,$freqper1,1,0,'C');
                $this->Cell(20,40,"",1,0,'C');
                $this->Cell(50,40,$recommendation1,1,1,'C');

                $this->Cell(10,40,"CO2",1,0,'C');
                $this->Cell(50,40,$CO2,1,0,'C');
                $this->Cell(30,40,$contribution2,1,0,'C');
                $this->Cell(40,40,$task2,1,0,'C');
                $this->Cell(40,40,$satisfactory2,1,0,'C');
                $this->Cell(45,40,$target2,1,0,'C');
                $this->Cell(25,40,$freq2,1,0,'C');
                $this->Cell(25,40,$freqper2,1,0,'C');
                $this->Cell(20,40,"",1,0,'C');
                $this->Cell(50,40,$recommendation2,1,1,'C');

                $this->Cell(10,40,"CO3",1,0,'C');
                $this->Cell(50,40,$CO3,1,0,'C');
                $this->Cell(30,40,$contribution3,1,0,'C');
                $this->Cell(40,40,$task3,1,0,'C');
                $this->Cell(40,40,$satisfactory3,1,0,'C');
                $this->Cell(45,40,$target3,1,0,'C');
                $this->Cell(25,40,$freq3,1,0,'C');
                $this->Cell(25,40,$freqper3,1,0,'C');
                $this->Cell(20,40,"",1,0,'C');
                $this->Cell(50,40,$recommendation3,1,1,'C');
            }
        }
        $pdf = new PDF();
        $pdf->AddPage('L','Legal');
        $pdf->CourseInfo();
        $pdf->COheader();
        $pdf->CObody();
        $pdf->Output();
        ob_flush();
    }
?>