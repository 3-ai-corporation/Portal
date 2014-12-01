<?php
require_once 'model/TemposModel.php';
require_once 'model/DiasLetivosModel.php';
require_once 'model/TurmasModel.php';
require_once 'model/MateriasModel.php';
require_once 'model/BimestresModel.php';
require_once 'model/MateriaTurmasModel.php';

class DiasLetivosController
{
	public function retrieve ($id_bim,$id_turma,$id_materia)
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
		
		return $objMateriaTurma;
		
		
		/*/todos os dias letivos
		$sel_dias = 'tb_dia_letivos.id AS id, 	DATE_FORMAT(tb_dia_letivos.data, "%d-%m-%Y") AS datas, tb_dia_letivos.numero_dia AS numero_dia';
		$diaAula = DiasLetivosModel::find('all', array('select'=>$sel_dias, 'order'=>'datas'));
		$retorno_dias = array();
		
		foreach($diaAula as $key => $value) {
			$obj['id'] = $value->id; 
			$obj['datas'] = $value->datas;
			$obj['numero_dia'] = $value->numero_dia;	

			$data = explode('-',$obj['datas']);
			$data = implode('_',$data);			
			
			if((strtotime($data)>=strtotime($dtI))
				&&(strtotime($data)<=strtotime($dtF))){
				$retorno_dias[] = $obj;
			}
		}
		return $retorno_dias;
		*/
	}
	
		// Função que retorna os tempos -> ajeitar posteriormente
	  	/*
		public function retrieveByIds ($Idsestrangeiro) 
	{
		$retorno = array();
		$tempos = TemposModel::find('all',
			array('conditions' => array("SELECT * FROM tb_tempos WHERE materia_turma_id = ? AND planos_id = ? ", 
												$Idsestrangeiro.materia_turma_id, Idsestrangeiro.planos_id),
										"order"=>"indice"));
		foreach($tempos as $key => $value) {
			$obj['id'] = $value->id;
			$obj['conteudo_previsto'] = $value->conteudo_previsdo;
			$obj['conteudo_lancado'] = $value->conteudo_lancado;
			$obj['indice'] = $value->indice;
			$obj['reposicao'] = $value->reposicao;
			$obj['idice'] = $value->indice;
			$obj['letivos_id'] = $value->letivos_id;
			$obj['planos_id'] = $value->planos_id;
			$obj['materia_turma_id'] = $value->materia_turma_id;
			$retorno[] = $obj;
		}
		return $retorno;
	}
	*/
	public function retrieve_by_filtro ( $obj ) 
	{
	
		$sel = 'tb_dia_letivos.id AS id, DATE_FORMAT(tb_dia_letivos.data, "%Y-%m-%d") AS datas, tb_dia_letivos.numero_dia AS numero_dia';
		$diaAula = DiasLetivosModel::find( 'all', 
			array(
					'select'=>$sel,
					'conditions' => array( 'name=? or id > ?', $obj.name, $obj.id ),
					 'order'=>'datas'));
		$retorno = array();
		
		foreach($diaAula as $key => $value) {
			$obj[ 'id' ] = $value->id; 
			$obj[ 'datas' ] = $value->datas;//.date("d - m - y") ;
			$obj[ 'numero_dia' ] = $value->numero_dia;						
			
			$retorno[] = $obj;
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
