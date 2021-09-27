<?php
require_once("fpdf/fpdf.php");

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->SetMargins(10, 10);
// $pdf->SetAutoPageBreak(true, 10);
// $pdf->AddPage();
$pdf->SetFont('courier', '', 9);
for ($i = 0; $i < 1000; $i++) {
    $qr = rand();
    if ($i % 98 === 0) {
        $pdf->AddPage();
    }
    $x = $i % 98;
    $pdf->Image("http://localhost/qrcode/qr_generator.php?code=" . $qr, (($x % 7) * 30) + 5, (((int)($x / 7)) * 20) + 5, 20, 20, "png");
    $pdf->Text((($x % 7) * 30) + 5, (((int)($x / 7)) * 20) + 25, $i);
}

$pdf->Output();
