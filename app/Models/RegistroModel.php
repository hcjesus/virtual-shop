<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class RegistroModel extends Model
{
	protected $table = "ci_users";
	protected $primaryKey = 'id';

	protected $allowedFields = ['nombre','correo','contrasena'];

    protected $returnType     = 'App\Entities\User';
    protected $useSoftDeletes = false;

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

	
}