<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DespesasModel;
use App\Models\FaturasModel;

class Upload extends BaseController
{

    // Exibir lista de clientes
    public function despesas()
    {

        $import = $_FILES['import'];
        if ($import['type'] === "text/csv") {
            $valuesImport = fopen($import['tmp_name'], "r");
            helper('customDate');
            $i = 0;
            while ($linha = fgetcsv($valuesImport, 1000, ",")) {

                if ($i > 0) {
                    $preValor = str_replace(',', '.', str_replace('.', '', $linha[3]));
                    $data = [
                        'data_vencimento' => importData($linha[0]),
                        'data_pagamento' => importData($linha[1]),
                        'despesa' => mb_convert_encoding($linha[2], "UTF-8"),
                        'valor' =>  str_replace("-R$", "", $preValor),
                        'rateio' => $linha[5]
                    ];
                    if ($data['data_pagamento'] == null) {
                        $data['data_pagamento'] = '0000-00-00';
                    }
                    $DespesasModel = new DespesasModel();
                    $DespesasModel->insert($data);
                }
                $i++;
            }
            return $this->response->redirect(site_url('despesas'));
        } else {
            $_SESSION['msg'] = "O arquivo enviado não é CSV!";
        }
    }

    public function receitas()
    {

        $import = $_FILES['import'];
        if ($import['type'] === "text/csv") {
            $valuesImport = fopen($import['tmp_name'], "r");
            helper('customDate');
            $i = 0;
            while ($linha = fgetcsv($valuesImport, 1000, ",")) {
                if ($i > 0) {
                    $preValor = str_replace(',', '.', str_replace('.', '', $linha[3]));
                    $data = [
                        'descricao' => mb_convert_encoding($linha[2], "UTF-8"),
                        'banco_id' => 1,
                        'rateio' => $linha[5],
                        'fat_emissao'  => importData($linha[0]),
                        'fat_vencimento' => importData($linha[1]),
                        'fat_valor'  => str_replace("R$", "", $preValor),
                    ];
                    $FaturasModel = new FaturasModel();
                    $FaturasModel->insert($data);

                    $i++;
                } else {
                    $_SESSION['msg'] = "O arquivo enviado não é CSV!";
                }
            }
        }
    }
}
