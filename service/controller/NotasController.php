<?php

require_once 'model/NotasModel.php';
//require 'AvaliacoesController.php';

class NotasController {

	public function create ($notas){
		//if(AvaliacoesController.create($avalicacao)){
			$notas = $this->object_to_array($notas);
			$notas = NotasModel::create($notas);
		
			return $notas->to_array();
		//}
	}
	
	public function retrieve ($notas){
		$notas = NotasModel::find('all', array('order' => 'id'); 
		$retorno = array();
		
		foreach($notas as $key => $value){
			$obj['id'] = $value->id;
			$obj['valor'] = $value->valor;
			$obj['status'] = $value->status;
			$obj['materia_id'] = $value->materia_id;
			$obj['aluno_id'] = $value->aluno_id;
			$obj['avalicacao_id'] = $value->avalicacao_id;
			
			$retorno[] = $obj;
		}
		return $retorno;	
	}
	
	public function update ($notas){
		$model = NotasModel::find($notas['id']);
		$model->update_attributes($notas);
		return $model->to_array();
	}	
	
	public function delete ($id){
		$notas = NotasModel::find($id);
		return $notas->delete();
	}
	
	private function object_to_array (stdClass $Class){
		$Class = (array)$Class;
		
		foreach($Class as $key => $value){
			if(is_object($value) && get_class($value) === 'stdClass' ) {
				$Class[$key] = self::object_to_array($value);
			}
		}
		
		return $Class
	}
}

?>