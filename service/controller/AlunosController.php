<?php

require_once 'model/UsuariosModel.php';

class AlunosController{

	//Função que retorna lista de alunos de acordo com a turma
	public function retrieveAlunos($turmaId){
		/* $alunos = UsuariosModel::find('all', array('conditions' => array("SELECT usuario.matricula, usuario.nome FROM tb_usuarios usuario
																		WHERE usuario.matricula = tb_alunos.matricula
																		AND tb_alunos.turma_id = ?", $turmaId), "order"=>"usuario.nome")); */					
				
		$join = 'JOIN tb_alunos ON tb_usuarios.matricula = tb_alunos.matricula';
		$sel = 'tb_usuarios.matricula AS matricula, tb_usuarios.nome AS nome';
		$alunos = UsuariosModel::find('all', array('joins' => $join, 
						'select' => $sel, 
						'conditions' => array('tb_alunos.turma_id = ?', $turmaId),
						'order' => 'nome'));																															
		
		$retorno = array();
		foreach ($alunos as $key => $value) {
			$obj['matricula'] = $value->matricula;
			$obj['nome'] = $value->nome;			
			$retorno[] = $obj;
		}
		
		return $retorno;
	}
	
	public function retrieveAulas($turmaId, $materiaId, $bimestre) {
		$materia_turma = UsuariosModel::find('all', array('conditions' => array("turma_id = ?
																		   AND tmateria_id = ?", $turmaId, $materiaId)));
		
		$retorno = array();
		
		foreach($materia_turmas as $key => $value ) {
            // Busca de turmas a partir do id
            $materias_turmas = MateriaTurmasModel::find($value->materia_turmas_id);

            $turma = TurmasModel::find($materias_turmas->turma_id);

            $result['serie'] = $turma->serie;
            $result['ano'] = $turma->ano;
            
            $curso = CursosModel::find($turma->cursos_id);
            $result['cursos'] = $curso->curso;

            if($returnDisciplina)
            {
                $materias = MateriasModel::find($materias_turmas->materia_id);
                $result['materia'] = $materias->nome;
            }

            $retorno[] = $result;

        }
	
	}
	

	

	private function object_to_array(stdClass $Class){
		$Class = (array)$Class;
		foreach($Class as $key => $value){
			if(is_object($value)&&get_class($value)==='stdClass'){
				$Class[$key] = self::object_to_array($value);
			}
		}
		return $Class;
	}

}