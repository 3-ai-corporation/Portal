<?php

require_once 'settings/config.php';

class ProfessorTurmasModel extends ActiveRecord\Model {
	static $table_name = 'tb_professor_turmas';
	
	static $belongs_to = array (
	    array("TurmasModel"), array("ProfessoresModel")
	);
	
}

?>