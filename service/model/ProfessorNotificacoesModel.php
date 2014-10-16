<?php

require_once 'settings/config.php';

class ProfessorNotificacoesModel extends ActiveRecord\Model {
	static $table_name = 'tb_professor_notificacoes';
	
	static $belongs_to = array (
	    array("NotificacoesModel"), array("ProfessoresModel")
	);
	
}

?>