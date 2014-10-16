<?php

require_once 'settings/config.php';

class AlunosModel extends ActiveRecord\Model {
	static $table_name = 'tb_alunos';
	
	static $belong_to = array (
	   array("TurmasModel"),array("UsuariosModel")
	);
	
	static $has_one = array(
	    array("FrequenciasModel"), array("NotasModel")
	);
}

?>