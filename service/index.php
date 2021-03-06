<?php

set_include_path(implode(PATH_SEPARATOR, array(realpath(dirname(__FILE__) . '/library'), get_include_path())));

require_once 'Slim/Slim/Slim.php';
require_once 'controller/ProfessoresController.php';
require_once 'controller/AlunosController.php';
require_once 'controller/TemposController.php';
require_once 'controller/DiasLetivosController.php';
require_once 'controller/BimestresController.php';
require_once 'controller/FrequenciasController.php';
require_once 'controller/CursosController.php';
require_once 'controller/TurmasController.php';
require_once 'controller/NotasController.php';

\Slim\Slim::registerAutoloader();

$app = new Slim\Slim();

$pcontroller = new ProfessoresController;
$alunocontroller = new AlunosController;
$temposcontroller = new TemposController;
$aulascontroller = new DiasLetivosController;
$bimcontroller = new BimestresController;
$frequenciascontroller = new FrequenciasController;
$cursoscontroller = new CursosController;
$turmascontroller  = new TurmasController;
$ncontroller = new NotasController;

/*$app->get('/',function() use ($pcontroller) {
    echo json_encode($pcontroller->retrieveTurmas(134567, true));
});*/

$app->post('/plano-aula',function($id) use ($temposcontroller) {
    echo json_encode($temposcontroller->retrieve($id));
});

$app->get('/notify-recados',function() use ($pcontroller) {
    echo json_encode($pcontroller->getNotificacoesByCategory($login,'recados'));
});

$app->get('/notify-alunos',function() use ($pcontroller) {
    echo json_encode($pcontroller->getNotificacoesByCategory($login,'alunos'));
});
$app->get('/notify-portal',function() use ($pcontroller) {
    echo json_encode($pcontroller->getNotificacoesByCategory($login,'portal'));

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

$app->get('/temposAula',function() use ($aulascontroller) {
    echo json_encode($aulascontroller->retrieveByIds(2,33,2));
});

$app->get('/alunosTurma',function() use ($alunocontroller) {
    echo json_encode($alunocontroller->retrieveAlunosFreq(33,5,2));
});

$app->get('/cabecalhoFreq', function() use ($turmascontroller){
	echo json_encode($turmascontroller->retrieveCabecalho(2,33));
});

$app->get('/filtrarTempos',function() use ($temposcontroller) {
    echo json_encode($temposcontroller->retrievebyDay(1));
});

$app->get('/frequenciasAula',function() use ($frequenciascontroller) {
    echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120388));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 110045));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 110051));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 110076));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 110206));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120373));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120374));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120376));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120378));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120379));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120380));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120381));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120382));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120384));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120385));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120387));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120389));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120390));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120391));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120392));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120393));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120394));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120398));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120801));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120802));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120807));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120827));
	echo json_encode($frequenciascontroller->retrieveFrequencias(1, 120834));
});

//serviço que retorna o email do usuário através da matrícula
$app->get('/retonar_email/:matricula', function($matricula) use ($pcontroller)
{
	echo json_encode($pcontroller->getEmail($matricula));
});
//Recebe os parametros e envia-os para o professor controller
$app->get('/Mudarsenha/:matricula/:senha', function($matricula, $senha) use ($pcontroller){
	echo json_encode($pcontroller->updateSenha($matricula, $senha));
});
$app->get('/Login/:matricula/:senha',function($matricula,$senha) use ($pcontroller) {
	echo json_encode($pcontroller->login($matricula,$senha));
});
$app->get('/teste',function() use ($pcontroller) {
	echo json_encode($pcontroller->teste());
});
$app->get('/EsqueceuSenha/:matricula/:email',function($matricula,$email) use ($pcontroller) {
    echo json_encode($pcontroller->EsqueceuSenha($matricula,$email));	
});

$app->get('/temposAula/', 'updateTempo'); 
function updateTempo( $tempo ){ 
	echo json_encode($temposcontroller->update( $tempo ));
}

//Chamada no bd, por meio de um método controller;
//Get e uma função Slim, pedindo2 parãmetros:1 - string com endereço do http....
//2-função que conrreponde à outra função do doc. controller.
$app->get('/bimestres/:data', function($data) use ($bimcontroller){
    echo json_encode($bimcontroller->retrieve($data));
});
$app->get('/bimestresall', function() use ($bimcontroller){
    echo json_encode($bimcontroller->retrieve_all());
});
$app->get('/sendMail/:nome/:email/:codigo', function($nome, $email,$codigo) use ($pcontroller){
    echo json_encode($pcontroller->sendMail($nome, $email,$codigo));
});
$app->get('/getName/:matricula', function($matricula) use ($pcontroller){
    echo json_encode($pcontroller->getNome($matricula));
});

//Serviço que retorna notas do Banco de Dados
$app->get('/notas', function() use ($ncontroller) {
    echo json_encode($ncontroller->retrieveNotas(33));
});
$app->run();
