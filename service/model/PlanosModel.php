<?php

require_once 'settings/config.php';

class PlanosModel extends ActiveRecord\Model {
	static $table_name = 'tb_planos';
	
	static $belongs_to = array(
	    array("MateriaTurmasModel")/*, array("BimestresModel")*/ 
	);
	
	static $has_one = array(
	    array("TemposModel")
	);
}

?>