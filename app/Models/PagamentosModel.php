<?php

namespace App\Models;

use CodeIgniter\Model;

class PagamentosModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'dbf_pagamentos';
	protected $primaryKey           = 'pag_id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		"pag_id","fatura_id", "pag_valor", "pag_doc","pag_data", "id_conta"
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

	public function listar()
	{
		$db = db_connect();
		$builder = $db->table('dbf_pagamentos p');
		$builder->join('dbf_faturas f', 'p.fatura_id=f.fat_id');
		$builder->join('dbc_contratos c','f.contrato_id=c.cont_id');
		$builder->join('dbf_bancos b','p.id_conta=b.banco_id', 'left' );
		$query=$builder->get();
		return $query;

	}

}