<?php

require_once 'model/TemposModel.php';

class TemposController
{
	public function create($nota) 
	{
		$nota = $this->object_to_array($nota);
		$nota = TemposModel::create($nota);
		return $nota->to_array();
	}

	public function retrieve () 
	{
		$retorno = array();
		$notas = TemposModel::find('all',array('order' => 'id'));
		foreach($notas as $key => $value) {
			$obj['id'] = $value->id;
			$obj['valor'] = $value->valor;
			$obj['materia_id'] = $value->materia_id;
			$obj['aluno_id'] = $value->aluno_id;
			$obj['avaliacao_id'] = $value->avaliacao_id;
			$retorno[] = $obj;
		}
		return $retorno;
	}

	public function update($nota)
	{
		$model = TemposModel::find('all',$nota['id']);
		$model->update_attributes($nota);
		return $model->to_array();
	}

	public function delete($id)
	{
		$nota = TemposModel::find($id);
		return $nota.delete();
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