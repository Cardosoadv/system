<?php
/*
*Este controle realiza as operações de configurações gerais.
*Controle já ajustado ao novo formato.
*To-do
*Este controle ainda esta incompleto.

@ Autor:    Cardoso
@ Data:     05/05/2022
@ Versão:   0.0.1

*/

namespace App\Controllers;

use App\Models\BancoModel;
use App\Models\RubricaModel;
use App\Models\TipodadespesaModel;

class Configuracao extends BaseController
{
 

    //inicio do Index
    public function index()
    {

        //Inicio das funções do Tema. Não mexa aqui.
        if (!logged_in()) {
            return redirect()->to(base_url(route_to('login')));
        } //verifica se esta logado!
        $data = $this->tema();
        //Fim das funções do Tema
        //Inicio Funções do Tema que precisam ser editadas
        $data['title'] = lang('App.Contratos.consultarDetalhes');

        //Fim das Funções editáveis do Tema
        return view('configuracao', $data);
    }

    //inicio da configuração dos Plano de contas


    public function rubrica()
    {
        //Inicio das funções do Tema. Não mexa aqui.
        if (!logged_in()) {
            return redirect()->to(base_url(route_to('login')));
        } //verifica se esta logado!
        $data = $this->tema();
        //Fim das funções do Tema
        //Inicio Funções do Tema que precisam ser editadas
        $data['title'] = lang('App.Configuracao.bancos');
        //Fim das Funções editáveis do Tema
        $elementoPagina = new ElementosdePagina;
        $RubricaModel = new RubricaModel();
        $data['rubricas'] = $RubricaModel
            ->orderBy('cod_rubrica', 'ASC')
            ->findAll();
        $data['pai'] = $elementoPagina->comboRubrica('all', 'pai');
        return view('configuracao/rubrica', $data);
    }


    public function salvarrubrica()
    {
        if (!logged_in()) {
            return redirect()->to(base_url(route_to('login')));
        }
        $RubricaModel = new RubricaModel();
        $data = [
            'rubrica' => $this->request->getVar('rubrica'),
            'elemento' => $this->request->getVar('elemento'),
            'cod_rubrica' => $this->request->getVar('cod_rubrica'),
            'pai' => $this->request->getVar('pai'),
        ];
        $RubricaModel->insert($data);
        return $this->response->redirect(site_url('configuracao/rubrica'));
    }


    public function deleterubrica($id = null)
    {
        if (!logged_in()) {
            return redirect()->to(base_url(route_to('login')));
        }
        $RubricaModel = new RubricaModel();
        $data = $RubricaModel->where('rubrica_id', $id)->delete($id);
        return $this->response->redirect(site_url('configuracao/rubrica'));
    }


    public function ajax_editar_rubrica($id)
    {
        $RubricaModel = new RubricaModel();
        $data = $RubricaModel->where('rubrica_id', $id)->first();
        return $this->response->setJSON($data);;
    }


    public function editarrubrica($id)
    {
        if (!logged_in()) {
            return redirect()->to(base_url(route_to('login')));
        }
        $RubricaModel = new RubricaModel();
        $id = $this->request->getVar('rubrica_id');
        $data = [
            'rubrica' => $this->request->getVar('rubrica'),
            'elemento' => $this->request->getVar('elemento'),
            'cod_rubrica' => $this->request->getVar('cod_rubrica'),
            'pai' => $this->request->getVar('pai'),
        ];
        $RubricaModel->update($id, $data);
        return $this->response->redirect(site_url('configuracao/rubrica'));
    }
    //Fim da configuração do Plano de Contas


    //inicio da configuração dos bancos 

    public function bancos()
    {
        //Inicio das funções do Tema. Não mexa aqui.
        if (!logged_in()) {
            return redirect()->to(base_url(route_to('login')));
        } //verifica se esta logado!
        $data = $this->tema();
        //Fim das funções do Tema
        //Inicio Funções do Tema que precisam ser editadas
        $data['title'] = lang('App.Configuracao.bancos');
        //Fim das Funções editáveis do Tema
        $BancosModel = new BancoModel();
        $data['bancos'] = $BancosModel
            ->orderBy('banco', 'ASC')
            ->findAll();
        return view('configuracao/bancos', $data);
    }


