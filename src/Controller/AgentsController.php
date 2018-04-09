<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class AgentsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        
        $query = $this->Agents->find()->contain(['Interactions']);

        if ($this->request->is('post')) {
            $search = $this->request->getData('search');

            if (isset($search)) {
                $query->where([
                    'OR' => [
                        'lower(agentName) like' => '%' . $search .'%',
                        'userId =' => $search
                    ]
                ]);

                $this->set('search', $search);
            }
        }

        $this->loadComponent('Paginator');
        $agents = $this->Paginator
            ->paginate($query);
 
        $this->set('agents', $agents);
    }

    public function unstock($userId)
    {
        $this->autoRender = false;

        $agent = $this->Agents->find()->where(['userId' => $userId]);

        if ($agent) {
            $query = $this->Agents->query();
            $query->update()
                ->set(['agentState' => 'LOGGED_OFF'])
                ->where(['userId' => $userId])
                ->execute();

            $interactions = TableRegistry::get('Interactions');
            $query = $interactions->query();
            $query->delete()
                ->where(['userId' => $userId])
                ->execute();

            $response = json_encode(['result' => 'success', 'data' => $agent]);
        }
        else {
            $response = json_encode(['result' => 'error']);
        }

        $this->response->type('json');
        $this->response->body($response);

        return $this->response;
    }

    public function releaseAgent($userId)
    {
        $agent = $this->Agents->find()->where(['userId' => $userId]);

        if ($agent) {
            $query = $this->Agents->query();
            $query->update()
                ->set(['agentState' => 'LOGGED_OFF'])
                ->where(['userId' => $userId])
                ->execute();

            $interactions = TableRegistry::get('Interactions');
            $query = $interactions->query();
            $query->delete()
                ->where(['userId' => $userId])
                ->execute();

            $response = json_encode(['result' => 'success', 'data' => $agent]);
        }
        else {
            $response = json_encode(['result' => 'error']);
        }

        // $this->response->type('json');
        // $this->response->body($response);

        // return $this->response;
        $this->set('agent', $agent);
    }
}