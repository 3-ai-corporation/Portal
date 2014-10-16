<?php

require_once 'model/ProfessoresModel.php';
require_once 'model/TurmasModel.php';
require_once 'model/MateriasModel.php';
require_once 'model/ProfessorTurmasModel.php';
require_once 'model/MateriasTurmasModel.php';

class ProfessoresController {
    public function retrieve() {
		$professores = ProfessoresModel::find('all',array('order' => 'name'));
		$retorno = array();
		foreach($professores as $key => $value ) {
			$obj['id'] = $value->id;
			$obj['name'] = $value-name;
			$obj['price'] = $value->price;
			
			$retorno[] = $obj;
		}
		return $retorno;
	}
	
	public function retrieveSeries($id) {
	    $prof_turmas = ProfessorTurmasModel::find("all",array("conditions" => "id_professor = " . $id));
	    
	    $series = array();
	    foreach($prof_turmas as $key => $value ) {
	        $turmas = TurmasModel::find($value['id']);
	        
	        $series[] = $turmas["serie"];
	    }
	    
	    return $series;
	}
	
	public function retrieveMaterias($series = array(), $id) {
	    $prof_turmas = ProfessorTurmasModel::find("all",array("conditions" => "id_professor = " . $id));
	    
	    $materias = array();
	    foreach($prof_turmas as $key => $value ) {
	        foreach($series as $key => $s ) {
    	        $turmas = MateriasTurmasModel::find("all", array( "conditions" => "turmas_id = " . $s["id"]) );
    	        
    	        $aux = MateriasModel::find($turmas["materia_id"]);
    	        $materias[] = $aux["nome"];
	        }
	    }
	    
	    return $materias;
	}
    
}