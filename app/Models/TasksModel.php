<?php

namespace App\Models;

use CodeIgniter\Model;

class TasksModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'dbo_tasks';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		"id", "task", "prazo", "prioridade", "responsavel", "detalhes"
	];

	// Dates
	protected $useTimestamps        = true;
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


	public function tarefas($advogado)
	{
		$builder = $this->db->table('dbo_tasks_responsables r')
		->Where('user_id',$advogado);
		$builder->join('dbo_tasks t', 't.id=r.task_id', 'inner');
		$builder->join('dbo_tasks_status s', 's.task_id=t.id','left');
		return $builder->get();
	}

	public function responsaveis($task)
	{
		$builder = $this->db->table('dbo_tasks_responsables')
		->where('task_id',$task);
		$query = $builder->Select('user_id');
		return $query->get();

	}

	public function set_status_task($id){
		$db = db_connect();
		$data=[
			'task_id'	=>	$id,
			'set_status_id'	=> 1
		];

		$db->table('dbo_tasks_status')->insert($data);	
	}

	public function set_responsable_task($id, $userid){
		$db = db_connect();
		$data=[
			'task_id'	=>	$id,
			'user_id'	=>  $userid
		];

		$db->table('dbo_tasks_responsables')->insert($data);
	}

	public function delete_responsable($task){
		$this->db->table('dbo_tasks_responsables')->delete(['task_id'=>$task]);
	}

	public function tarefa_status($id){
		$builder = $this->db->table('dbo_tasks_responsables r')
		->Where('user_id',$id);
		$builder->join('dbo_tasks t', 't.id=r.task_id', 'left');
		$builder->join('dbo_tasks_status s', 's.task_id=t.id','left');
		return $builder->get();
	}

	public function tarefas_por_status($advogado, $status)
	{
		$builder = $this->db->table('dbo_tasks_responsables r')
		->Where('user_id',$advogado);
		$builder->join('dbo_tasks t', 't.id=r.task_id', 'left');
		$builder->join('dbo_tasks_status s', 's.task_id=t.id','left')
		->where('set_status_id',$status);
		return $builder->get();
	}

	public function vencendo($advogado,$prazo){

		$builder = $this->db->table('dbo_tasks_responsables r')
		->Where('user_id',$advogado);
		$builder->join('dbo_tasks t', 't.id=r.task_id', 'left');
		$vencendo = $builder
		->where('prazo <',$prazo)
		->get();
		return $vencendo;

	}

	public function num_tarefas($hoje){
		$month = $hoje->getMonth();
		$year = $hoje->getYear();
		$builder = $this->db->table('dbo_tasks');
		$builder->getWhere('month(`prazo`)',$month);
		$builder->getWhere('YEAR(`prazo`)',$year);
		return $builder->get();

	}


 
}
