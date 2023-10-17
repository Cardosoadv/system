<?php

namespace App\Models;

use CodeIgniter\Model;

class DespesasModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'dbf_despesas';
	protected $primaryKey           = 'despesas_id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		"despesa", "data_vencimento", "valor", "data_pagamento", "id_tipo_despesa", "id_conta", "id_rubrica","rateio",
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


	public function vencendo($prazo){

		$DespesasModel = new DespesasModel();
		$vencendo = $DespesasModel
		->where('data_pagamento',null)
		->where('data_vencimento <',$prazo)
		->findAll();
		return $vencendo;

	}




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
