<?php

namespace App\Controllers;

use App\Models\DespesasModel;


class Despesas extends BaseController
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
        $data['title'] = lang('App.Despesas.title');
        //Fim das Funções editáveis do Tema
        $DespesasModel = new DespesasModel();
        $data['despesas'] = $DespesasModel
            ->orderBy('data_vencimento', 'DESC')
            ->findAll();
        $elementoPagina = new ElementosdePagina;
        $data['id_rubrica'] = $elementoPagina->comboRubrica('Despesa','id_rubrica');
        $data['id_conta'] = $elementoPagina->comboBanco('id_conta');
        $data['id_tipo_despesa'] = $elementoPagina->comboTipodeDespesa('id_tipo_despesa');

        return view('despesas', $data);
    }
    public function salvardespesa()
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        }
        $DespesasModel = new DespesasModel();
        $prevalor = $this->request->getVar('valor');
        $valor = str_replace(',', '.', str_replace('.', '', $prevalor));
        helper('customDate');
        $data = [
            'despesa' => $this->request->getVar('despesa'),
            'data_vencimento' => novaData($this->request->getVar('data_vencimento')),
            'id_tipo_despesa' => $this->request->getVar('id_tipo_despesa'),
            'id_conta' => $this->request->getVar('id_conta'),
            'id_rubrica' => $this->request->getVar('id_rubrica'),
            'valor' =>  $valor,
            'rateio' => $this->request->getVar('rateioSlider'),
        ];
        if ($this->request->getVar('data_pagamento')==null){
            $data['data_pagamento'] = '0000-00-00';
        }else{
            $data['data_pagamento'] = novaData($this->request->getVar('data_pagamento'));
        }
        $DespesasModel->insert($data);
       return $this->response->redirect(site_url('despesas'));
    }
    public function deletedespesa($id = null)
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        }
        $DespesasModel = new DespesasModel();
        $data['despesa'] = $DespesasModel->where('despesas_id', $id)->delete($id);
        return $this->response->redirect(site_url('despesas'));
    }
    public function ajax_editar_despesa($id)
    {
        $DespesasModel = new DespesasModel();
        $data = $DespesasModel->where('despesas_id', $id)->first();
        return $this->response->setJSON($data);
    }
    public function editardespesa($id)
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        }
        $DespesasModel = new DespesasModel();
        $prevalor = $this->request->getVar('valor');
        $valor = str_replace(',', '.', str_replace('.', '', $prevalor));
        helper('customDate');
        $data = [
            'despesa' => $this->request->getVar('despesa'),
            'data_vencimento' => novaData($this->request->getVar('data_vencimento')),
            'id_tipo_despesa' => $this->request->getVar('id_tipo_despesa'),
            'id_conta' => $this->request->getVar('id_conta'),
            'id_rubrica' => $this->request->getVar('id_rubrica'),
            'valor' =>  $valor,
            'rateio' => $this->request->getVar('rateioSlider'),
        ];
        if ($this->request->getVar('data_pagamento')==null){
            $data['data_pagamento'] = '0000-00-00';
        }else{
            $data['data_pagamento'] = novaData($this->request->getVar('data_pagamento'));
        }
       $DespesasModel->update($id, $data);
       return $this->response->redirect(site_url('despesas'));
    }
    //Fim da configuração das despesas

    public function exibir_comprovante($comprovante)
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        }
        $file = WRITEPATH . 'uploads/despesas/' . $comprovante;
           header('Content-Description: File Transfer');
           header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            return readfile($file);
    }
}
