<?php

require_once 'model/TurmasModel.php';

class TurmasController
{
	public function create($turmas) 
	{
		$turmas = $this->object_to_array($turmas);
		$turmas = TemposModel::create($turmas);
		return $turmas->to_array();
	}

	public function retrieve (&id) 
	{
		$retorno = array();
		$tempos = TemposModel::where([" id = ? ", $id]);
		foreach($tempos as $key => $value) {
			$obj['id'] = $value->id;
			$obj['serie'] = $value->serie;
			$obj['ano'] = $value->ano;
			$obj['cursos_id'] = $value->cursos_id;
			$obj['tb_turmascol'] = $value->tb_turmascol;
			$retorno[] = $obj;
		}
		return $retorno;
	}

	public function update($turmas)
	{
		$model = TurmasModel::find('all',$tempos['id']);
		$model->update_attributes($turmas);
		return $model->to_array();
	}

	public function delete($id)
	{
		$turmas = TurmasModel::find($id);
		return $turmas.delete();
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