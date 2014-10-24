<?php

require_once 'settings/config.php';

class MateriaTurmasModel extends ActiveRecord\Model {
	static $table_name = 'tb_materia_turmas';
	
	static $belongs_to = array (
	    array("MateriasModel"), array("TurmasModel")
	);
	
	static $has_one = array(
	    array("PlanosModel"), array("TemposModel")
	);
	
}

?>