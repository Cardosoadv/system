<?php

namespace App\Controllers;

use App\Models\DespesasModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\MensagensModel;
use App\Models\TasksModel;
use App\Models\UserDataModel;
use CodeIgniter\I18n\Time;
use DateTime;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['auth'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }

    /**
     * Eu comecei a fuçar aqui.
     * 
     */

    protected function novaData($data)
    {
        $novaData = date_format(new DateTime($data), 'Y-m-d');
        return $novaData;
    } 
 
    protected function tema()
    {
       
        $userid = user_id();
        $MensagensModel = new MensagensModel();
        $data['mrnl'] = $MensagensModel->mrnl($userid)->getResultArray();
        $data['num'] = count($data['mrnl']);
        $data['username'] = user()->username;
        $hoje = Time::today();
        $data['hoje']=$hoje;
        $weekforNow = $hoje->addDays(7);

        $DespesasModel = new DespesasModel();
        $data['notificacaoDespesas'] = $DespesasModel
        ->vencendo($weekforNow);

        $TasksModel = new TasksModel();
        $data['notificacaoTarefas']= $TasksModel
        ->vencendo($userid,$weekforNow);

        $UserDataModel = new UserDataModel();
        $data['user_data']=$UserDataModel
        ->get_dados($userid)
        ->getResultArray();
 
        $TaskModel = new TasksModel();
        $num_tarefas=$TaskModel
        ->num_tarefas($hoje)
        ->getResultArray();
        $data['num_tarefas']=count($num_tarefas);
        return $data;

    }


}
