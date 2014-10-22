<?php

require_once 'model/ProfessoresModel.php';
require_once 'model/TurmasModel.php';
require_once 'model/MateriasModel.php';
require_once 'model/ProfessorTurmasModel.php';
require_once 'model/MateriasTurmasModel.php';
require_once 'model/CursosModel.php';
require_once 'model/AlunosModel.php';
require_once 'model/UsuariosModel.php';
require_once 'model/NotificacoesModel.php';

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

    public function retrieveTurmas($id) {
        $prof_turmas = ProfessorTurmasModel::find("all",array("conditions" => "id_professor = " . $id));

        $retorno = array();
        foreach($prof_turmas as $key => $value ) {
            $turmas = TurmasModel::find($value->id);
            $curso = CursosModel::find($turmas->cursos_id);

            $result['serie'] = $turmas->serie;
            $result['cursos'] = $curso->curso;

            $retorno[] = $result;

        }
        return $retorno;
    }

    /*public function retrieveMaterias($series = array(), $id) {
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
    }*/

}