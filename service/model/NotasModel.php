<?php

require_once 'settings/config.php';

class AvaliacoesModel extends ActiveRecord\Model {
	static $table_name = 'tb_avaliacoes';
	
	static $belongs_to = array(
	    array("MateriasModel"), array("AlunosModel"), array("AvaliacoesModel")
	);
}

?>