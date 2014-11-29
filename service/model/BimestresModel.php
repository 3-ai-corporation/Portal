<?php

require_once 'settings/config.php';

class BimestresModel extends ActiveRecord\Model{
    static $table_name='tb_bimestres';

    static $has_one= array(
        array("PlanosModel"), array("AvaliacoesModel"), array("MediasModel")
    );

    static $belong_to = array(
        array("DiasLetivosModel")
    );


}
?>