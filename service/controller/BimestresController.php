<?php

require_once 'model/BimestresModel.php';
require_once 'model/DiasLetivosModel.php';

class BimestresController {
    
    public function retrieve($data){   
        $nData = new DateTime($data . ' 00:00:00');
        $data = $nData;
        $bimestre = BimestresModel::find('all');
        //echo $bimestre[0]->data_inicio_id->format('Y-m-d H:i:s');
        foreach($bimestre as $key => $value) {
            
            //$inicio = DiasLetivosModel::all(array('conditions' => array('id = ?' . $value->data_inicio_id)));
            //echo $inicio->data->format('Y-m-d H:i:s');
            //echo $inicio->id;
            //$fim = DiasLetivosModel::find($value->data_fim_id);

            //if( ($inicio->data >= $data) && ($data <= $fim->data) )
            //    return $value->id;
            if($value->data_inicio_id->format('Y-m-d H:i:s') <= $data->format('Y-m-d H:i:s') && 
               $value->data_fim_id >= $data->format('Y-m-d H:i:s')) {
                //echo $data->format('Y-m-d H:i:s');
                //echo 'data inicio: ' . $value->data_inicio_id->format('Y-m-d H:i:s');
                //echo 'data_fim: ' . $value->data_fim_id->format('Y-m-d H:i:s');
                return $value->id;
            }
        }
    }
    
}
?>