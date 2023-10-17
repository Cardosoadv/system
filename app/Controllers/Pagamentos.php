<?php
/*
*Este controle realiza as operações de CRUD dos pagamentos (Receita do escritório).
*Controle já ajustado ao novo formato.
*To-do
*Este controle ainda esta incompleto.

@ Autor:    Cardoso
@ Data:     05/05/2022
@ Versão:   0.0.1

*/

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BancoModel;
use App\Models\FaturasModel;
use App\Models\PagamentosModel;


class Pagamentos extends BaseController
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
        $data['title'] = lang('App.Pagamentos.index');
        //Fim das Funções editáveis do Tema

        $PagamentosModel = new PagamentosModel();
        $data['pagamentos'] = $PagamentosModel
            ->listar()
            ->getResultArray();
        return view('pagamentos/pagamentos-lista', $data);
    }


    public function salvar()
    {

              
        //Inicio das funções do Tema. Não mexa aqui.
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        } //verifica se esta logado!
        $data = $this->tema();
        //Fim das funções do Tema
        //Inicio Funções do Tema que precisam ser editadas
        $data['title'] = lang('App.Pagamentos.salvar');
        //Fim das Funções editáveis do Tema

        $FaturasModel = new FaturasModel();
        $faturas = $FaturasModel->findAll();
        helper('form');
        $arrayFaturas = [];
        foreach ($faturas as $fatura) {
            $arrayFaturas[$fatura['fat_id']] = $fatura['fat_id'];
        }
        $data['faturas'] = form_dropdown('fatura_id', $arrayFaturas, '', 'class="form-control select2" style="width: 100%;"');
        return view('pagamentos/pagamentos', $data);
    }

    public function inserir()
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        }
        $PagamentosModel = new PagamentosModel();
        helper('customDate');
        $prevalor = $this->request->getVar('pag_valor');
        $valor = str_replace(',', '.', str_replace('.', '', $prevalor));
        $data = [
            'fatura_id' => $this->request->getVar('fatura_id'),
            'pag_doc'  => $this->request->getVar('pag_doc'),
            'pag_data'  => novaData($this->request->getVar('pag_data')),
            'pag_valor'  => $valor,
            'id_conta' => $this->request->getVar('banco_id')
        ];
        $PagamentosModel->insert($data);
        return $this->response->redirect(site_url('pagamentos'));
    }

    public function a_inserir()
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        }
        $PagamentosModel = new PagamentosModel();
        helper('customDate');
        $prevalor = $this->request->getVar('pag_valor');
        $cont_id = $this->request->getVar('cont_id');
        $valor = str_replace(',', '.', str_replace('.', '', $prevalor));
        $data = [
            'fatura_id' => $this->request->getVar('faturaPaga'),
            'pag_doc'  => $this->request->getVar('pag_doc'),
            'pag_data'  => novaData($this->request->getVar('pag_data')),
            'pag_valor'  => $valor,
            'id_conta' => $this->request->getVar('banco_id')
        ];
        $PagamentosModel->insert($data);
        return $this->response->redirect(site_url('contratos/consultar/' . $cont_id));
    }

    public function update()
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        }
        $PagamentosModel = new PagamentosModel();
        $id = $this->request->getVar('pag_id');
        $prevalor = $this->request->getVar('pag_valor');
        $valor = str_replace(',', '.', str_replace('.', '', $prevalor));
        helper('customDate');
        $data = [
            'pag_id' => $this->request->getVar('pag_id'),
            'fatura_id'  => $this->request->getVar('fatura_id'),
            'pag_data' => novaData($this->request->getVar('pag_data')),
            'pag_doc'  => $this->request->getVar('pag_doc'),
            'pag_valor'  => $valor,
            'id_conta' => $this->request->getVar('banco_id')
        ];
        $PagamentosModel->update($id, $data);
        return $this->response->redirect(site_url('pagamentos'));
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
        $data['title'] = lang('App.Pagamentos.editar');
        //Fim das Funções editáveis do Tema

        $PagamentosModel = new PagamentosModel();
        $FaturasModel = new FaturasModel();
        $pagamento_obj = $PagamentosModel->where('pag_id', $id)->first();
        $data['pagamento_obj'] = $pagamento_obj;
        $selectedFatura = $pagamento_obj['fatura_id'];
        $faturas = $FaturasModel->findAll();
        helper('form');

        $arrayFaturas = [];
        foreach ($faturas as $fatura) {
            $arrayFaturas[$fatura['fat_id']] = $fatura['fat_id'];
        }
        $data['faturas'] = form_dropdown('fatura_id', $arrayFaturas, $selectedFatura, 'class="form-control select2";"');

        $BancoModel = new BancoModel();
        $bancos = $BancoModel->findAll();
        $selectedBanco = $pagamento_obj['id_conta'];
        $arrayBancos = [];
        foreach ($bancos as $banco) {
            $arrayBancos[$banco['banco_id']] = $banco['banco'];
        }
        $data['bancos'] = form_dropdown('banco_id', $arrayBancos, $selectedBanco, 'class="form-control select2";"');



        return view('pagamentos/pagamentos', $data);
    }

    public function deletar($id = null)
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        }
        $PagamentosModel = new PagamentosModel();
        $data['pagamento'] = $PagamentosModel->where('pag_id', $id)->delete($id);
        return $this->response->redirect(site_url('pagamentos'));
    }

    public function debugar()
    {
        $PagamentosModel = new PagamentosModel();
        $data['debug'] = $PagamentosModel->listar()->getResultArray();
        echo "<pre>";
        print_r($data['debug']);
    }
}
