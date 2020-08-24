<?php namespace App\Controllers;


use App\Models\RegistroModel;


class RegistroController extends BaseController
{	
	public function registro()
	{
		$data = [];
		echo view('registro_view');
		//$this->template('registro_view',$data);
	}

	public function insert()
	{
		$model = new RegistroModel();
		$validation =  \Config\Services::validation();

		$encrypter = \Config\Services::encrypter();

		helper(['form', 'url']);

		$passData = [];	



		
		$response = json_decode($_POST['arreglo'],true);

		$data = [];
		foreach ($response as $value) {
			$data[$value['name']] = $value['value'];
		}
		
		/*
		$data = [
			'nombre' => $this->request->getVar('nombre'),
			'correo' => $this->request->getVar('correo'),
			'contrasena' => $this->request->getVar('contrasena'),
			'contrasena2' => $this->request->getVar('contrasena2')
		];
*/
		$validation->reset();

		if(!$validation->run($data,'registro')){
			$errors = $validation->getErrors();
			$errors['status'] = true;
			echo json_encode($errors);
		}else{
			$user = new \App\Entities\User($data);
			$user->setPassword($data['contrasena']);
			$model->insert($user);

			/*
			$pass = $data['contrasena'];
			$data['contrasena'] = base64_encode($encrypter->encrypt($pass));					
			$model->insert($data);*/
			//$this->template('home',$passData);
			$data['status'] = false;

			echo json_encode($data);
		}

		
	} 
	//--------------------------------------------------------------------

}
