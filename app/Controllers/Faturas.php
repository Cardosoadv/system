<?php
/*
*Este controle realiza as operações de CRUD das Faturas.
*Controle já ajustado ao novo formato.
*To-do
*Este controle ainda esta incompleto.

@ Autor:    Cardoso
@ Data:     05/05/2022
@ Versão:   0.0.1

*/

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FaturasModel;


class Faturas extends BaseController
{  
    
    // Exibir lista de faturas
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
        $data['title'] = lang('App.Faturas.index');
        //Fim das Funções editáveis do Tema

        $FaturasModel = new FaturasModel();
        $data['faturas'] = $FaturasModel
            ->listar()
            ->getResultArray(); 
        $elementoPagina = new ElementosdePagina;   //instanciando o Controller Elementos de Página
        $data['contratos'] = $elementoPagina->comboContratos('contrato_id'); //insere a combo dos contratos 
        $data['clientes'] = $elementoPagina->comboClientes('cliente_id'); //insere a combo dos clientes
        $data['rubrica'] = $elementoPagina->comboRubrica('Receita','rubrica'); //inserindo o combo de Rubrica
        $data['bancos'] = $elementoPagina->comboBanco('bancos'); //inserindo o combo de Rubrica

        return view('faturas/faturas', $data);
    }

    public function ajax_editar_fatura($id)
    {
        $FaturasModel = new FaturasModel();
        $data = $FaturasModel->where('fat_id', $id)->first();
        return $this->response->setJSON($data);
    }

    public function salvarFatura()
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        }
        $FaturasModel = new FaturasModel();
        helper('customDate');
        $prevalor = $this->request->getVar('fat_valor');
        $valor = str_replace(',', '.', str_replace('.', '', $prevalor));
        $parcelas = $this->request->getVar('parcelas');
        $data = [
            'descricao' => $this->request->getVar('descricao'),
            'rubrica_id' => $this->request->getVar('rubrica'),
            'cliente_id' => $this->request->getVar('cliente_id'),
            'contrato_id' => $this->request->getVar('contrato_id'),
            'banco_id' => $this->request->getVar('bancos'),
            'rateio' => $this->request->getVar('rateioSlider'),
            'fat_emissao'  => novaData($this->request->getVar('fat_emissao')),
            'fat_valor'  => $valor,
        ];

        for ($i = 0; $i < $parcelas; $i++) {
            $vencimento = novaData($this->request->getVar('fat_vencimento'));
            $data['fat_vencimento'] = date('Y-m-d', strtotime("+$i month", strtotime($vencimento)));
            $FaturasModel->insert($data);
        }
        return $this->response->redirect(site_url('faturas'));

    }

    public function editarFatura($id)
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        }
        $FaturasModel = new FaturasModel();
        helper('customDate');
        $prevalor = $this->request->getVar('fat_valor');
        $valor = str_replace(',', '.', str_replace('.', '', $prevalor));

        $data = [
            'descricao' => $this->request->getVar('descricao'),
            'rubrica_id' => $this->request->getVar('rubrica'),
            'cliente_id' => $this->request->getVar('cliente_id'),
            'contrato_id' => $this->request->getVar('contrato_id'),
            'banco_id' => $this->request->getVar('bancos'),
            'rateio' => $this->request->getVar('rateioSlider'),
            'fat_emissao'  => novaData($this->request->getVar('fat_emissao')),
            'fat_vencimento'  => novaData($this->request->getVar('fat_vencimento')),
            'fat_valor'  => $valor,
        ];

        $FaturasModel->update($id, $data);
        return $this->response->redirect(site_url('faturas'));
    }


    public function deletar($id = null)
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        }
        $FaturasModel = new FaturasModel();
        $data['fatura'] = $FaturasModel->where('fat_id', $id)->delete($id);
        return $this->response->redirect(site_url('faturas'));
    }
}
