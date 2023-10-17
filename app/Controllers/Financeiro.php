<?php

namespace App\Controllers;

use App\Models\BancoModel;
use App\Models\TransferenciasModel;

class Financeiro extends BaseController
{
    public function index()
    {
 
        return $this->response->redirect(site_url('dashboard'));
    }
    public function transferencias(){
          //Inicio das funções do Tema. Não mexa aqui.
          if (!logged_in()) {
            return redirect()->to(base_url(route_to('login')));
        } //verifica se esta logado!
        $data = $this->tema();
        //Fim das funções do Tema
        //Inicio Funções do Tema que precisam ser editadas
        $data['title'] = lang('App.Contratos.consultarDetalhes');
        $transferenciasModel = new TransferenciasModel();
        $data['transferencias'] = $transferenciasModel
        ->orderBy('data', 'ASC')
            ->findAll();
        $elementosPagina = new ElementosdePagina();
        $data['origem'] = $elementosPagina->comboBanco('origem');
        $data['destino'] = $elementosPagina->comboBanco('destino');    
        //Fim das Funções editáveis do Tema
        return view('transferencias', $data);
    }

    public function salvartransferencia()
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        }
        $TransferenciasModel = new TransferenciasModel();
        $prevalor = $this->request->getVar('valor');
        $valor = str_replace(',', '.', str_replace('.', '', $prevalor));
        helper('customDate');
        $data = [
            'descricao' => $this->request->getVar('descricao'),
            'data' => novaData($this->request->getVar('data')),
            'origem' => $this->request->getVar('origem'),
            'destino' => $this->request->getVar('destino'),
            'valor' =>  $valor,
        ];
        $TransferenciasModel->insert($data);
       return $this->response->redirect(site_url('financeiro/transferencias'));
    }


    public function ajax_editar_transferencia($id)
    {
        $TransferenciasModel = new TransferenciasModel();
        $data = $TransferenciasModel->where('transf_id', $id)->first();
        return $this->response->setJSON($data);
    }

    public function editartransferencia($id)
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        }
        $TransferenciasModel = new TransferenciasModel();
        $prevalor = $this->request->getVar('valor');
        $valor = str_replace(',', '.', str_replace('.', '', $prevalor));
        helper('customDate');
        $data = [
            'descricao' => $this->request->getVar('descricao'),
            'data' => novaData($this->request->getVar('data')),
            'origem' => $this->request->getVar('origem'),
            'destino' => $this->request->getVar('destino'),
            'valor' =>  $valor,
        ];
       $TransferenciasModel->update($id, $data);
       return $this->response->redirect(site_url('financeiro/transferencias'));
    }

    public function teste(){
        $BancoModels = new BancoModel();
        $bancoOrigem = $BancoModels->getBanco(3)['banco'];
        echo '<pre>';
        print_r($bancoOrigem);

    }

    


    public function exibir($caminho,$arquivo)
    {
        if (!logged_in()) {
        return redirect()->to(base_url(route_to('login')));
        }
        $file = WRITEPATH . 'uploads/'.$caminho.'/'.$arquivo;
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
