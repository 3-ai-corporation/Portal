<?php

require_once 'settings/config.php';

class DiasLetivosModel extends ActiveRecord\Model {
	static $table_name = 'tb_dia_letivos';
	
	static $has_one = array(
	    array("TemposModel")
	);
}

?>