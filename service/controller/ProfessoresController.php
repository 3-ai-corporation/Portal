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
    public function retrieveTurmas($id) {
        // Vai retornar os registros da tabela tb_professor_turmas de acordo com o Id do professor
        $prof_turmas = ProfessorTurmasModel::find("all",array("conditions" => "id_professor = " . $id));

        $retorno = array();
        foreach($prof_turmas as $key => $value ) {
            // Busca de turmas a partir do id
            $turmas = TurmasModel::find($value->id);

            //Busca
            $curso = CursosModel::find($turmas->cursos_id);

            $result['serie'] = $turmas->serie;
            $result['cursos'] = $curso->curso;

            $retorno[] = $result;

        }
        return $retorno;
    }

    public function retrieveDisciplinas($turmaId, $cursoId, $professorId) {

        $materias_turmas = MateriasTurmasModel::find("all",array("conditions" => "id_turma = " . $turmaId . "and id_curso =" . $cursoId));

        $retorno = array();
        foreach($materias_turmas as $key => $value ) {
            /* Busca de turmas a partir do id */

            $materias = MateriasModel::find($value->id);

            $result[] = $materias;
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

     public function retrieveNotificacoes($id) {
        //Retorna os registros de tb_professor_notificacoes correspondentes ao id
        $prof_notif = ProfessorNotificacoesModel::find("all",array("conditions" => "professor_matricula = " . $id));

        $retorno = array();
        foreach($prof_notif as $key => $value ) {
            //pega de tb_notificacoes a noti... correspondente
            $notificacao = NotificacoesModel::find($value->id);
            //result recebe todos os dados de cada uma das notificações
            $result["id"] = $notificacao->id;
            $result["tipo"] = $notificacao->tipo;
            $result["mensagem"] = $notificacao->mensagem;


            $retorno[] = $result;

        }
        return $retorno;
    }
}