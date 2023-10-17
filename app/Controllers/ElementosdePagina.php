<?php
/*
*Este controle guardara os Elementos de página para serem reaproveitados
*/

namespace App\Controllers;

use App\Models\AdvogadosModel;
use App\Models\BancoModel;
use App\Models\ClientesModel;
use App\Models\ContratosModel;
use App\Models\RubricaModel;
use App\Models\TipodadespesaModel;

class ElementosdePagina extends BaseController
{
    //cria combo de Rubricas
    public function comboRubrica($elemento = 'all', $nome = 'rubrica')
    {

        $RubricaModel = new RubricaModel();
        helper('form');
        if ($elemento == "all") {
            $a_rubricas = $RubricaModel
                ->findAll();
            $arrayRubrica = ["Selecione a rubrica"];
            foreach ($a_rubricas as $a_rubrica) {
                $arrayRubrica[$a_rubrica['rubrica_id']] = $a_rubrica['cod_rubrica'] . " - " . $a_rubrica['rubrica'];
            }
            return $data['rubrica'] = form_dropdown($nome, $arrayRubrica, '', 'placeholder="rubrica" class="form-control select2"');
        } else {
            $a_rubricas = $RubricaModel
                ->where('elemento', $elemento)
                ->findAll();
            $arrayRubrica = ["Selecione a rubrica"];
            foreach ($a_rubricas as $a_rubrica) {
                $arrayRubrica[$a_rubrica['rubrica_id']] = $a_rubrica['cod_rubrica'] . " - " . $a_rubrica['rubrica'];
            }

            return $data['rubrica'] = form_dropdown($nome, $arrayRubrica, '', 'placeholder="rubrica" class="form-control select2"');
        }
    }

    //Criação do combo de bancos
    public function comboBanco($nome = 'bancos')
    {
        $BancoModel = new BancoModel();
        $data['bancos'] = $BancoModel
            ->orderBy('banco', 'ASC')
            ->findAll();
        helper('form');
        $a_bancos = $BancoModel
            ->findAll();
        $arrayBancos = ["Selecione o banco"];
        foreach ($a_bancos as $a_banco) {
            $arrayBanco[$a_banco['banco_id']] = $a_banco['banco'];
        }
        return $data['bancos'] = form_dropdown($nome, $arrayBanco, '', 'placeholder="banco" class="form-control select2"');
    }

    //Cria o Combo de Clientes para ser usado por todo o sistema
    public function comboClientes($nome = 'cliente_id')
    {
        $ClientesModel = new ClientesModel();
        $clientes = $ClientesModel->findAll();
        helper('form');
        $arrayClientes = ["Selecione o Cliente"];
        foreach ($clientes as $cliente) {
            $arrayClientes[$cliente['id']] = $cliente['username'];
        }
        return $data['comboClientes'] = form_dropdown($nome, $arrayClientes, '', 'class="form-control" style="width: 100%;"');
    }


    public function comboContratos($nome = 'contrato_id')
    {
        $ContratosModel = new ContratosModel();
        $contratos = $ContratosModel->findAll();
        helper('form');
        $arrayContratos = ["Selecione o Contrato"];
        foreach ($contratos as $contrato) {
            $arrayContratos[$contrato['cont_id']] = $contrato['contrato'];
        }
        return $data['contratos'] = form_dropdown($nome, $arrayContratos, '', 'id="contratos" class="form-control" style="width: 100%;"');
    }

    public function comboAdvogados($nome = 'responsavel[]')
    {
        helper('form');
        $AdvogadosModel = new AdvogadosModel();
        $responsaveis = $AdvogadosModel
            ->listar_advogados()
            ->getResultArray();
        $arrayResponsaveis = [];
        foreach ($responsaveis as $responsavel) {
            $arrayResponsaveis[$responsavel['id']] = $responsavel['username'];
        }
        return $data['Responsaveis'] = form_dropdown($nome, $arrayResponsaveis, '', ' multiple="multiple" class="form-control" style="width: 100%" id="responsavel"');
    }

    public function comboTipodeDespesa($nome = 'id_tipo_despesa')
    {
        helper('form');
        $TipodadespesaModel = new TipodadespesaModel();
        $tipo_despesas = $TipodadespesaModel->findAll();
        $arrayTipo_despesa = [];
        foreach ($tipo_despesas as $tipo_despesa) {
            $arrayTipo_despesa[$tipo_despesa['tipo_despesa_id']] = $tipo_despesa['tipo_despesa'];
        }
        return $data['id_tipo_despesa'] = form_dropdown('id_tipo_despesa', $arrayTipo_despesa, '', 'class="form-control"');
    }
}
