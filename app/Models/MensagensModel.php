<?php

namespace App\Models;

use CodeIgniter\Model;

class MensagensModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'com_mensagens';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		"id","assunto","lido", "mensagem", "sent_user_id", "receive_user_id", "create_at", "read_at"
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'read_at';

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

	public function mensagens_recebidas($receive_user_id){
		$MensagensModel = new MensagensModel();
		$mensagens_recebidas = $MensagensModel
				->where('receive_user_id', $receive_user_id)
				->findAll();
		return $mensagens_recebidas;
	}

	public function mensagens_recebidas_naolidas($receive_user_id){
			$MensagensModel = new MensagensModel();
			$mensagens_recebidas_naolidas=$MensagensModel
				->where('receive_user_id', $receive_user_id)
				->where('lido', 0)
				->findAll();
			return $mensagens_recebidas_naolidas;
	}
	public function mrnl($receive_user_id){
		
			$db = db_connect();
            $builder = $db->table('com_mensagens m');
            $builder->join('users u','m.sent_user_id=u.id');
            $builder->Where('m.sent_user_id',$receive_user_id);
			$builder->join('dbc_users_data d', 'd.user_id=u.id', 'left');
            $query=$builder->orderBy('created_at', 'ASC')->get();
			return $query;    

	}


}
