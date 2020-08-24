<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class ItemsModel extends Model
{
	protected $table = "ci_items";
	protected $primaryKey = 'id';

	protected $allowedFields = ['title','price','description','imagen','thumb','carrousel','brand','category','tags'];

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

	
}