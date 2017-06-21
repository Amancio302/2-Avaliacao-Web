<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Alterar</title>
		<?php echo link_tag('assets/css/style.css');?>
	</head>
	<body>
		<?php
			echo anchor(base_url("login/iniciar"), " Home ").
			anchor(base_url("login/logout"), "  Logout ").
			heading("Alterar", 3);
			$atributos = array('name'=>'formulario_postagem', 'id'=>'formulario_postagem');
			$btn = array('name'=>'send', 'id'=>'btn');
			$nome = array('name'=>'name', 'id'=>'box');
			$ano = array('name'=>'ano', 'id'=>'box');
			$mes = array('name'=>'mes', 'id'=>'box');
			$dia = array('name'=>'dia', 'id'=>'box');
			$qtd = array('name'=>'integrantes', 'id'=>'box');
			echo form_open(base_url('menu/altera'), $atributos).
			form_hidden('id', $bandas[0]->id).
			form_label("Nome: ", "name").br().
			form_input($nome, $bandas[0]->nome).br().
			'Data de Fundação: '.br();
			$x = explode("-", $bandas[0]->data_fundacao);
			echo 'Ano'.br().
			form_input($ano, $x[0]).br().
			'Mes'.br().
			form_input($mes, $x[1]).br().
			'Dia '.br().
			form_input($dia, $x[2]).br().
			'Quantidade de Integrantes'.br().
			form_input($qtd, $bandas[0]->quant_integrantes).br().
			form_submit($btn, "Alterar").form_close();
		?>
	</body>
</html>
