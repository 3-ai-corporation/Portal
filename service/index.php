<?php

set_include_path(implode(PATH_SEPARATOR, array(realpath(dirname(__FILE__) . '/library'), get_include_path())));

require_once 'Slim/Slim/Slim.php';
require_once 'controller/ProfessoresController.php';
require_once 'controller/AlunosController.php';

\Slim\Slim::registerAutoloader();
$app = new Slim\Slim();

$pcontroller = new ProfessoresController;

$acontroller = new AlunosController;

/*$app->get('/',function() use ($pcontroller) {
    echo json_encode($pcontroller->retrieveTurmas(134567, true));
});*/

$app->get('/notify-recados',function() use ($pcontroller) {
    echo json_encode($pcontroller->getNotificacoesByCategory(123456,'recados'));
});

$app->get('/notify-alunos',function() use ($pcontroller) {
    echo json_encode($pcontroller->getNotificacoesByCategory(123456,'alunos'));
});
$app->get('/notify-portal',function() use ($pcontroller) {
    echo json_encode($pcontroller->getNotificacoesByCategory(123456,'portal'));
});

$app->get('/alunosTurma',function() use ($acontroller) {
    echo json_encode($acontroller->retrieveAlunos(1));
});

$app->run();

?>