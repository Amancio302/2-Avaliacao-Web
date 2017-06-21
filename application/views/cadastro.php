<!DOCTYPE html>
<html lang="pt-br">
<html>
	<head>
		<meta charset="utf-8">
		<title>Cadastro</title>
		<?php echo link_tag('assets/css/style.css');?>
	</head>
	<body>
		<?php
			echo anchor(base_url("login/iniciar"), " Home ").
			anchor(base_url("login/logout"), "  Logout ").
			heading("Cadastrar", 3);
			$atributos = array('name'=>'formulario_cadastrar', 'id'=>'formulario_cadastrar');
			$btn = array('name'=>'send', 'id'=>'btn');
			$nome = array('name'=>'name', 'id'=>'box');
			$ano = array('name'=>'ano', 'id'=>'box');
			$mes = array('name'=>'mes', 'id'=>'box');
			$dia = array('name'=>'dia', 'id'=>'box');
			$qtd = array('name'=>'integrantes', 'id'=>'box');
			echo form_open(base_url('Menu/cadastro'), $atributos).
			'Nome'.br().
			form_input($nome).br().
			"Data de Fundação: ".br().
			'Ano'.
			form_input($ano).br().
			'Mes'.
			form_input($mes).br().
			'Dia '.
			form_input($dia).br().
			'Quantidade de Integrantes'.br().
			form_input($qtd).br().
			form_submit($btn, "Cadastrar").form_close();
		?>
	</body>
</html>
