<?php namespace App\Controllers;


use App\Models\ItemsModel;
use App\Models\BrandModel;
use App\Models\CategoryModel;

class ItemsController extends BaseController
{

	public function newItem()
	{
		$brandModel = new BrandModel();
		$categoryModel = new CategoryModel();

		$data['brands'] = $brandModel->asArray()->findAll();
		$data['category'] = $categoryModel->asArray()->findAll(); 

		echo view('newItemView',$data);
		//$this->template('newItemView',$data);
	}

	public function saveItem()
	{

		$model = new ItemsModel();

		$validation =  \Config\Services::validation();



		helper(['form', 'url']);

		$passData = []; 
		

		$file = $this->request->getFile('imagen');

		if ($file->isValid() && ! $file->hasMoved())
	    {
	        $newName = $file->getRandomName();
	        $file->move('assets/images', $newName);
	    }

	    $thumbImg = 'thumb_'.$newName;

	    $image = \Config\Services::image()
        		->withFile('assets/images/'.$newName)
        		->fit(100, 100, 'center')
        		->save('assets/images/'.$thumbImg);

	    $data = [
			'title' => $this->request->getVar('producto'),
			'price' => $this->request->getVar('precio'),
			'description' => $this->request->getVar('descripcion'),
			'imagen'=> $newName,
			'thumb'=> $thumbImg,
			'brand'=>$this->request->getVar('marcas'),
			'category'=>$this->request->getVar('category'),
			'tags'=>$this->request->getVar('tags')
		];
		
		$validation->reset();		
		if(!$validation->run($data,'items')){
			$errors = $validation->getErrors();
			session()->setFlashdata('error',$errors);
			return redirect()->back(); 
		}else{

			$model->insert($data);
			return redirect()->back();
			//echo view('home');			
			//$this->template('home',$passData);

		}
	}

	public function showItems()
	{
		$model = new ItemsModel();

		$data['items'] = $model->asArray()->findAll();
		echo view('itemsView',$data);
		//$this->template('itemsView',$data);
	}

	public function deleteItem($id)
	{
		$model = new ItemsModel();

		$item = $model->delete($id);

		session()->setFlashdata('success','Producto Eliminado.');
   
   		//return redirect()->to('home');
   		return redirect()->back();

	}

	public function editItem($id = false)
	{
		$modela = new ItemsModel();		
		$brandModel = new BrandModel();
		$categoryModel = new CategoryModel();

		$data['item'] = $modela->find($id);
		$data['brands'] = $brandModel->asArray()->findAll();
		$data['category'] = $categoryModel->asArray()->findAll();

		echo view('editItemView',$data);
		//$this->template('editItemView',$dat);
	}

	public function updateItem()
	{
		$model = new ItemsModel();

		$validation =  \Config\Services::validation();

		helper(['form', 'url']);

		$passData = []; 

		$id = $this->request->getVar('id');

		$data = $model->find($id); 
		$name = $this->request->getVar('imagex');

		if ($name != $data['imagen']){
			$file = $this->request->getFile('imagen');

			if ($file->isValid() && ! $file->hasMoved())
		    {
		        $newName = $file->getRandomName();
		        $file->move('assets/images', $newName);
		    }
		}else{
			$newName = $this->request->getVar('imagex');

		}
		
		$data = [
			'title' => $this->request->getVar('producto'),
			'price' => $this->request->getVar('precio'),
			'description' => $this->request->getVar('descripcion'),
			'imagen'=> $newName,
			'brand'=>$this->request->getVar('marcas'),
			'category'=>$this->request->getVar('category'),
			'tags'=>$this->request->getVar('tags')
		];

		$validation->reset();

		if(!$validation->run($data,'items')){
			$errors = $validation->getErrors();
			session()->setFlashdata('error',$errors);
			return redirect()->back(); 
		}else{

			$user = $model->update($id,$data);

			return redirect()->to('items');
			//echo view('home');			
			//$this->template('home',$passData);

		}
	}

	public function detalleItem($id)
	{

		$model = new ItemsModel();

		$data['item'] = $model->find($id);

		echo view('detalleItemView',$data);
	}

	public function buscarItem()
	{
		$model = new ItemsModel();

		$tag = $this->request->getVar('clave');

		$data['items'] = $model->asArray()->like('tags',$tag)->findAll();
		echo view('itemsResultView',$data);
		//$this->template('itemsView',$data);
	}

	public function showItemCategory($id)
	{
		$model = new ItemsModel();
		$category = new CategoryModel();

		$item = $model->asArray()->where('category',$id)->findAll();

		$cat  = $category->find($id);

		$data['items'] = $item;
		$data['category'] = $cat;

		echo view('itemsCategoryView',$data);
		//$this->template('itemsView',$data);
	}

	public function itemsCarrousel()
	{
		$model = new ItemsModel();

		$data['items'] = $model->asArray()->findAll();
		echo view('itemsCarrouselView',$data);
	}

	public function updateCarrousel()
	{
		$model = new ItemsModel();

		$response = json_decode($_POST['arregloItem'],true);

		$data = [];
		foreach ($response as $key => $value) {
			
			$model->set('carrousel',$value);
			$model->where('id',$key);
			$model->update();
		}
		$data['status'] = 'ok';
		echo json_encode($data);
		
	}
}