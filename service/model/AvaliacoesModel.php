<?php

require_once 'settings/config.php';

class AvaliacoesModel extends ActiveRecord\Model {
	static $table_name = 'tb_avaliacoes';
	
	static $belongs_to = array(
	    array("MateriasModel") /*, array("BimestresModel")*/
	);
	
	static $has_one = array(
	    array("NotasModel")
	);
}

?>