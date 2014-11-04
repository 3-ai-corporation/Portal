<?php

require_once 'settings/config.php';

class TurmasModel extends ActiveRecord\Model {

	static $table_name = 'tb_turmas';
    
    static $belongs_to = array(
        array("CursosModel")
    );
    
    static $has_one = array(
        array("AlunosModel")
    );

}
?>