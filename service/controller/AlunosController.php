<?php

require_once 'model/UsuariosModel.php';
require_once 'model/BimestresModel.php';
require_once 'model/TemposModel.php';
require_once 'model/DiasLetivosModel.php';
require_once 'model/MateriaTurmasModel.php';
require_once 'model/FrequenciasModel.php';

class AlunosController{

	//Função que retorna lista de alunos de acordo com a turma
	public function retrieveAlunos($turmaId){					
				
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

	//Função que retorna a lista de alunos junto com as faltas bimestrais contabilizadas
	public function retrieveAlunosFreq($turmaId,$bimestreId,$materiaId){			
				
		/*--Carregamento das datas controle do bimestre--*/
		$sel_bimestre = 'tb_bimestres.data_inicio_id AS inicio, tb_bimestres.data_fim_id AS fim';
		$bimestre = BimestresModel::find('all',array('select'=>$sel_bimestre,'conditions'=>array('tb_bimestres.id =?',$bimestreId)));
		
		foreach($bimestre as $key=> $value){
			$objBimestre['inicio'] = $value->inicio;
			$objBimestre['fim'] = $value->fim;			

		}
		
		$dtI = explode('-',$objBimestre['inicio']);
		$dtI = implode('_',$dtI);
		
		$dtF = explode('-', $objBimestre['fim']);
		$dtF = implode('_',$dtF);
		/*---------------------------------------------*/
		
		/*------Carregamento dos dias do bimestre------*/
		$sel_dias = 'tb_dia_letivos.id AS id, DATE_FORMAT(tb_dia_letivos.data, "%d-%m-%Y") AS dt';
		$dias= DiasLetivosModel::find('all',array('select'=>$sel_dias,'order'=>'dt'));
		$listDias = array();
		
		foreach($dias as $key=>$value){
			$objDia['id'] = $value->id;
			$objDia['dt'] = $value->dt;
			
			$dt = explode('-',$objDia['dt']);
			$dt = implode('_',$dt);
			
			//filtragem para ver se o dia se encontra dentro do bimestre selecionado
			if((strtotime($dt)>=strtotime($dtI))
				&&(strtotime($dt)<=strtotime($dtF))){
				$listDias[] = $objDia;
			}
		}
		/*---------------------------------------------*/
		
		/*--------Carregamento de Matéria Turma--------*/
		$sel_materia_turma = "tb_materia_turmas.id AS id";
		$materia_turma = MateriaTurmasModel::find('all',array('select'=>$sel_materia_turma,
					'conditions'=>array('tb_materia_turmas.materia_id = ? AND tb_materia_turmas.turma_id = ?',$materiaId,$turmaId)));
		
		foreach($materia_turma as $key=>$value){
			$objMateriaTurma['id'] = $value->id;
		}
		/*---------------------------------------------*/
		
		/*-----------Carregamento de tempos------------*/
		$sel_tempos = 'tb_tempos.id AS id, tb_tempos.letivos_id AS dia_letivo';
		$tempos = TemposModel::find('all',array('select'=>$sel_tempos,
									'conditions'=>array('tb_tempos.materia_turma_id=?',$objMateriaTurma['id'])));
		$lstTempProv  = array();
		
		foreach($tempos as $key=>$value){
			$objTempo['id'] = $value->id;
			$objTempo['dia_letivo'] = $value->dia_letivo;
			
			$lstTempProv[] = $objTempo;
		}
		
		$listTempos = array();
		
		foreach($lstTempProv as $time){
			foreach($listDias as $day){
				if($day['id']==$time['dia_letivo']){
					$listTempos[] = $time;
				}
			}
		}		
		/*---------------------------------------------*/
		
		/*-----Carregamento da tabela de frequencia-----*/
		$sel_frequencia = 'tb_frequencias.id AS id, tb_frequencias.presente AS presente,
						   tb_frequencias.alunos_matricula AS matricula, tb_frequencias.tempos_id AS id_tempos';
		$frequencia = FrequenciasModel::find('all',array('select'=>$sel_frequencia));
		$listFrequencia = array();
		
		foreach($frequencia as $key=>$value){
			$objFreq['id'] = $value->id;
			$objFreq['presente'] = $value->presente;
			$objFreq['matricula'] = $value->matricula;
			$objFreq['id_tempos'] = $value->id_tempos;
			
			//Há a filtragem por tempo
			foreach($listTempos as $tempo){
				if($tempo['id']==$objFreq['id_tempos']){
					$listFrequencia[] = $objFreq;
				}
			}
		}
		/*----------------------------------------------*/
		
		/*-Carregamento dos alunos de acordo com a turma-*/
		$join = 'JOIN tb_alunos ON tb_usuarios.matricula = tb_alunos.matricula';
		$sel_alunos = 'tb_usuarios.matricula AS matricula, tb_usuarios.nome AS nome';
		$alunos = UsuariosModel::find('all', array('joins' => $join, 
						'select' => $sel_alunos, 
						'conditions' => array('tb_alunos.turma_id = ?', $turmaId),
						'order' => 'nome'));																															
		
		$listAlunos = array();

		$count = 0;
		foreach ($alunos as $key => $value) {
			$objAluno['matricula'] = $value->matricula;
			$objAluno['nome'] = $value->nome;
			$objAluno['faltas_bimestre'] = 0;
			$count++;
			
			$listAlunos[] = $objAluno;
		}
		/*---------------------------------------------*/
		
		
		/*-------Contagem das faltas POR ALUNOS--------*/
		foreach($listFrequencia as $frequencia){
			for($i=0;$i<$count;$i++){
				if($frequencia['matricula']==$listAlunos[$i]['matricula']){
					if($frequencia['presente']=='0'){
						$listAlunos[$i]['faltas_bimestre']++;
					}
				}
			}
		}
		/*---------------------------------------------*/		
		
		return $listAlunos;
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