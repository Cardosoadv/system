<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientesModel;


class Clientes extends BaseController
{

    // Exibir lista de clientes
    public function index()
    {
        //Inicio das funções do Tema. Não mexa aqui.
        if (!logged_in()) {
            return redirect()->to(base_url(route_to('login')));
        } //verifica se esta logado!
        $data = $this->tema();
        //Fim das funções do Tema

        //Inicio Funções do Tema que precisam ser editadas
        $data['title'] = lang('App.Clientes.title');
        //Fim das Funções editáveis do Tema

        $ClientesModel = new ClientesModel();
        $data['clientes'] = $ClientesModel
            ->get_clientes();

        return  view('clientes/clientes', $data);
    }

    public function adicionar()
    {
        $ClientesModel = new ClientesModel();
        $nome  =  $this->request->getPost('nome');
        $img   =  $this->request->getFile('img');
        $cpf   =  $this->request->getPost('cpf');
        $cnpj  =  $this->request->getPost('cnpj');
        $telefone =  $this->request->getPost('telefone');
        $data_nascimento    = $this->novaData($this->request->getPost('data_nascimento'));
        $username  =  $this->request->getPost('username');
        $email  =  $this->request->getPost('email');
        if ($cpf != NULL) {
            $cpf_cnpj = $cpf;
        } else {
            $cpf_cnpj = $cnpj;
        };

        $ClientesModel->inserir($username, $email, $nome, $cpf_cnpj, $data_nascimento, $telefone, $img);
        return $this->response->redirect(site_url('clientes'));
    }
 
    public function ajax_editar_cliente($id)
    {
        $ClientesModel = new ClientesModel();
        $data = $ClientesModel->clientes($id)->getFirstRow();
               return $this->response->setJSON($data);
    }

    public function editar($id){

        $ClientesModel = new ClientesModel();
        $id  =  $this->request->getPost('id');
        $nome  =  $this->request->getPost('nome');
        $img   =  $this->request->getFile('img');
        $cpf   =  $this->request->getPost('cpf');
        $cnpj  =  $this->request->getPost('cnpj');
        $telefone =  $this->request->getPost('telefone');
        $data_nascimento    = $this->novaData($this->request->getPost('data_nascimento'));
        $username  =  $this->request->getPost('username');
        $email  =  $this->request->getPost('email');
        if ($cpf != NULL) {
            $cpf_cnpj = $cpf;
        } else {
            $cpf_cnpj = $cnpj;
        };
        $ClientesModel->editar($id,$username, $email, $nome, $cpf_cnpj, $data_nascimento, $telefone, $img);

 return $this->response->redirect(site_url('clientes'));
    }





}
