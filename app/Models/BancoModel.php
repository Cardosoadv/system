<?php

namespace App\Models;

use App\Controllers\Despesas;
use CodeIgniter\Model;

class BancoModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'dbf_bancos';
	protected $primaryKey           = 'banco_id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		"banco_id","banco", "agencia", "conta", "saldo_inicial"
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


	public function get_pagamentos($conta){
		$db = db_connect();
		$builder = $db->table('dbf_pagamentos p');
		$builder->where('id_conta',$conta)
		->orderBy('pag_data', 'ASC');
		$builder->join('dbf_faturas f','p.fatura_id=f.fat_id','left');
		$builder->join('dbc_contratos c', 'f.contrato_id=c.cont_id','left');
		$pagamentos = $builder->get();
		return $pagamentos->getResultArray();
	}
	public function get_despesas($conta){
		$db = db_connect();
		$builder = $db->table('dbf_despesas');
		$builder->where('id_conta',$conta)
		->orderBy('data_pagamento', 'ASC');
		$despesas = $builder->get();
		return $despesas->getResultArray();
	}

	public function saldo_inicial($conta){
		$BancosModel=new BancoModel();
        $saldo_inicial=$BancosModel
		->select('saldo_inicial')
		->where('banco_id',$conta)
		->first();
		return $saldo_inicial;
	}

	public function getBanco($id){
		$banco = $this->
		select('banco')
		->where('banco_id',$id)
		->first();
		return $banco;
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