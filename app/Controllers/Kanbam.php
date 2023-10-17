<?php
namespace App\Controllers;

use App\Models\MensagensModel;

class Kanbam extends BaseController
{
    public function index()
    {
        $data = $this->tema();
        $advogado = user_id();
        $data['title'] = lang('App.Kamban');

        



        return view('kanbam', $data);
        
    }
}

