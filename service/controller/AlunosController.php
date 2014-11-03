<?php

require_once 'model/UsuariosModel.php';

class AlunosController{

	public function read($idTurmaSelecionada){
		$alunos = UsuariosModel::find('all', array('conditions' => array("SELECT usuario.matricula, usuario.nome FROM tb_usuarios usuario
																		WHERE usuario.matricula = tb_alunos.matricula
																		AND tb_alunos.turma_id = ?", $idTurmaSelecionada), "order"=>"usuario.nome"));
		
		$retorno = array();
		foreach ($alunos as $key => $value) {
			$obj['matricula'] = $value->matricula;
			$obj['nome'] = $value->nome;
			$retorno[] = $obj;
		}		
		return $retorno;
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