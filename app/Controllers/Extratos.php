<?php
/*
*Este controle realiza as operações para exibição do extrato.
*Controle já ajustado ao novo formato.
*To-do
*Este controle ainda esta incompleto.

@ Autor:    Cardoso
@ Data:     05/05/2022
@ Versão:   0.0.1

*/

namespace App\Controllers;

use App\Models\BancoModel;
use App\Models\DespesasModel;
use CodeIgniter\Files\File;

class Extratos extends BaseController
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
        $data['username'] = user()->username;
        $data['title'] = lang('App.Extratos');
        //Fim das Funções editáveis do Tema

        $BancosModel = new BancoModel();
        $data['saldo_inicial'] = $BancosModel->saldo_inicial(1);
        $data['pagamentos'] = $BancosModel->get_pagamentos(1);
        $data['despesas'] = $BancosModel->get_despesas(1);

        //echo '<pre>';
        //print_r($data);



        return view('extrato', $data);
    }


    public function salvardespesa()
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        }
        $DespesasModel = new DespesasModel();
        $prevalor = $this->request->getVar('valor');
        $valor = str_replace(',', '.', str_replace('.', '', $prevalor));

        $pdf = $this->request->getFile('comprovante');
        $filepath = WRITEPATH . 'uploads/' . $pdf->store('despesas/');
        $prearquivo = new File($filepath);
        $arquivo = $prearquivo->getFilename();
        helper('customDate');
        $data = [
            'despesa' => $this->request->getVar('despesa'),
            'data_vencimento' => novaData($this->request->getVar('data_vencimento')),
            'data_pagamento' => novaData($this->request->getVar('data_pagamento')),
            'id_tipo_despesa' => $this->request->getVar('id_tipo_despesa'),
            'id_conta' => $this->request->getVar('id_conta'),
            'id_rubrica' => $this->request->getVar('id_rubrica'),
            'valor' =>  $valor,
            'comprovantes' => $arquivo,
        ];

        $DespesasModel->insert($data);
        return $this->response->redirect(site_url('despesas'));
    }
    public function deletedespesa($id = null)
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        }
        $DespesasModel = new DespesasModel();
        $data['despesa'] = $DespesasModel->where('despesa_id', $id)->delete($id);
        return $this->response->redirect(site_url('despesas'));
    }
    public function ajax_editar_despesa($id)
    {
        $DespesasModel = new DespesasModel();
        $data = $DespesasModel->where('despesas_id', $id)->first();
        echo json_encode($data);
    }
    public function editardespesa($id)
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        }
        $DespesasModel = new DespesasModel();
        $id = $this->request->getVar('despesa_id');
        $prevalor = $this->request->getVar('valor');
        $valor = str_replace(',', '.', str_replace('.', '', $prevalor));

        $pdf = $this->request->getFile('comprovante');
        $filepath = WRITEPATH . 'uploads/' . $pdf->store('despesas/');
        $prearquivo = new File($filepath);
        $arquivo = $prearquivo->getFilename();
        helper('customDate');
        $data = [
            'despesa' => $this->request->getVar('despesa'),
            'data_vencimento' => novaData($this->request->getVar('data_vencimento')),
            'data_pagamento' => novaData($this->request->getVar('data_pagamento')),
            'id_tipo_despesa' => $this->request->getVar('id_tipo_despesa'),
            'id_conta' => $this->request->getVar('id_conta'),
            'id_rubrica' => $this->request->getVar('id_rubrica'),
            'valor' =>  $valor,
            'comprovantes' => $arquivo,
        ];
        $DespesasModel->update($id, $data);
        echo '<pre>';
        print_r($filepath);
        //      return $this->response->redirect(site_url('despesas'));
    }
    //Fim da configuração das despesas

}
