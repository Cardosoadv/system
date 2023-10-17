<?php

namespace App\Models;

use CodeIgniter\Model;

class AdvogadosModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'users';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		"email", "username", "password_hash", "reset_hash", "reset_at", "reset_expires", "activate_hash", "status", "status_message", "active", "force_pass_reset"
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

	public function advogados($id)
	{
		$db = db_connect();
		$builder = $db->table('users u')
			->Where('u.id', $id);
		$builder->join('auth_groups_users g', 'g.user_id=u.id', 'left')
			->where('g.group_id', 1);
		$builder->join('dbc_users_data d', 'd.user_id=u.id', 'left');
		$query = $builder;
		return $query->get();
	}

	public function listar_advogados()
	{
		$db = db_connect();
		$builder = $db->table('auth_groups_users g')
			->Where('g.group_id', 1);
		$builder->join('users u', 'g.user_id=u.id', 'left');
		$query = $builder;
		return $query->get();
	}

	public function selecionar_advogado()
	{
		$db = db_connect();
		$builder = $db->table('auth_groups_users g')
			->Where('g.group_id', 1);
		$builder->join('users u', 'g.user_id=u.id', 'left');
		$query = $builder->select('u.id, u.username');
		return $query->get();
	}



	public function inserir($username, $email, $nome, $cpf_cnpj, $data_nascimento, $telefone, $img)
	{
		$db = db_connect();
		$users = [
			'username'	=>	$username,
			'email'		=>	$email,
			'created_at' => date('Y-m-d H:i:s')
		];
		$db->table('users')->insert($users);
		$user_id = $db->insertID();
		$data = [
			'nome'				=>	$nome,
			'cpf_cnpj'			=>	$cpf_cnpj,
			'data_nascimento'	=>	$data_nascimento,
			'telefone'			=>	$telefone,
			'img'				=>	$img,
			'user_id'			=>	$user_id
		];
		$db->table('dbc_users_data')->insert($data);
		$data = [
			'group_id'				=>	1,
			'user_id'			=>	$user_id
		];
		$db->table('auth_groups_users')->insert($data);
	}
}
