<?php
/*
*Este controle realiza as operações de para exibição da Agenda.
*Controle já ajustado ao novo formato.
*To-do
*Este controle ainda esta incompleto.

@ Autor:    Cardoso
@ Data:     14/01/2023
@ Versão:   0.0.2

*/

namespace App\Controllers;

use App\Models\AdvogadosModel;
use App\Models\TasksModel;

class Agenda extends BaseController
{
    public function index()
    {
        //Inicio das funções do Tema. Não mexa aqui.
        if (!logged_in()) {
            return redirect()->to(base_url(route_to('login')));
        } //verifica se esta logado!
        $data = $this->tema();
        //Fim das funções do Tema
        //Inicio Funções do Tema que precisam ser editadas
        $data['title'] = lang('App.Extratos');
        //Fim das Funções editáveis do Tema

        $advogado = user_id();
        $TasksModel = new TasksModel();
        $data['tarefas'] = $TasksModel
            ->tarefas($advogado)
            ->getResultArray();

            helper('form');
            $AdvogadosModel = new AdvogadosModel();
            $responsaveis = $AdvogadosModel
                ->listar_advogados()
                ->getResultArray();
            $arrayResponsaveis = [];
            foreach ($responsaveis as $responsavel) {
                $arrayResponsaveis[$responsavel['id']] = $responsavel['username'];
            }
            $data['Responsaveis'] = form_dropdown('responsavel[]', $arrayResponsaveis,'' ,' multiple="multiple" class="form-control" style="width: 100%" id="responsavel"');
            

        return view('calendar/calendar', $data);


    }
        public function a_editar_evento(){
            if (!logged_in()) {
                return redirect()->to(base_url(route_to('/')));
            }
            $TasksModel = new TasksModel();
            $id = $this->request->getGET('evento');
            $data = [
                "task_id"           =>$id, 
                "prazo"     =>$this->request->getGET('data')
            ];
            $TasksModel->update($id, $data);
        

         }

}
