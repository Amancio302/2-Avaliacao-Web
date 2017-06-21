<?php
	include_once "assets/fpdf/fpdf.php";
	$titulos = array(
		'Nome da Banda',
		utf8_decode('Data de Fundação'),
		'Quantidade de Integrantes'
		);	
	$larguras = array(200, 150, 200);
	$dados = array();
	foreach($bandas as $band){
		$dados[] = array(utf8_decode($band->nome), date("d/m/Y", strtotime($band->data_fundacao)), $band->quant_integrantes);
	}
	$pdf = new FPDF('P', 'pt', 'A4');
	$pdf->AddPage();
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->SetFillColor(130, 80, 70);
	$pdf->SetTextColor(255);
	$pdf->SetLineWidth(1);
	$i = 0;
	foreach($titulos as $key){
		$pdf->Cell($larguras[$i], 15, $key, 1, 0, 'C', true);
		$i++;
	}
	$pdf->Ln();
	$pdf->SetFillColor(200, 200, 200);
	$pdf->SetTextColor(0);
	$pdf->SetFont('Arial', '', 12);
	$colore = false;
	$total = 0;
	foreach($dados as $linha){
		$col = 0;
		foreach($linha as $coluna){
			if(is_int($coluna)){
				$pdf->Cell($larguras[$col], 14, number_format($coluna), 'LR', 0, 'R', $colore);
			}else{
				$pdf->Cell($larguras[$col], 14, $coluna, 'LR', 0, 'L', $colore);
			}
			$col++;
		}
		$pdf->Ln();
		$colore = !$colore;
	}
	$pdf->SetFont('Arial', 'B', 12);
	$largura1 = array_sum($larguras)-$larguras[count($larguras)-1];
	$largura2 = array_sum($larguras)-$largura1;
	$pdf->Cell(550,0,'','T');
	$pdf->OutPut();
?>
