<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskStatusModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'dbo_tasks_status';
	protected $primaryKey           = 'task_id';	
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		"task_id", "set_status_id"
	];
        
        
	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'date';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

/*
	public function listar()
	{

	$db = db_connect();
	$builder = $db->table('banco b');
	$builder->join('pagamento p', 'p.id_conta=b.banco_id');
	$query=$builder->get();
	return $query;
}*/
}