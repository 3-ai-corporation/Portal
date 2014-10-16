<?php
/* Configurações de diretório da aplicação e banco de dados */

require_once 'php-activerecord/ActiveRecord.php';

$cfg = ActiveRecord\Config::instance();
$cfg->set_model_directory('model');
$cfg->set_connections(array('development' => 'mysql://fn3ai2014portal:#6tRkX6`VRz<Yu_?SbfzqD+vB#U5KKn9@db4free.net:3306/fn3ai2014portal'));
?>