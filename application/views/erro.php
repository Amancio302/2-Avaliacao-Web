<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Erro</title>
		<?php echo link_tag('assets/css/style.css');?>
	</head>
	<body>
		<?php
			echo anchor(base_url("login/iniciar"), " Home ").
			anchor(base_url("login/logout"), " Logout ").br().br();
			echo br().'Ocorreu um erro'.br(). br().
			anchor(base_url("login/iniciar"), "  Voltar ");
		?>
	</body>
</html>
