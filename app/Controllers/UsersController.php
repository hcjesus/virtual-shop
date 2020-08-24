<?php namespace App\Controllers;


use App\Models\UsersModel;


class UsersController extends BaseController
{
	public function profile()
	{
		$model = new UsersModel();
		$id = $this->session->id;
		$data['id']=$id;
		//$data = $this->model->
		echo view('perfilView',$data);
	}
}