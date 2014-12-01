<?php
require_once 'model/TemposModel.php';
require_once 'model/DiasLetivosModel.php';
require_once 'model/TurmasModel.php';
require_once 'model/MateriasModel.php';
require_once 'model/BimestresModel.php';
require_once 'model/MateriaTurmasModel.php';

class DiasLetivosController
{

	public function retrieve () 
	{

		$sel = 'tb_dia_letivos.id AS id, tb_dia_letivos.data AS datas, tb_dia_letivos.numero_dia AS numero_dia';
		$diaAula = DiasLetivosModel::find('all', array('select'=>$sel, 'order'=>'datas'));
		
		$retorno = array();
		
		foreach($diaAula as $key => $value) {
			$obj['id'] = $value->id;
			$obj['datas'] = $value->datas;
			$obj['numero_dia'] = $value->numero_dia;						
		
			$retorno[] = $obj;
		}
		return $retorno;
	}
	
	public function retrieveByIds ($id_bim,$id_turma,$id_materia)
	{
		/*inicio e fim do bimestre*/
		$sel_bim = 'tb_bimestres.data_inicio_id AS inicio, tb_bimestres.data_fim_id AS fim';
		$bimestre = BimestresModel::find('all', 
			array('select'=>$sel_bim,'conditions'=>array('tb_bimestres.id = ?', $id_bim)));
			
			
		foreach($bimestre as $key=> $value){
			$objBimestre['inicio'] = $value->inicio;
			$objBimestre['fim'] = $value->fim;			

		}
		
		$dtI = explode('-',$objBimestre['inicio']);
		$dtI = implode('_',$dtI);
		
		$dtF = explode('-', $objBimestre['fim']);
		$dtF = implode('_',$dtF);
		/*----------------------------------------------*/
		
		//--------------------------------------------------------------------------------------------
		/*/dia letivo de inicio e fim
		$sel_intervalo = 'DATE_FORMAT(tb_dia_letivos.data, "%d-%m-%Y") AS dt';
		$inicio = DiasLetivosModel::find('all', array('select'=>$sel_intervalo, 'conditions'=>array('tb_dia_letivos.id = ?', $objBimestre['inicio'])));
		$fim = DiasLetivosModel::find('all', array('select'=>$sel_intervalo, 'conditions'=>array('tb_dia_letivos.id = ?', $objBimestre['fim'])));
		
		foreach($inicio as $key=> $value){
			$objInit['dt'] = $value->dt;
			
		}
		/*
		$dtI = explode('-', $objInit['dt'] );
		$dtI = implode ('_',$dtI);
		
		foreach($fim as $key=> $value){
			$objEnd['dt'] = $value->dt;		
		}
		$dtF = explode ('-',$objEnd['dt']);
		$dtF = implode('_',$dtF);
		//--------------------------------------------------------------------------------------------
		*/
		
		//pesquisa de materia_turma_id
		$sel_materia_turma = 'tb_materia_turmas.id AS id';
		$materiaTurma = MateriaTurmasModel::find('all',array('select'=>$sel_materia_turma,'conditions'=>array('tb_materia_turmas.materia_id = ? AND tb_materia_turmas.turma_id = ?',$id_materia,$id_turma)));
		
		foreach($materiaTurma as $key => $value){
			$objMateriaTurma['id'] = $value->id;
		}
		/*---------------------------------------*/
	
		//pesquisa dos tempos que possuam o id de Materia_turmas pesquisado
		$sel_tempos = 'tb_tempos.id AS id, tb_tempos.letivos_id AS dia_letivo';
		$tempos = TemposModel::find('all',array('select'=>$sel_tempos,'conditions'=>array('tb_tempos.materia_turma_id = ?',$objMateriaTurma['id'])));
		$listTempos = array();
		
		foreach($tempos as $key=>$value){
			$objTempo['dia_letivo'] = $value->dia_letivo;
			$listTempos[] = $objTempo;
		}
		/*--------------------------------------------*/
		
		//todos os dias letivos
		$sel_dias = 'tb_dia_letivos.id AS id, 	DATE_FORMAT(tb_dia_letivos.data, "%d-%m-%Y") AS datas, tb_dia_letivos.numero_dia AS numero_dia';
		$diaAula = DiasLetivosModel::find('all', array('select'=>$sel_dias, 'order'=>'datas'));
		$listDias = array();
		
		foreach($diaAula as $key => $value) {
			$objDia['id'] = $value->id; 
			$objDia['datas'] = $value->datas;
			$objDia['numero_dia'] = $value->numero_dia;	

			$data = explode('-',$objDia['datas']);
			$data = implode('_',$data);			

			
			//filtragem para ver se o dia se encontra dentro do bimestre selecionado
			if((strtotime($data)>=strtotime($dtI))
				&&(strtotime($data)<=strtotime($dtF))){
				$listDias[] = $objDia;
			}
		}
		
		//filtragem por tempos
		$retorno = array();
		
		foreach($listDias as $day){
			foreach($listTempos as $time){
				if($day['id']==$time['dia_letivo']){
					$retorno[] = $day; 
					break;
				}
			}
		}
		
		return $retorno;
	
	}

	private function object_to_array($Class)
	{
		$Class = (array)$Class;
		foreach($Class as $key => $value)
		{
			if(is_object($value) &&get_class($value) === 'stdClass')
			{
				$Class[$key] = self::object_to_array($value);
			}
		}
		return $Class;
	}
}
