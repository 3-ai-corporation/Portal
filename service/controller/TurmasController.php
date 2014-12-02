<?php

require_once 'model/TurmasModel.php';
require_once 'model/MateriasModel.php';
require_once 'model/CursosModel.php';

class TurmasController{
	
	public function create($turmas) 
	{
		$turmas = $this->object_to_array($turmas);
		$turmas = TemposModel::create($turmas);
		return $turmas->to_array();
	}

	public function retrieve ($id) {
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

	public function retrieveCabecalho($pMateria,$pTurma){
	
		$sel_turma = 'tb_turmas.serie AS serie, tb_turmas.cursos_id AS cursos_id';
		$turma = TurmasModel::find('all',array('select'=>$sel_turma,'conditions'=>array('tb_turmas.id=?',$pTurma)));
		
		foreach($turma as $key=>$value){
			$obj['serie'] = $value->serie;
			$id_curso = $value->cursos_id;
		}
		
		$sel_materia = 'tb_materias.nome AS materia';
		$materia = MateriasModel::find('all',array('select'=>$sel_materia,'conditions'=>array('tb_materias.id=?',$pMateria)));
	
		foreach($materia as $key=>$value){
			$obj['materia'] = $value->materia;
		}
		
		$sel_curso = 'tb_cursos.curso AS curso';
		$curso = CursosModel::find('all',array('select'=>$sel_curso,'conditions'=>array('tb_cursos.id=?',$id_curso)));
	
		foreach($curso as $key=>$value){
			$obj['curso'] = $value->curso;
		}
		
		return $obj;
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

	private function object_to_array($Class){
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