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

	public function retrieve () 
	{
		$retorno = array();
		$tempos = TemposModel::find('all',array('order' => 'id'));
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

	public function delete($id)
	{
		$tempos = TemposModel::find($id);
		return $tempos.delete();
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