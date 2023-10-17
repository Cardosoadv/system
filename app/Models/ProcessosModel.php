<?php

namespace App\Models;

use CodeIgniter\Model;

class ProcessosModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'dbc_processos';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		"id",
		"processo_no",
		"cliente_id",
		"observacao"
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

	public function get_cliente_processo(){
		$db = db_connect();
		$builder = $db->table('dbc_processos p');
		$builder->join('users u', 'p.cliente_id=u.id', 'left');
		$builder->join('dbc_users_data d', 'u.id = d.user_id','left');
		$builder->select('p.id, p.processo_no, p.observacao, p.cliente_id,d.nome, d.cpf_cnpj, d.data_nascimento, d.telefone, d.img');
		$query = $builder;
		return $query->get();
	}




}