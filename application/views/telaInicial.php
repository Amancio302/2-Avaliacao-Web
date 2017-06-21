<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
<html>
	<head>
		<meta charset="utf-8">
	<title>Tela Inicial</title>
	<?php echo link_tag('assets/css/style.css');?>
	</head>
	
	<body>
		<?php 
			echo anchor(base_url("login/logout"), " Logout ").
			     anchor(base_url("menu/cadastrar"), " Cadastrar ").
				 anchor(base_url("menu/relatorio"), "  Gerar Relatório ").br().br().br();
				foreach($bandas as $band){
					echo "Data de Criação: " . date("d/m/Y", strtotime($band->data_fundacao)).
						 " - Nome da Banda: " . $band->nome;
		?>
		<div id='teste'>
			<?php
					echo anchor(base_url("menu/alterar/".$band->id), " Alterar  ") . 
					anchor(base_url("menu/excluir/").$band->id, "  Excluir  ") .br() .br();		 
				}
			?>
		</div>
	</body>
</html>



