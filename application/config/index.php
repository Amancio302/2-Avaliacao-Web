<?php
	include_once "fpdf/fpdf.php";
	
	//cria matriz com os titulos 
	//e argura das colunas
	$titulos = array(
		utf8_decode('Posição'), 
		utf8_decode('País'),
		'Nome',
		utf8_decode('Pontuação')
	);
	$larguras = array(50, 160, 200, 70);
	$dados = array();
	$dados[] = array(1, 'UK', 'Iron Maiden', 910);
	$dados[] = array(2, 'UK', 'Led Zeppelin', 980);
	$dados[] = array(3, 'UK', 'The Beatles', 970);
	$dados[] = array(4, 'UK', 'The Who', 960);
	$dados[] = array(5, 'UK', 'Pink Floyd', 990);
	
	$pdf = new FPDF('P', 'pt', 'A4');
	$pdf->AddPage();
	$pdf->SetFont('Arial', 'B', 12);
	
	//cor de preenchimento e espessura de linha
	$pdf->SetFillColor(130, 80, 70);
	$pdf->SetTextColor(255);
	$pdf->SetLineWidth(1);
	
	//criar o cabeçalo da tabela
	$i = 0;
	foreach($titulos as $key){
		$pdf->Cell($larguras[$i], 15, $key, 1, 0, 'C', true);
		$i++;
	}
	
	//quebra de linha
	$pdf->Ln();
	$pdf->SetFillColor(200, 200, 200);
	$pdf->SetTextColor(0);
	$pdf->SetFont('Arial', '', 12);
	
	//adiciona os dados
	$colore = false;
	$total = 0;
	foreach($dados as $linha){
		$col = 0;
		foreach($linha as $coluna){
			//se inteiro alinha a direita 
			if(is_int($coluna)){
				$pdf->Cell($larguras[$col], 14, number_format($coluna), 'LR', 0, 'R', $colore);
			}else{
				$pdf->Cell($larguras[$col], 14, $coluna, 'LR', 0, 'L', $colore);
			}
			$col++;
		}
		$total+=$linha[3];
		$pdf->Ln();
		$colore = !$colore;
	}
	
	//define a fonte dos totais
	$pdf->SetFont('Arial', 'B', 12);
	
	//calcula a largura das celulas
	$largura1 = array_sum($larguras)-$larguras[count($larguras)-1];
	$largura2 = array_sum($larguras)-$largura1;
	
	//exibe a linha de total
	$pdf->Cell($largura1, 20, 'Total', 1, 0, 'L', true);
	$pdf->Cell($largura2, 20, $total, 1, 0, 'R', true);
	
	$pdf->OutPut();
?>
