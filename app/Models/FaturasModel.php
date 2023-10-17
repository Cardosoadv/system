<?php

namespace App\Models;

use CodeIgniter\Model;

class FaturasModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'dbf_faturas';
	protected $primaryKey           = 'fat_id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		"fat_id", "descricao", "cliente_id", "rubrica_id", "contrato_id", "fat_valor", "fat_emissao", "fat_vencimento", "banco_id", "rateio"
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

	public function listar()
	{

	$db = db_connect();
	$builder = $db->table('dbf_faturas f');
	$builder->join('dbc_contratos c', 'f.contrato_id=c.cont_id', 'LEFT');
	$builder->join('users u', 'f.cliente_id = u.id', 'left');

	$query=$builder->get();
	return $query;
}

	
}