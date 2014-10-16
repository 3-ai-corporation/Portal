<?php

require_once 'settings/config.php';

class NotificacoesModel extends ActiveRecord\Model {
	static $table_name = 'tb_notificacoes';
	
	static $has_many = array(
	    array("ProfessorNotificacoesModel")
	);
	
}

?>