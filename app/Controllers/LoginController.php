<?php namespace App\Controllers;


use App\Models\RegistroModel;

class LoginController extends BaseController
{

	public function login()
	{
		$data = [];
		echo view('loginvw');
		//$this->template('loginvw',$data);
	}

	public function valida()
	{

		$model = new RegistroModel();

		$validation =  \Config\Services::validation();
		$encrypter = \Config\Services::encrypter();
		

		helper(['form', 'url']);

		$passData = []; 

		$data = [
			'correo' => $this->request->getVar('correo'),
			'contrasena' => $this->request->getVar('contrasena')
		];

		$validation->reset();

		if(!$validation->run($data,'login')){
			$errors = $validation->getErrors();
			$this->session->setFlashdata('error',$errors);
			return redirect()->back(); 
		}else{

			$user = $model->where('correo',$data['correo'])
						  ->first();

			$sessionData = [
				'id' 	  => $user->id,
				'usuario' => $user->nombre,
				'correo'  => $user->correo,
				'rol'     => $user->rol
			];

			$this->session->set($sessionData);			
			//$this->template('home',$passData);
			return redirect()->to('home');

		}

	}

	public function logout()
	{
		$this->session->destroy();
		$data = [];
		return redirect()->to('home');
	}

}