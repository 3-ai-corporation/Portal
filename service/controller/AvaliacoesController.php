<?php

require_once 'model/AvaliacoesModel.php';

class AvaliacoesController {

	public function create ($avalicacao){
		$avalicacao = $this->object_to_array($avalicacao);
		$avalicacao = AvaliacoesModel::create($avalicacao);
		
		return $avalicacao->to_array();
	}
	
	public function retrieve ($avalicacao){
		$avalicacao = AvaliacoesModel::find('all', array('order' => 'id'); //pega por 'id', mas não tem nada a ver
		$retorno = array();
		
		foreach($avalicacao as $key => $value){
			$obj['id'] = $value->id;
			$obj['descricao'] = $value->descricao;
			$obj['valormax'] = $value->valormax;
			$obj['identificador'] = $value->identificador;
			$obj['materia_id'] = $value->materia_id;
			$obj['bimestre_id'] = $value->bimestre_id;
			
			$retorno[] = $obj;
		}
		return $retorno;	
	}
	
	public function update ($avalicacao){
		$model = AvaliacoesModel::find($avalicacao['id']);
		$model->update_attributes($avalicacao);
		return $model->to_array();
	}	
	
	public function delete ($id){
		$avalicacao = AvaliacoesModel::find($id);
		return $avalicacao->delete();
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