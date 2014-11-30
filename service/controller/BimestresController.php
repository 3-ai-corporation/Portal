<?php

require_once 'model/BimestresModel.php';
require_once 'model/DiasLetivosModel.php';

class BimestresController {

    public function retrieve($data){
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

    public function retrieve_all(){

        $bimestre = BimestresModel::find('all');
        $retorno = array();
        foreach($bimestre as $key => $value) {
            $inicio = DiasLetivosModel::find($value->data_inicio_id);
            $fim = DiasLetivosModel::find($value->data_fim_id);
            $obj['id'] = $value->id;
            $obj['data_fim_id'] = $fim->data;
            $obj['data_inicio_id'] = $inicio->data;
            $retorno[] = $obj;
        }
        return $retorno;
    }

    private function object_to_array($Class) {
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
?>
