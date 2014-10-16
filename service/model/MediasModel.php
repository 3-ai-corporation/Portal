<?php

require_once 'settings/config.php';

class MediasModel extends ActiveRecord\Model {
	static $table_name = 'tb_medias';
	
	static $belongs_to = array(
	    /*array("BimestresModel")*/ array("MateriasModel")
	);
	
}

?>