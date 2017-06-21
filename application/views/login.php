<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<?php
		echo link_tag('assets/css/style.css');
	?>
</head>
<body>
	<?php
		$atributos = array('name'=>'formulario_login', 'id'=>'formulario_login');
		$nome = array('name'=>'username', 'id' => 'box');
		$senha = array('name'=>'password', 'id' => 'box');
		$btn = array('name'=>'send', 'id'=>'btn');
		echo form_open(base_url('Login/login'), $atributos).
		'Usuário'.br().
		form_input($nome).br().
		'Senha'.br().
		form_password($senha).br().
		form_submit($btn, "Efetuar Login").form_close();
	?>
</body>
</html>
