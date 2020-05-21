<?php
	include 'plantilla.php';
	require '../conexionBD.php';
	
	$query = "SELECT *FROM mis_productos";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(70,6,'Nombre',1,0,'C',1);
	$pdf->Cell(70,6,'Descripcion',1,0,'C',1);
	$pdf->Cell(40,6,'Precio',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(70,6,utf8_decode($row['name']),1,0,'C');
		$pdf->Cell(70,6,$row['description'],1,0,'C');
		$pdf->Cell(40,6,utf8_decode($row['price'].' COP'),1,1,'C');
	}
	$pdf->Output();
?>