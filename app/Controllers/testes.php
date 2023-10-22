<?php
/*
*Este controle realiza as operações de para exibição do Painel.
*Controle já ajustado ao novo formato.
*To-do
*Este controle ainda esta incompleto.

@ Autor:    Cardoso
@ Data:     05/05/2022
@ Versão:   0.0.1

*/

namespace App\Controllers;

use App\Models\AdvogadosModel;
use App\Models\BancoModel;


class Testes extends BaseController
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
        $data['title'] = lang('App.Dashboard.title');
        //Fim das Funções editáveis do Tema
        //widget saldo inicio
        $BancosModel = new BancoModel();

        $data['saldo_inicial'] = $BancosModel->saldo_inicial(1);
        $data['pagamentos'] = $BancosModel->get_pagamentos(1);
        $data['despesas'] = $BancosModel->get_despesas(1);
        helper('form');
        $atributes = ['name'=>'import','id'=>'import'];
        $data['form']=form_open_multipart(site_url('upload/upload'),$atributes);


        //widget saldo fim

        return view('testes', $data);
    }

    public function ajax_advogados()
    {
         
        $AdvogadosModel = new AdvogadosModel();
        $advogados = $AdvogadosModel
            ->selecionar_advogado()
            ->getResultArray();
        echo json_encode($advogados);
        /*
        $advogados = [
            1 => "Fabiano",
            2 => "Cardoso",
            3 => "Thaty"
        ];*/
        echo json_encode($advogados);

    }





    

}
