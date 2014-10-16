<?php

require_once 'settings/config.php';

class MateriasModel extends ActiveRecord\Model {
	static $table_name = 'tb_materias';
	
	static $has_one = array (
	    array("MediasModel"), array("AvaliacoesModel"), array("NotasModel")
	);
	
	static $has_many = array(
	    array("ProfessorMateriasModel"),
	    array("TurmasModel", "through" => "MateriasTurmasModel")
	);
	
}

?>