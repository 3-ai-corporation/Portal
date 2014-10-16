<?php

require_once 'settings/config.php';

class ProfessoresModel extends ActiveRecord\Model {
	static $table_name = 'tb_professores';
	
	//poe os nomes em pt_br sua biba
	static $has_one = array (
	   array("UsuariosModel")
	);
	
	static $has_many = array(
	    array("MateriasModel", "through" => "ProfessoresMateriasModel"), 
	    array("NotificacoesModel", "through" => "ProfessorNotificacoesModel"),
	    array("Turmas", "through" => "ProfessorTurmasModel")
	);
}

?>