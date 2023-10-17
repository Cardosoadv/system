<?php

namespace App\Models;

use CodeIgniter\Model;

class ContratosModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'dbc_contratos';
	protected $primaryKey           = 'cont_id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		"cont_id","contrato", "cliente_id", "cont_valor"
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
        
        
public function exibirFaturasContrato($id){ 
            $db = db_connect();
            $builder = $db->table('dbf_faturas f');
            $builder->join('dbc_contratos c','f.contrato_id=c.cont_id');
            $builder->Where('contrato_id',$id);
            $query=$builder->orderBy('fat_vencimento', 'ASC')->get();
            return $query;
    
}
public function exibirPagamentosContrato($id){
            $db = db_connect();
            $builder = $db->table('dbf_faturas f');
            $builder->join('dbc_contratos c','f.contrato_id=c.cont_id')
            ->join('dbf_pagamentos p', 'f.fat_id=p.fatura_id');
            $builder->Where('contrato_id',$id);
            $query=$builder->orderBy('pag_data', 'ASC')->get();
            return $query;
}
public function exibirCliente()
{
	$db = db_connect();
	$builder = $db->table('users u');
	$builder->join('dbc_contratos c', 'c.cliente_id=u.id');
	$query=$builder->get();
	return $query;

}
}