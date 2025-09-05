<?php
require('fpdf.php');
include 'db.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,'ID');
$pdf->Cell(60,10,'Item Name');
$pdf->Cell(30,10,'Qty');
$pdf->Cell(30,10,'Price');
$pdf->Ln();

$result = $conn->query("SELECT * FROM items");
$pdf->SetFont('Arial','',12);
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(40,10,$row['id']);
    $pdf->Cell(60,10,$row['item_name']);
    $pdf->Cell(30,10,$row['quantity']);
    $pdf->Cell(30,10,$row['price']);
    $pdf->Ln();
}
$pdf->Output();
?>
