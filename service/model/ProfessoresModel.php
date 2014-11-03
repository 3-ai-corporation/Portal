<?php

require_once 'settings/config.php';

class ProfessoresModel extends ActiveRecord\Model {
	static $table_name = 'tb_professores';
	
	static $belongs_to = array (
	   array("UsuariosModel")
	);
	
	static $has_many = array(
	    array("MateriasModel", "through" => "ProfessoresMateriasModel"), 
	    array("NotificacoesModel", "through" => "ProfessorNotificacoesModel")
        //array("ProfessorNotificacoesModel")
	);

}

?>
