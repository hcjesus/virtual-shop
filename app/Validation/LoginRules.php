<?php namespace App\Validation;

use App\Models\RegistroModel;

class LoginRules
{
	public function authUser(string $str, string $fields, array $data)
	{
		$model = new RegistroModel();
		$user = $model->where('correo',$data['correo'])
					  ->first();

		if(!$user)
			return false;

		return password_verify($data['contrasena'], $user->contrasena);
	}
}





?>