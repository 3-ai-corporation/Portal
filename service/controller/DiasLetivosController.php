<?php

require_once 'model/TemposModel.php';
require_once 'model/DiasLetivosModel.php';
require_once 'model/TurmasModel.php';
require_once 'model/MateriasModel.php';

class DiasLetivosController
{


	public function retrieve () 
	{
		$retorno = array();
		$tdias = DiasLetivosModel::find('all',array('order' => 'id'));
		foreach($tdias as $key => $value) {
			$obj['id'] = $value->id;
			$obj['data'] = $value->data;
			$obj['numero_dia'] = $value->numero_dia;
			$retorno[] = $obj;
		}
		return $retorno;
	}



	private function object_to_array($Class)
	{
		$Class = (array)$Class;
		foreach($Class as $key => $value)
		{
			if(is_object($value) &&get_class($value) === 'stdClass')
			{
				$Class[$key] = self::object_to_array($value);
			}
		}
		return $Class;
	}
}