<?php

namespace App\Controllers;

use App\Models\BancoModel;

class Home extends BaseController
{
    public function index()
    {
 
        return $this->response->redirect(site_url('dashboard'));
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
