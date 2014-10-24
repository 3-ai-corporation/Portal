<?php

require 'model/ProfessoresModel.php';
require 'model/TurmasModel.php';
require 'model/MateriasModel.php';
require 'model/ProfessorMateriasModel.php';
require 'model/MateriaTurmasModel.php';
require 'model/CursosModel.php';
require 'model/AlunosModel.php';
require 'model/UsuariosModel.php';
require 'model/NotificacoesModel.php';

class ProfessoresController {

    // Função responsável por retornar todos os professores
    public function retrieve() {
        $professores = ProfessoresModel::find('all',array('order' => 'nome'));
        $retorno = array();
        foreach($professores as $key => $value ) {
            $obj['id'] = $value->id;
            $obj['nome'] = $value->nome;

            $retorno[] = $obj;
        }
        return $retorno;
    }

    // Função responsável por retornas as turmas lecionadas por um professor
    public function retrieveTurmas($matriculaProfessor, $returnDisciplina) {
        // Vai retornar os registros da tabela tb_professor_turmas de acordo com a Matricula do professor
        
        $prof_materias = ProfessorMateriasModel::find("all",array('conditions' => 'professor_matricula = ' . $matriculaProfessor ));

        $retorno = array();
        foreach($prof_materias as $key => $value ) {
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
        return $retorno;
    }

    public function retrieveDisciplinas($professorMatricula, $bool ) {

        return retrieveTurmas($professorMatricula, $bool);
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