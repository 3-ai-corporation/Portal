<?php

session_start(); 
/*http://www.devmedia.com.br/criando-sessao-para-login-no-php/27347 fazer login*/
 	
	public function usuario($username,$password){
		//Depois de você pegar os usuarios do banco, cê vai salvar nessas variáveis
		$SESSION['username'] = $username;
		$SESSION['password'] = $password;
	}

	public function logar($username, $password)
	{
		header('location:TelaInicial.php');
	}
	
	public function deslogar()
	{
		if(!unset($SESSION('username') == true) and !unset($SESSION('password') == true))
		{
			unset($SESSION['username']);
			unset($SESSION['password']);
			
			session_destroy();
			header('location:index.php');
		}
	}
 
?>
