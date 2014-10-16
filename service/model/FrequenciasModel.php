<?php

require_once 'settings/config.php';

class FrequenciasModel extends ActiveRecord\Model {
	static $table_name = 'tb_frequencias';
	
	static $belongs_to = array(
	    array("AlunosModel") , array("TemposModel")
	);
}

?>