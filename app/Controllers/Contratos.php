<?php
/*
*Este controle realiza as operações de CRUD dos Contratos.
*Controle já ajustado ao novo formato.
*To-do


@ Autor:    Cardoso
@ Data:     05/05/2022
@ Versão:   0.0.1

*/

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BancoModel;
use App\Models\ContratosModel;
use App\Models\ClientesModel;



class Contratos extends BaseController
{
    // Exibir lista de processos
    public function index()
    {
        
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        }
        $data = $this->tema();
        $data['title'] = lang('App.Contratos.index');
        //Fim das Funções editáveis do Tema
        $ContratosModel = new ContratosModel();

        $data['clientes'] = $ContratosModel
            ->exibirCliente()
            ->getResultArray();
        return view('contratos/contratos-lista', $data);
    }

    public function consultar($id = null)
    {

        //Inicio das funções do Tema. Não mexa aqui.
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        } //verifica se esta logado!
        $data = $this->tema();
        //Fim das funções do Tema
        //Inicio Funções do Tema que precisam ser editadas
        $data['username'] = user()->username;
        $data['title'] = lang('App.Contratos.consultarDetalhes');
        //Fim das Funções editáveis do Tema

        $ContratosModel = new ContratosModel();
        $contrato_obj = $ContratosModel->where('cont_id', $id)->first();
        $data['contrato_obj'] = $contrato_obj;
        $ClientesModel = new ClientesModel();
        $cliente_obj = $ClientesModel->where('id', $contrato_obj['cliente_id'])->first();
        $data['cliente'] = $cliente_obj;
        $data['faturas'] = $ContratosModel
            ->exibirFaturasContrato($id)
            ->getResultArray();
        $data['pagamentos'] = $ContratosModel
            ->exibirPagamentosContrato($id)
            ->getResultArray();

        helper('form');
        $BancoModel = new BancoModel();
        $bancos = $BancoModel->findAll();
        $arrayBancos = [];
        foreach ($bancos as $banco) {
            $arrayBancos[$banco['banco_id']] = $banco['banco'];
        }
        $data['bancos'] = form_dropdown('banco_id', $arrayBancos, "", 'class="form-control select2";"');
        return view('contratos/contratos-consulta', $data);
    }



    public function editar($id = null)
    {
        //Inicio das funções do Tema. Não mexa aqui.
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        } //verifica se esta logado!
        $data = $this->tema();
        //Fim das funções do Tema
        //Inicio Funções do Tema que precisam ser editadas
        $data['username'] = user()->username;
        $data['title'] = lang('App.Contratos.editar');
        //Fim das Funções editáveis do Tema

        $ClientesModel = new ClientesModel();
        $ContratosModel = new ContratosModel();
        $contrato_obj = $ContratosModel->where('cont_id', $id)->first();
        $data['contrato_obj'] = $contrato_obj;
        $selected = $contrato_obj['cliente_id'];
        $clientes = $ClientesModel->findAll();
        helper('form');
        $arrayClientes = [];
        foreach ($clientes as $cliente) {
            $arrayClientes[$cliente['id']] = $cliente['username'];
        }
        $data['comboClientes'] = form_dropdown('cliente_id', $arrayClientes, $selected, 'class="form-control select2" style="width: 75%;"');

        return view('contratos/contratos', $data);
    }

    // Formulário para adicionar processos
    public function salvar()
    {
        //Inicio das funções do Tema. Não mexa aqui.
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        } //verifica se esta logado!
        $data = $this->tema();
        //Fim das funções do Tema
        //Inicio Funções do Tema que precisam ser editadas
        $data['username'] = user()->username;
        $data['title'] = lang('App.Contratos.salvar');
        //Fim das Funções editáveis do Tema

        $ClientesModel = new ClientesModel();
        $clientes = $ClientesModel->findAll();
        helper('form');
        $arrayClientes = [];
        foreach ($clientes as $cliente) {
            $arrayClientes[$cliente['id']] = $cliente['username'];
        }
        $data['comboClientes'] = form_dropdown('cliente_id', $arrayClientes, '', 'class="form-control" style="width: 100%;"');
        return view('contratos/contratos', $data);
    }

    public function inserir()
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        } //verifica se esta logado!
        $data['titulo'] = "Adicionar Contrato";
        $ContratosModel = new ContratosModel();
        $prevalor = $this->request->getVar('cont_valor');
        $valor = str_replace(',', '.', str_replace('.', '', $prevalor));
        $data = [
            'contrato' => $this->request->getVar('contrato'),
            'cliente_id'  => $this->request->getVar('cliente_id'),
            'cont_valor'  => $valor,
        ];
        $ContratosModel->insert($data);
        return $this->response->redirect(site_url('contratos'));
    }

    public function update()
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        } //verifica se esta logado!
        $data['titulo'] = "Adicionar Contrato";
        $ContratosModel = new ContratosModel();
        $id = $this->request->getVar('cont_id');
        $prevalor = $this->request->getVar('cont_valor');
        $valor = str_replace(',', '.', str_replace('.', '', $prevalor));
        $data = [
            'contrato' => $this->request->getVar('contrato'),
            'cliente_id'  => $this->request->getVar('cliente_id'),
            'cont_valor'  => $valor,
        ];
        $ContratosModel->update($id, $data);
        return $this->response->redirect(site_url('contratos'));
    }

    public function deletar($id = null)
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        } //verifica se esta logado!
        $data['titulo'] = "Deletar Contrato";
        $ContratosModel = new ContratosModel();
        $data['contrato'] = $ContratosModel->where('cont_id', $id)->delete($id);
        return $this->response->redirect(site_url('contratos'));
    }
 


}
