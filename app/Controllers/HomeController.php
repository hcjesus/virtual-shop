<?php namespace App\Controllers;

use App\Models\ItemsModel;

class HomeController extends BaseController
{
	public function index()
	{
		$model = new ItemsModel();

		//$data['carrousel'] = $model->where('carrousel', 1)
        //         ->findAll(); 

        $data['items'] = $model->findAll();           


		echo view('home',$data);
		//$this->template('home',$data);		
	}

	public function url()
	{
		$data = [];
		$this->template('url',$data);
	}

	public function hora()
	{
		$data = [];
		$this->template('hora',$data);
	}

	public function base()
	{
		$data = [];
		$this->template('base',$data);
	}
	//--------------------------------------------------------------------

}
