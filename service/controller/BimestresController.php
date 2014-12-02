<?php

require_once 'model/BimestresModel.php';
require_once 'model/DiasLetivosModel.php';

class BimestresController {

    public function retrieve($data){
        $nData = new DateTime($data . ' 00:00:00');
        $data = $nData;
        $bimestre = BimestresModel::find('all');
        foreach($bimestre as $key => $value) {
            if($data->format('Y-m-d') >= $value->data_inicio_id->format('Y-m-d')  &&
                $data->format('Y-m-d') <= $value->data_fim_id->format('Y-m-d') ) {
                return $value->id;
            }
        }
        return 4;
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
