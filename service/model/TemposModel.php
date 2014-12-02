<?php

require_once 'settings/config.php';

class TemposModel extends ActiveRecord\Model {
	static $table_name = 'tb_tempos';
	
	static $belongs_to = array(
	    array("DiasLetivosModel"), array("PlanosModel") , array("MateriaTurmasModel")
	);
	
	static $has_one = array(
	    array("FrequenciasModel")
	);
}

?>