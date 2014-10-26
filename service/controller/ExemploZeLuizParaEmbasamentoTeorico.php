<?php

require_once 'model/ProductsModel.php';

class ProductsController {
	public function create($product) {
		$product = $this->object_to_array($product);
		$product = ProductsModel::create($product);
		
		return $product->to_array();
	}
	
	public function retrieve() {
		$products = ProductsModel::find('all',array('order' => 'name'));
		$retorno = array();
		foreach($products as $key => $value ) {
			$obj['id'] = $value->id;
			$obj['name'] = $value->name;
			$obj['price'] = $value->price;
			
			$retorno[] = $obj;
		}
		return $retorno;
	}
	
	public function update($product) {
		$model = ProductsModel::find($product['id']);
		$model->update_attributes($product);
		return $model->to_array();
	}
	
	public function delete($id) {
		$product = ProductsModel::find($id);
		return $product->delete();
	}
	
	private function object_to_array(stdClass $Class) {
		$Class = (array)$Class;
		
		foreach($Class as $key => $value) {
			if( is_object($value) && get_class($value) === 'stdClass') {
				$Class[$key] = self::object_to_array($value);
			}
		}
		
		return $Class;
	}
	
}

?>