    public function salvarbanco()
    {
        if (!logged_in()) {
            return redirect()->to(base_url(route_to('login')));
        }
        $BancosModel = new BancoModel();
        $presaldo = $this->request->getVar('saldo_inicial');
        $saldoinicial = str_replace(',', '.', str_replace('.', '', $presaldo));
        $data = [
            'banco' => $this->request->getVar('banco'),
            'agencia' => $this->request->getVar('agencia'),
            'conta' => $this->request->getVar('conta'),
            'saldo_inicial' =>  $saldoinicial,
        ];
        $BancosModel->insert($data);
        return $this->response->redirect(site_url('configuracao/bancos'));
    }


    public function deletebanco($id = null)
    {
        if (!logged_in()) {
            return redirect()->to(base_url(route_to('login')));
        }
        $BancosModel = new BancoModel();
        $data['cliente'] = $BancosModel->where('banco_id', $id)->delete($id);
        return $this->response->redirect(site_url('configuracao/bancos'));
    }


    public function ajax_editar_banco($id)
    {
        $BancoModel = new BancoModel();
        $data = $BancoModel->where('banco_id', $id)->first();
        echo json_encode($data);
    }


    public function editarbanco($id)
    {
        if (!logged_in()) {
            return redirect()->to(base_url(route_to('login')));
        }
        $BancosModel = new BancoModel();
        $id = $this->request->getVar('banco_id');
        $presaldo = $this->request->getVar('saldo_inicial');
        $saldoinicial = str_replace(',', '.', str_replace('.', '', $presaldo));
        $data = [
            'banco_id' => $id,
            'banco' => $this->request->getVar('banco'),
            'agencia' => $this->request->getVar('agencia'),
            'conta' => $this->request->getVar('conta'),
            'saldo_inicial' =>  $saldoinicial,
        ];
        $BancosModel->update($id, $data);
        return $this->response->redirect(site_url('configuracao/bancos'));
    }

    //Fim da configuração dos Banco


    //inicio da configuração do Tipo da Despesa 

    public function tipodadespesa()
    {
        //Inicio das funções do Tema. Não mexa aqui.
        if (!logged_in()) {
            return redirect()->to(base_url(route_to('login')));
        } //verifica se esta logado!
        $data = $this->tema();
        //Fim das funções do Tema
        //Inicio Funções do Tema que precisam ser editadas
        $data['title'] = lang('App.Configuracao.tipodadespesa');
        //Fim das Funções editáveis do Tema
        $TipodadespesaModel = new TipodadespesaModel();
        $data['tipo_despesas'] = $TipodadespesaModel
            ->orderBy('tipo_despesa', 'ASC')
            ->findAll();
        return view('configuracao/tipodadespesa', $data);
    }


    public function salvartipodedespesa()
    {
        if (!logged_in()) {
            return redirect()->to(base_url(route_to('login')));
        }
        $TipodadespesaModel = new TipodadespesaModel();
        $data = [
            'tipo_despesa' => $this->request->getVar('tipo_despesa'),
        ];
        $TipodadespesaModel->insert($data);
        return $this->response->redirect(site_url('configuracao/tipodadespesa'));
    }


    public function deletetipodedespesa($id = null)
    {
        if (!logged_in()) {
            return redirect()->to(base_url(route_to('login')));
        }
        $TipodadespesaModel = new TipodadespesaModel();
        $data['cliente'] = $TipodadespesaModel->where('tipo_despesa_id', $id)->delete($id);
        return $this->response->redirect(site_url('configuracao/tipodadespesa'));
    }


    public function ajax_editar_tipo_despesa($id)
    {
        $TipodadespesaModel = new TipodadespesaModel();
        $data = $TipodadespesaModel->where('tipo_despesa_id', $id)->first();
        echo json_encode($data);
    }


    public function editartipodadespesa($id)
    {
        if (!logged_in()) {
            return redirect()->to(base_url(route_to('login')));
        }
        $TipodadespesaModel = new TipodadespesaModel();
        $id = $this->request->getVar('tipo_despesa_id ');
        $data = [
            'tipo_despesa' => $this->request->getVar('tipo_despesa'),
        ];
        $TipodadespesaModel->update($id, $data);
        return $this->response->redirect(site_url('configuracao/tipodadespesa'));
    }
}
