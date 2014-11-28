<?php

require_once 'model/BimestresModel.php';

class BimestresController {


    public function retrieve($data){
        $bimestre = BimestresModel::find('all');
		  $retorno = array();
        foreach($bimestre as $key => $value) {
            $inicio = DiasLetivosModel::find($value->data_inicio_id);
            $fim = DiasLetivosModel::find($value->data_fim_id);

            if( ($inicio->data >= $data) && ($data <= $fim->data) )
                return $value;
        }
        /*
        $sel = 'tb_dia_letivos.id AS id, 	DATE_FORMAT(tb_dia_letivos.data, "%d-%m-%Y") AS datas, tb_dia_letivos.numero_dia AS 			numero_dia';
		$diaAula = DiasLetivosModel::find('all', array('select'=>$sel, 'order'=>'datas'));

		
		foreach($diaAula as $key => $value) {
			$obj['id'] = $value->id; 
			$obj['datas'] = $value->datas;
			$obj['numero_dia'] = $value->numero_dia;						
			
			$retorno[] = $obj;
		}
		return $retorno;
        */
    }
}
?>
