<?php
require_once("php/dbConfig.php");
require('fpdf185/fpdf.php');
include("php/session_start.php");

ob_end_clean();

$query = "SELECT * FROM studentinfo ORDER BY section";
$result = $db->query($query);
$pdf = new FPDF('L','mm','Letter');
// Header
$pdf->SetFont('Arial','B',16);
$generateTemplateName = "OBE Course Assessment Table";
$pdf->AddPage();
$pdf->Cell(0,10, $generateTemplateName, 0, 1,'C');
// Body
$pdf->SetFont('Arial','',11);
while($row = $result->fetch_object()){
    $studNum = $row->studNum;
    $lastName = $row->lastName;
    $firstName = $row->firstName;
    $studProg = $row->studProg;
    $section = $row->section;
    $pdf->Cell(20,10,$studProg,1);
    $pdf->Cell(60,10,$lastName . ", " . $firstName,1);
    $pdf->Cell(30,10,$studNum,1);
    $pdf->Cell(20,10,$section,1);
    $pdf->Ln();
}
$pdf->Output();
?>