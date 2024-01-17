<?php

require("../tcpdf/tcpdf.php");

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT,true,'UTF-8',false);
$pdf ->setPrintHeader(false);
$pdf ->setPrintFooter(false);

$pdf->AddPage();

$pdf->SetFont('helvetica','B', 28);
$pdf->Cell(0,22,'Wisma',0,1,'C',0,'',false,'M','M');
$pdf->Cell(0,20,'Sekar Wangi',0,1,'C',0,'',false,'M','M');
$pdf->setFont('helvetica','B',10);
$pdf->Cell(0,15,'JL.Pelantar II NO.26, Kelurahan Tanjungpinangkota, Kecamatan Tanjungpinang Kota',0,1,'C',0,'',false,'M','M');
$pdf->Cell(0,15,'Provinsi Kepulauan Riau',0,1,'C',0,'',false,'M','M');
$pdf->SetFont('helvetica','B',10);
$pdf->Cell(0,15,'E-mail: stoon.club@gmail.com',0,1,'C',0,'',false,'M','M');
$pdf->Cell(0,10,'Mobile: 081990364216',0,1,'C',0,'C',false,'M','M');

$pdf->Line(10,60,200,60);
$pdf->Line(10,65,200,65);

$pdf->SetFont('helvetica','B',10);
$pdf->Cell(300,217,'Mobile: 081990364216',0,1,'C','0');


$pdf->Output('example.pdf','I');


?>