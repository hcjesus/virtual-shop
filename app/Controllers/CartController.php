<?php namespace App\Controllers;


use App\Models\ItemsModel;
use App\Models\BrandModel;
use App\Models\CategoryModel;

class CartController extends BaseController
{

	public function addToCart2()
	{
		$brandModel = new BrandModel();
		$categoryModel = new CategoryModel();
		$model = new ItemsModel();

		$ncant = 0;
		$id = json_decode($_POST['idItem'],true);

		if(isset($_POST['cant'])){
			$ncant = json_decode($_POST['cant'],true);
		}

		//$rspuesta['algo'] = $ncant;

		
		$item = $model->find($id);
		
		$newitem = [
				'id'          =>	$item['id'],
				'item'        =>	$item['title'],
				'precio'      => 	$item['price'],
				'category'    =>    $item['category'],
				'descripcion' =>	$item['description'],
				'imagen' 	  => 	$item['imagen'],
				'cantidad'    => 	1	
			] ;

		$arrayItem[$item['id']]	= $newitem;

		if (!empty($this->session->cart)){
			$arrayCart = $this->session->cart;
			if(in_array($id, array_keys($arrayCart))){
				foreach ($arrayCart as $key => $value){
					if($key == $item['id']){
						if($ncant == 0){
							$qty = $value['cantidad']+1;
						}else{
							$qty = $ncant;
						}						
						$arrayCart[$key]['cantidad'] = $qty;						
						$this->session->set('cart',$arrayCart);
					}
				}
			}else{				
				$arrayCart[$item['id']] = $newitem;
				$this->session->set('cart',$arrayCart);
			}
		}else{
			$this->session->set('cart',$arrayItem);
		}

		$cant = 0;
		$total = 0;
		$acart = $this->session->cart;
		foreach ($acart as $value) {
			$cant = $cant + $value['cantidad'];
			$total = $total + ($value['cantidad'] * $value['precio']);			
		}

		$respuesta['qty'] = $cant;
		$respuesta['item'] = $newitem;
		$respuesta['precioTotal'] = $total;
 
		$this->session->set('gqty',$cant);
		$this->session->set('precioTotal',$total);

		echo json_encode($respuesta);

		//echo view('newItemView',$data);
		//$this->template('newItemView',$data);
	}

	public function addToCart()
	{
		$id = json_decode($_POST['idItem'],true);

		$errors['status'] = $response;
		echo json_encode($errors);

	}

	public function cartPage()
	{
		echo view('cartPageView');
	}

	public function updateCart()
	{

		$id = json_decode($_POST['idItem'],true);

		if (!empty($this->session->cart)){
			$arrayCart = $this->session->cart;
			$this->session->remove('cart');
			$this->session->remove('gqty');
			unset($arrayCart[$id]);
			$this->session->set('cart',$arrayCart);				
		}
		
		$cant = 0;
		$total = 0;
		$acart = $this->session->cart;
		foreach ($acart as $value) {
			$cant = $cant + $value['cantidad'];
			$total = $total + ($value['cantidad'] * $value['precio']);			
		}

		$respuesta['qty'] = $cant;
		$respuesta['precioTotal'] = $total;

 		if($cant == 0){
 			$this->session->remove('cart');
 			$this->session->remove('gqty');
 			$this->session->remove('precioTotal');
 		}else{
 			$this->session->set('gqty',$cant);
 			$this->session->set('precioTotal',$total);
 		}
		

		echo json_encode($respuesta);

	}





	
}