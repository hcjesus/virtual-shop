<?php namespace App\Controllers;


use App\Models\CategoryModel;

class CategoryController extends BaseController
{

	public function newCategory()
	{		
		echo view('newCategoryView');
	}

	public function saveCategory()
	{
		$model = new CategoryModel();

		$validation =  \Config\Services::validation();

		helper(['form', 'url']);

		$data = [
			'category' => $this->request->getVar('categoria')
		];

		$validation->reset();		
		if(!$validation->run($data,'category')){
			$errors = $validation->getErrors();
			session()->setFlashdata('error',$errors);
			return redirect()->back(); 
		}else{

			$model->insert($data);
			return redirect()->back();
		}

	}


	
}