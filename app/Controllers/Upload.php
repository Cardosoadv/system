<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class Upload extends BaseController
{

    // Exibir lista de clientes
    public function upload()
    {
        $import = $_FILES['import'];
        if ($import['type']==="text/csv"){
            $valuesImport = fopen($import['tmp_name'], "r");

            while($linha = fgetcsv($valuesImport, 1000, ",")){
                $data['dataVencimento'] = $linha[0];
                $data['dataPagamento'] = $linha[1];
                $data['despesa'] = mb_convert_encoding($linha[2], "UTF-8");
                $data['valor'] =  $linha[3];
                $data['rateio'] = $linha[5];

                echo "<pre>";
                print_r($data);
                
            }

 

        }else{
            $_SESSION['msg'] = "O arquivo enviado não é CSV!";

        }



        var_dump($import);
    }

}    