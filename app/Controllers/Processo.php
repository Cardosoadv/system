<?php
/*
*Este controle realiza as operações de CRUD dos processos.
*Controle já ajustado ao novo formato.
*To-do
*Este controle ainda esta incompleto.

@ Autor:    Cardoso
@ Data:     05/05/2022
@ Versão:   0.0.1

*/

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProcessosModel;
use App\Models\ClientesModel;

class Processo extends BaseController
{
    // Exibir lista de processos
    public function index()
    {
        //Inicio das funções do Tema. Não mexa aqui.
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        } //verifica se esta logado!

        $data = $this->tema();
        //Fim das funções do Tema

        //Inicio Funções do Tema que precisam ser editadas
        $data['username'] = user()->username;
        $data['title'] = lang('App.Processos.listar');
        //Fim das Funções editáveis do Tema

        $ProcessosModel = new ProcessosModel();
        $data['processos'] = $ProcessosModel
            ->get_cliente_processo()
            ->getResultArray();

        $ClientesModel = new ClientesModel();
        $clientes = $ClientesModel->findAll();
        helper('form');
        $arrayClientes = [];
        foreach ($clientes as $cliente) {
            $arrayClientes[$cliente['id']] = $cliente['username'];
        }

        $data['cliente'] = form_dropdown('cliente_id', $arrayClientes,'','class="form-control select2" style="width: 100%;"');

        return view('processos/processos', $data);
    }

    public function salvar()
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        }
        $ProcessosModel = new ProcessosModel();
        
        $data = [
            'processo_no' => $this->request->getVar('processo_no'),
            'cliente_id' => $this->request->getVar('cliente_id'),
            'observacao' => $this->request->getVar('observacao'),
        ];
        $ProcessosModel->insert($data);
        return $this->response->redirect(site_url('processo'));
    }

    public function deletar($id = null)
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        }
        $ProcessosModel = new ProcessosModel();
        $ProcessosModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('processo'));
    }

    public function ajax_editar($id)
    {
        $ProcessosModel = new ProcessosModel();
        $data = $ProcessosModel->where('id', $id)->first();
        echo json_encode($data);
    }

}
