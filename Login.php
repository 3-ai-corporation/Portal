<?php

	session_start();
	$matricula = $POST['matricula'];

	switch($_REQUEST['acao'])
	{
		case 'logar':
		{
			$_SESSION['matricula'] = $POST['matricula'];
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