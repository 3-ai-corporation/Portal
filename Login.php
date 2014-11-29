<?php
	session_start();
	$matricula = $_POST['ematricula'];		
	switch($_REQUEST['acao'])
	{
		case 'logar':		
			$_SESSION['ematricula'] = $matricula;
			echo 'ok';
		break;
		case 'sair':		
			unset($_SESSION['ematricula']);
			session_destroy();
			header('location:index.php');		
		break;
	}

?>