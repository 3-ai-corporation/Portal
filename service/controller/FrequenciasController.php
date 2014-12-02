<?php

require_once 'model/FrequenciasModel.php';

class FrequenciasController{

	//Função que retorna a frequencia de alunos de acordo com o tempo
	public function retrieveFrequencias($tempoId, $alunoMatricula){
				
		$frequencias = FrequenciasModel::find('all', array('conditions' => array('tb_frequencias.alunos_matricula = ? AND tb_frequencias.tempos_id = ?', $alunoMatricula, $tempoId)));																															
		
		$retorno = array();
		foreach ($frequencias as $key => $value) {
			$obj['id'] = $value->id;
			$obj['presente'] = $value->presente;			
			$obj['alunos_matricula'] = $value->alunos_matricula;			
			$obj['tempos_id'] = $value->tempos_id;			
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
