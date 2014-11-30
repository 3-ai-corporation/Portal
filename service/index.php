<?php

set_include_path(implode(PATH_SEPARATOR, array(realpath(dirname(__FILE__) . '/library'), get_include_path())));

require_once 'Slim/Slim/Slim.php';
require_once 'controller/ProfessoresController.php';
require_once 'controller/AlunosController.php';
require_once 'controller/TemposController.php';
require_once 'controller/DiasLetivosController.php';
require_once 'controller/BimestresController.php';

\Slim\Slim::registerAutoloader();

$app = new Slim\Slim();

$pcontroller = new ProfessoresController;
$alunocontroller = new AlunosController;
$temposcontroller = new TemposController;
$aulascontroller = new DiasLetivosController;
$bimestrescontroller = new BimestresController;

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
//serviço que retorna o email do usuário através da matrícula
$app->get('/retonar_email/:matricula', function($matricula) use ($pcontroller)
{
    echo json_encode($pcontroller->getEmail($matricula));
});
$app->get('/Login/:matricula/:senha',function($matricula,$senha) use ($pcontroller) {
    echo json_encode($pcontroller->login($matricula,$senha));
});
$app->get('/EsqueceuSenha/:matricula/:email',function($matricula,$email) use ($pcontroller) {
    echo json_encode($pcontroller->EsqueceuSenha($matricula,$email));
});

$app->get('/Bimestres/:data',function($date) use ($bimestrescontroller,$app) {   
    //$data = new ActiveRecord\DateTime('2014-03-27 03:04:05') ;
    echo json_encode($bimestrescontroller->retrieve($date));
});



$app->run();
