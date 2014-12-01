<?php

require_once 'model/TemposModel.php';

class TemposController
{
	public function create($tempos) 
	{
		$tempos = $this->object_to_array($tempos);
		$tempos = TemposModel::create($tempos);
		return $tempos->to_array();
	}

	public function retrieve ($id) 
	{
		$retorno = array();
		$tempos = TemposModel::where([" id = ? ", $id]);
		//tenho q receber um id por parâmetro 
		//pegar todos do banco que tenham esse id
		foreach($tempos as $key => $value) {
			$obj['id'] = $value->id;
			$obj['conteudo_previsto'] = $value->conteudo_previsto;
			$obj['conteudo_lancado'] = $value->conteudo_lancado;
			$obj['reposicao'] = $value->reposicao;
			$obj['indice'] = $value->indice;
			$retorno[] = $obj;
		}
		return $retorno;
	}

	public function update($tempo)
	{
		$model = TemposModel::find('all',$tempos['id']);
		$model->update_attributes($tempos);
		return $model->to_array();
	}
	
	public function retrievebyDay ($id_dia) 
	{

		$sel_tempos = 'tb_tempos.id AS id, tb_tempos.conteudo_previsto AS previsto, tb_tempos.conteudo_lancado AS lancado, tb_tempos.indice AS indice';
		$tempos = TemposModel::find ('all',array('select'=>$sel_tempos,'conditions'=>array('tb_tempos.letivos_id = ?',$id_dia)));
		$retorno = array();
		
		foreach($tempos as $key=>$value){
			$objTempo['id'] = $value->id;
			$objTempo['previsto']=$value->previsto;
			$objTempo['lancado']=$value->lancado;
			$objTempo['indice']=$value->indice;
			
			$retorno[] = $objTempo;
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
