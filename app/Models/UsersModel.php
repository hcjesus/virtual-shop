<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class UsersModel extends Model
{
	protected $table = "ci_users";
	protected $primaryKey = 'id';

	protected $allowedFields = ['id','nombre','correo','contrasena','rol'];

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;
}