<?php

Class UsuariosModel extends ActiveRecord\Model {
    static $table_name = "tb_usuarios";
    
    static $has_one = array(
        array("ProfessoresModel"), array("AlunosModel")
    );
}

?>