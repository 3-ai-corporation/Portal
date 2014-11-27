<?php

set_include_path(implode(PATH_SEPARATOR, array(realpath(dirname(__FILE__) . '/library'), get_include_path())));

require_once 'Slim/Slim/Slim.php';
require_once 'controller/ProfessoresController.php';
require_once 'controller/AlunosController.php';
require_once 'controller/TemposController.php';
require_once 'controller/DiasLetivosController.php';
	session_start();

	if( isset($_SESSION['ematricula']))
	{
		header('location:TelaInicial.php');
	}
?>

<!DOCTYPE html>

<html>
<!-- http://support.cloud9ide.com/entries/21285626-How-do-I-push-my-Cloud9-project-to-GitHub -->
<!-- https://docs.c9.io/setting_up_github_workspace.html -->
<!-- Ótimo site: http://www.angularcode.com/ -->
<!-- Bom exemplo de sistema de login usando php, mysql e angularjs -->
<!-- http://www.angularcode.com/user-authentication-using-angularjs-php-mysql/ -->
<head>
	<meta http-equiv = "Content-Type" content = "text/html;charset=utf-8"/>
	 <script src = "assets/js/Validacao.js"></script>
	 <script src = "assets/js/jquery-2.1.1.js"></script>	
     <link type="text/css" rel="stylesheet" href="assets/css/stylesheet_TelaLogin.css">
	
     <TITLE>Login Portal</TITLE>
</head>

<body>
	<div id = "main">
		<div id="dadosLogin">
			<div class="imgLogo">
				<img class="P"src = "assets/img/Logo_Fundacao.jpg"></img>
			</div>
			<form>
				<ul class="listItem">
					<li>
						<div id="iMatricula">
						<p class="lblLogin">Matrícula: </p>
						<input onkeydown="LoginInput_OnKeyDown(event, matricula.value, senha.value);" class="txtLogin" type="text" name="matricula" onkeypress = " validar_matricula2(matricula);" maxlength = "6"/>
						</div>
					</li>
						<li>
							<div id="iSenha">
								<p class="lblLogin" >Senha: </p>
								<input onkeydown="LoginInput_OnKeyDown(event, matricula.value, senha.value);" class="txtLogin" type="password" name="senha" onkeypress = "validar_senha(senha);" maxlength = "10" />
						</li>
						<li>
							<div id ="aEsquecer">
								<a class="linkEsquecer"  href="#" onclick="document.getElementById('esqueceu_senha').style.display='block';" >Esqueceu sua senha?</a>
							</div>
						</li>
						<li>
							<div id="esqueceu_senha">
								<div id="titleEsqueceu">
									<h4 id = "titulopop-up">Esqueceu sua senha?</h4>
									<a id = "linkClose"href="#" onclick="document.getElementById('esqueceu_senha').style.display='none';">X</a>
								</div>
								<div id="eMatricula">
									<p class="lblEsqueceu">Matrícula: </p>
									<input class="txtEsqueceu" type="text" name="ematricula" value="" onkeydown = " validar_matricula2(ematricula);" maxlength = "6"/>
								</div>
								<div id="eEmail">
									<p class="lblEsqueceu" >Email: </p>
									<input class="txtEsqueceu" type="email" name="email" value="" onkeydown = "IsMail($email);"/>
								</div>
								<div id="iSubmit">
									<input class="btnEnviar" value="Enviar" onclick = "ValidarEsqueceuSenha(ematricula.value, email.value)" type="button" style="width: 100px; height: 25px" />
								</div>
							</div>	
						</li>
						<li>                        
							<div id="iSubmit">
								<input onclick = "validar(matricula.value, senha.value);" class="btnProsseguir" type = "button" value="Prosseguir"  style="width: 150px; height: 25px" />
							</div>
						</li>
				</ul>
				<div id="alert"></div>
			</form>		
		</div>
	</div>
</body>

\Slim\Slim::registerAutoloader();

$app = new Slim\Slim();

$pcontroller = new ProfessoresController;
$alunocontroller = new AlunosController;
$temposcontroller = new TemposController;
$aulascontroller = new DiasLetivosController;

/*$app->get('/',function() use ($pcontroller) {
    echo json_encode($pcontroller->retrieveTurmas(134567, true));
});*/
$app->post('/service/plano-aula/update/',function($id) use ($temposcontroller) {
    echo json_encode($temposcontroller->retrieve($id));
});

$app->get('/notify-recados',function() use ($pcontroller) {
    echo json_encode($pcontroller->getNotificacoesByCategory(123456,'recados'));
});

$app->get('/notify-alunos',function() use ($pcontroller) {
    echo json_encode($pcontroller->getNotificacoesByCategory(123456,'alunos'));
});
$app->get('/notify-portal',function() use ($pcontroller) {
    echo json_encode($pcontroller->getNotificacoesByCategory(123456,'portal'));
});
$app->get('/temposAula',function() use ($aulascontroller) {
    echo json_encode($aulascontroller->retrieve());
});
$app->get('/alunosTurma',function() use ($alunocontroller) {
    echo json_encode($alunocontroller->retrieveAlunos(33));
});

$app->run();
