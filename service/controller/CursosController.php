<?php

require_once 'model/CursosModel.php';

class CursosController
{
	public function retrieve () 
	{

		$sel = 'tb_cursos.id AS id, tb_cursos.curso AS curso';
		$cursos = CursosModel::find('all', array('select'=>$sel, 'order'=>'id'));
		
		$retorno = array();
		
		foreach($cursos as $key => $value) {
			$obj['id'] = $value->id;
			$obj['curso'] = $value->curso;			
		
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
	
	public function update($cursos)
	{
		$model = CursosModel::find('all',$cursos['id']);
		$model->update_attributes($cursos);
		return $model->to_array();
	}

	public function delete($id)
	{
		$cursos = CursosModel::find($id);
		return $cursos.delete();
	}
}