<?php

set_include_path(implode(PATH_SEPARATOR, array(realpath(dirname(__FILE__) . '/library'), get_include_path())));

require_once 'Slim/Slim/Slim.php';
require_once 'controller/ProfessoresController.php';

\Slim\Slim::registerAutoloader();
$app = new Slim\Slim();

$pcontroller = new ProfessoresController;

$app->get('/',function() use ($pcontroller) {
    echo json_encode($pcontroller->retrieveTurmas(134567));
});

$app->get('/disciplinas', function() use ($pcontroller) {
   echo json_encode($pcontroller->retrieveDisciplinas(2,2,134567));
});

$app->run();

?>