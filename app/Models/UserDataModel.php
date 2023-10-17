<?php

namespace App\Models;

use CodeIgniter\Model;

class UserDataModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'dbc_users_data';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		"id", "nome", "cpf_cnpj", "data_nascimento", "telefone", "img", "user_id"
	];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
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

	public function get_dados($id)
	{
		$db = db_connect();
		$builder = $db->table('users u')
			->Where('u.id', $id);
		$builder->join('dbc_users_data d', 'd.user_id=u.id', 'left');
		$query = $builder;
		return $query->get();
	}
}
