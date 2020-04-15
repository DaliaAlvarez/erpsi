<?php  
require_once("fpdf/fpdf.php");
require_once("compra.php");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

$obj = new Compra();
$resultado = $obj->consulta();
$pdf->SetFont('Arial','B',7);
$pdf->Cell(20,10,"Fecha",1,0,'C');
$pdf->Cell(20,10,utf8_decode("Total"),1,0,'C');
$pdf->Cell(20,10,"tipo_pago",1,0,'C');
$pdf->Cell(20,10,"id_cliente",1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',8);
while($fila = $resultado->fetch_assoc()){
	//     ancho,alto,text,borde,no idea,alineación
$pdf->Cell(20,10,$fila["fecha"],1,0,'C');
$pdf->Cell(20,10,$fila["total"],1,0,'C');
$pdf->Cell(20,10,$fila["tipo_pago"],1,0,'C');
$pdf->Cell(20,10,$fila["id_cliente"],1,0,'C');

$pdf->Ln();
}

$pdf->Output();
?>