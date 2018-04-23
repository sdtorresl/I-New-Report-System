<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ReconciliationsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        if ($this->request->is('post')) {
            $msisdn = $this->request->getData('msisdn');
            $datetime = $this->request->getData('datetime');
            $transactionID = $this->request->getData('transactionID');

            if (isset($msisdn) && isset($datetime) && isset($transactionID)) {
                $query->where([
                    'OR' => [
                        'lower(agentName) like' => '%' . $search .'%',
                        'userId =' => $search
                    ]
                ]);

                $this->set('msisdn', $msisdn);
                $this->set('datetime', $datetime);
                $this->set('transactionID', $transactionID);
            } else {
                $this->Flash->error(__('Complete all fields'));
            }
        }
    }
}