<?php
require_once 'model/TemposModel.php';
require_once 'model/DiasLetivosModel.php';
require_once 'model/TurmasModel.php';
require_once 'model/MateriasModel.php';
require_once 'model/BimestresModel.php';

class DiasLetivosController
{
	public function retrieve () 
	{

		$sel = 'tb_dia_letivos.id AS id, tb_dia_letivos.data AS datas, tb_dia_letivos.numero_dia AS numero_dia';
		$diaAula = DiasLetivosModel::find('all', array('select'=>$sel, 'order'=>'datas'));
		
		$retorno = array();
		
		foreach($diaAula as $key => $value) {
			$obj['id'] = $value->id;
			$obj['datas'] = $value->datas;
			$obj['numero_dia'] = $value->numero_dia;						
		
			$retorno[] = $obj;
		}
		return $retorno;
	}
	
	
// Função que retorna os tempos -> modificar filtragem posteriormente
	  
	public function retrieveByIds ($idData) 
	{
		$sel = 'tb_tempos.id AS id, tb_tempos.indice AS indice';
		
		$tempos = TemposModel::find('all',
			array('select'=>$sel, 
				  'conditions'=>array('tb_tempos.letivos_id = ? ', $idData),
				  'order'=>'indice'));
										
		$retorno = array();
		
		foreach($tempos as $key => $value) {
			$obj['id'] = $value->id;
			$obj['indice'] = $value->indice;
			
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
