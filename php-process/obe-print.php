<?php
    require("../php/session_start.php");
    require("../fpdf185/fpdf.php");
    if(isset($_POST['save'])) {
        if (implode($_POST['program']) == 0) {
            echo "<script>alert('Try again. Fill all fields of the form')</script>";
            echo "<script>window.location.href='../php-forms/setup-obe.php'</script>";
        } else {
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
                $courseCode = $_SESSION['courseCode'];
                $sql = $db->query("SELECT DISTINCT username FROM studentinfo WHERE courseCode = '".$courseCode."' AND studProg = '".$studProg."'");
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
                $this->Cell(90);
                $this->Cell(125,10,"Assessment",1,0,'C');
                $this->MultiCell(50,5,"No. of Students who Satisfied\n the Outcomes/Quarter",1,'C');
                $this->Cell(60,10,"Course Outcomes",1,0,'C');
                $this->Cell(30,10,"Contribution to SO",1,0,'C');
                $this->Cell(40,10,"Assessment Task",1,0,'C');
                $this->Cell(40,10,"Min. Satisfactory(%)",1,0,'C');
                $this->Cell(45,10,"Target No of Students Passed (%)",1,0,'C');
                $this->Cell(25,10,"Freq",1,0,'C');
                $this->Cell(25,10,"%",1,0,'C');
                $this->Cell(20,10,"Remarks",1,0,'C');
                $this->Cell(50,10,"Recommendation",1,1,'C');
            }
            function CO1() {
                $db = new mysqli("localhost","root","","soit-gradebook");
                $recommendation1 = $_POST['recommendation1'];
                $CO1 = $_POST['CO1'];
                $contribution1 = $_POST['contribution1'];
                $task1 = $_POST['task1'];
                $satisfactory1 = $_POST['satisfactory1'];
                $target1 = $_POST['target1'];
                //count frequency
                $courseCode = $_SESSION['courseCode'];
                $studProg = implode($_POST['program']);
                $sql = $db->query("SELECT username, grade FROM runavg WHERE courseCode = '".$courseCode."' AND studProg = '".$studProg."' AND modNum = 1");
                $freq = 0;
                while($row = $sql->fetch_assoc()) {
                    $grade = $row['grade'];
                    for($x=0;$x<mysqli_num_rows($sql);$x++) {
                        if($grade >= 70) {
                            $freq++;
                            break;
                        }
                    }
                }
                //compute % of students passed
                $sql = $db->query("SELECT DISTINCT username FROM studentinfo WHERE courseCode = '".$courseCode."' AND studProg = '".$studProg."'");
                $count = mysqli_num_rows($sql);
                    $freqper = ($freq*100)/$count;

                $compute_x = $this->getX();
                $compute_y = $this->getY();

                $this->SetFont('Arial','',8);
                $this->Cell(10,40,"CO1",1,0,'C');
                $this->Cell(50,40,"",1,'C');
                $this->SetXY($compute_x+10,$compute_y);
                $this->MultiCell(50,13.3,$CO1,0,'L');
                $this->SetXY($compute_x+60,$compute_y);
                $this->Cell(30,40,$contribution1,1,0,'C');
                $this->Cell(40,40,$task1,1,0,'C');
                $this->Cell(40,40,$satisfactory1,1,0,'C');
                $this->Cell(45,40,$target1,1,0,'C');
                $this->Cell(25,40,$freq,1,0,'C');
                $this->Cell(25,40,number_format($freqper,2),1,0,'C');
                    if($target1<=$freqper){
                $this->Cell(20,40,"Passed",1,0,'C');
                    } else {
                $this->Cell(20,40,"Failed",1,0,'C');
                    }
                $x = $this->GetX();
                $y = $this->GetY();
                $this->MultiCell(50,13.3,$recommendation1,0,'L');
                $this->SetXY($x,$y);
                $this->Cell(50,40,"",1,1);
            }
            function CO2() {
                $db = new mysqli("localhost","root","","soit-gradebook");
                $CO2 = $_POST['CO2'];
                $contribution2 = $_POST['contribution2'];
                $task2 = $_POST['task2'];
                $satisfactory2 = $_POST['satisfactory2'];
                $target2 = $_POST['target2'];
                $recommendation2 = $_POST['recommendation2'];
                //count frequency
                $courseCode = $_SESSION['courseCode'];
                $studProg = implode($_POST['program']);
                $sql = $db->query("SELECT username, grade FROM runavg WHERE courseCode = '".$courseCode."' AND studProg = '".$studProg."' AND modNum = 2");
                $freq = 0;
                while($row = $sql->fetch_assoc()) {
                    $grade = $row['grade'];
                    for($x=0;$x<mysqli_num_rows($sql);$x++) {
                        if($grade >= 70) {
                            $freq++;
                            break;
                        }
                    }
                }
                //compute % of students passed
                $sql = $db->query("SELECT DISTINCT username FROM studentinfo WHERE courseCode = '".$courseCode."' AND studProg = '".$studProg."'");
                $count = mysqli_num_rows($sql);
                $freqper = ($freq*100)/$count;
                $compute_x = $this->GetX();
                $compute_y = $this->GetY();
                
                $this->Cell(10,40,"CO2",1,0,'C');
                $this->Cell(50,40,"",1);
                $this->SetXY($compute_x+10,$compute_y);
                $this->MultiCell(50,13.3,$CO2,0,'L');
                $this->SetXY($compute_x+60,$compute_y);
                $this->Cell(30,40,$contribution2,1,0,'C');
                $this->Cell(40,40,$task2,1,0,'C');
                $this->Cell(40,40,$satisfactory2,1,0,'C');
                $this->Cell(45,40,$target2,1,0,'C');
                $this->Cell(25,40,$freq,1,0,'C');
                $this->Cell(25,40,number_format($freqper,2),1,0,'C');
                    if($target2<=$freqper){
                $this->Cell(20,40,"Passed",1,0,'C');
                    } else {
                $this->Cell(20,40,"Failed",1,0,'C');
                    }
                $x = $this->GetX();
                $y = $this->GetY();
                $this->MultiCell(50,13.3,$recommendation2,0,'L');
                $this->SetXY($x,$y);
                $this->Cell(50,40,"",1,1);
            }
            function CO3(){
                $db = new mysqli("localhost","root","","soit-gradebook");
                $CO3 = $_POST['CO3'];
                $contribution3 = $_POST['contribution3'];
                $task3 = $_POST['task3'];
                $satisfactory3 = $_POST['satisfactory3'];
                $target3 = $_POST['target3'];
                $recommendation3 = $_POST['recommendation3'];
                //count frequency
                $courseCode = $_SESSION['courseCode'];
                $studProg = implode($_POST['program']);
                $sql = $db->query("SELECT username, grade FROM runavg WHERE courseCode = '".$courseCode."' AND studProg = '".$studProg."' AND modNum = 2");
                $freq = 0;
                while($row = $sql->fetch_assoc()) {
                    $grade = $row['grade'];
                    for($x=0;$x<mysqli_num_rows($sql);$x++) {
                        if($grade >= 70) {
                            $freq++;
                            break;
                        }
                    }
                }
                //compute % of students passed
                $sql = $db->query("SELECT DISTINCT username FROM studentinfo WHERE courseCode = '".$courseCode."' AND studProg = '".$studProg."'");
                $count = mysqli_num_rows($sql);
                $freqper = ($freq*100)/$count;
                $compute_x = $this->GetX();
                $compute_y = $this->GetY();
                $compute_x = $this->getX();
                $compute_y = $this->getY();

                $this->Cell(10,40,"CO3",1,0,'C');
                $this->Cell(50,40,"",1,'C');
                $this->SetXY($compute_x+10,$compute_y);
                $this->MultiCell(50,13.3,$CO3,0,'L');
                $this->SetXY($compute_x+60,$compute_y);
                $this->Cell(30,40,$contribution3,1,0,'C');
                $this->Cell(40,40,$task3,1,0,'C');
                $this->Cell(40,40,$satisfactory3,1,0,'C');
                $this->Cell(45,40,$target3,1,0,'C');
                $this->Cell(25,40,$freq,1,0,'C');
                $this->Cell(25,40,number_format($freqper,2),1,0,'C');
                    if($target3<=$freqper){
                $this->Cell(20,40,"Passed",1,0,'C');
                    } else {
                $this->Cell(20,40,"Failed",1,0,'C');
                    }
                $x = $this->GetX();
                $y = $this->GetY();
                $this->MultiCell(50,13.3,$recommendation3,0,'L');
                $this->SetXY($x,$y);
                $this->Cell(50,40,"",1,1);
            }
        }
        $pdf = new PDF();
        $pdf->AddPage('L','Legal');
        $pdf->CourseInfo();
        $pdf->COheader();
        $db = new mysqli("localhost","root","","soit-gradebook");
        $courseCode = $_SESSION['courseCode'];
        $query = $db->query("SELECT modNum from moduleinfo WHERE courseCode = '".$courseCode."'");
        if(mysqli_num_rows($query) == 3) {
            $pdf->CO1();
            $pdf->CO2();
            $pdf->CO3();
        } else if(mysqli_num_rows($query) == 2) {
            $pdf->CO1();
            $pdf->CO2();
        } else if (mysqli_num_rows($query) == 1) {
            $pdf->CO1();
        }
        $pdf->Output('I','OBE Course Assessment.pdf');
        ob_flush();
    }
    }
?>