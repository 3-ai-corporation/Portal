<?php

require_once 'settings/config.php';

class ProfessorMateriasModel extends ActiveRecord\Model {
	static $table_name = 'tb_professor_materias';
	
	static $belongs_to = array (
	    array("MateriasModel"), array("ProfessoresModel")
	);
	
}

?>