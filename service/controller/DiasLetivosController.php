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
	
		$sel = 'tb_dia_letivos.id AS id, 	DATE_FORMAT(tb_dia_letivos.data, "%d-%m-%Y") AS datas, tb_dia_letivos.numero_dia AS numero_dia';
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

		// Função que retorna os tempos -> ajeitar posteriormente
	  	/*
		public function retrieveByIds ($Idsestrangeiro) 
	{
		$retorno = array();
		$tempos = TemposModel::find('all',
			array('conditions' => array("SELECT * FROM tb_tempos WHERE materia_turma_id = ? AND planos_id = ? ", 
												$Idsestrangeiro.materia_turma_id, Idsestrangeiro.planos_id),
										"order"=>"indice"));
		foreach($tempos as $key => $value) {
			$obj['id'] = $value->id;
			$obj['conteudo_previsto'] = $value->conteudo_previsdo;
			$obj['conteudo_lancado'] = $value->conteudo_lancado;
			$obj['indice'] = $value->indice;
			$obj['reposicao'] = $value->reposicao;
			$obj['idice'] = $value->indice;
			$obj['letivos_id'] = $value->letivos_id;
			$obj['planos_id'] = $value->planos_id;
			$obj['materia_turma_id'] = $value->materia_turma_id;
			$retorno[] = $obj;
		}
		return $retorno;
	}
	*/

	public function retrieve_by_filtro ( $obj ) 
	{
	
		$sel = 'tb_dia_letivos.id AS id, DATE_FORMAT(tb_dia_letivos.data, "%Y-%m-%d") AS datas, tb_dia_letivos.numero_dia AS numero_dia';
		$diaAula = DiasLetivosModel::find( 'all', 
			array(
					'select'=>$sel,
					'conditions' => array( 'name=? or id > ?', $obj.name, $obj.id ),
					 'order'=>'datas'));
		$retorno = array();
		
		foreach($diaAula as $key => $value) {
			$obj[ 'id' ] = $value->id; 
			$obj[ 'datas' ] = $value->datas;//.date("d - m - y") ;
			$obj[ 'numero_dia' ] = $value->numero_dia;						
			
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

}
