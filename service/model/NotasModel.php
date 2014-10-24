<?php

require_once 'settings/config.php';

class NotasModel extends ActiveRecord\Model {
	static $table_name = 'tb_notas';
	
	static $belongs_to = array(
	    array("MateriasModel"), array("AlunosModel"), array("AvaliacoesModel")
	);
}

?>