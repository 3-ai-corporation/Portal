<?php

require_once 'settings/config.php';

class CursosModel extends ActiveRecord\Model {
	static $table_name = 'tb_cursos';
	
	static $has_one = array(
	    array("TurmasModel")
	);
	
}

?>