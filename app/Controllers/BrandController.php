<?php namespace App\Controllers;


use App\Models\BrandModel;

class BrandController extends BaseController
{

	public function newBrand()
	{
		echo view('newBrandView');
	}

	public function saveBrand()
	{
		$model = new BrandModel();

		$validation =  \Config\Services::validation();

		helper(['form', 'url']);

		$data = [
			'brand' => $this->request->getVar('brand')
		];

		$validation->reset();		
		if(!$validation->run($data,'brand')){
			$errors = $validation->getErrors();
			session()->setFlashdata('error',$errors);
			return redirect()->back(); 
		}else{

			$model->insert($data);
			return redirect()->back();
		}

	}


	
}