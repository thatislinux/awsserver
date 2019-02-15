<?php
require('../fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
//Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]])


//Cell(width , height , text , border , end line , [align] )


$pdf->Cell(40,10,'Hello World!',1);
$pdf->Cell(60,10,'Powered by FPDF.',0,1,'C');
$pdf->Cell(40,10,'Hello World!',1,0);
$pdf->Cell(40,10,'Hello World!',1,1);
$pdf->Cell(40,10,'Hello World!',1,0);
$pdf->Cell(40,10,'Hello World!',1,0);
$pdf->Output();
?>
