<?php
	$matricula = $_POST['matricula'];
	switch($_REQUEST['acao'])
	{
		case 'logar':
		{
			session_start();
			$_SESSION['matricula'] = $matricula;
			header('location:TelaInicial.php');
		}
		break;
		case 'sair':
		{
			unset($_SESSION['matricula']);
			session_destroy();
			header('location:index.php');
		}
		break;
	}

?>