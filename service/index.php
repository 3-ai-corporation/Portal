<?php

set_include_path(implode(PATH_SEPARATOR, array(realpath(dirname(__FILE__) . '/library'), get_include_path())));

require_once 'Slim/Slim/Slim.php';
require_once 'controller/ProfessoresController.php';
require_once 'controller/AlunosController.php';
require_once 'controller/TemposController.php';
require_once 'controller/DiasLetivosController.php';

\Slim\Slim::registerAutoloader();

$app = new Slim\Slim();

$pcontroller = new ProfessoresController;
$alunocontroller = new AlunosController;
$temposcontroller = new TemposController;
$aulascontroller = new DiasLetivosController;

<<<<<<< HEAD
/*$app->get('/',function() use ($pcontroller) {
    echo json_encode($pcontroller->retrieveTurmas(134567, true));
});*/
=======
>>>>>>> refs/remotes/origin/iss15
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
$app->get('/EsqueceuSenha/:matricula/:email',function($matricula, $senha) use ($pcontroller) {
    echo json_encode($pcontroller->retrieveSenha($matricula, $senha));	
});
$app->get('/TrocarSenha/:matricula/:senha', function($matricula, $senha) use ($pcontroller)
{
	echo json_encode($pcontroller->changePassword($matricula, $senha));
});
$app->get('/Login/:matricula/:senha',function($matricula,$senha) use ($pcontroller) {
	echo json_encode($pcontroller->login($matricula,$senha));
});

$app->run();
<<<<<<< HEAD
=======

>>>>>>> refs/remotes/origin/iss15
