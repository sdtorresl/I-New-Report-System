<?php
namespace App\Controller;

use App\Controller\AppController;

class PortingController extends AppController
{
    public function index()
    {       
        if ($this->request->is('get') && isset($_GET['startDate']) && isset($_GET['endDate'])) {
            $startDate = $_GET["startDate"];
            $endDate = $_GET["endDate"];    
        }
        
        if (isset($startDate) && isset($endDate)) {

            if ($startDate != '' && $endDate != '') {
                // $tickets = $this->Porting->find()
                //  ->where([
                //      'operation IN' => ['PortIn', 'PortOut'],
                //      'tickettimestamp >=' => $startDate . ' 00:00:00',
                //      'tickettimestamp <=' => $endDate . ' 23:59:59',
                //      'resultcode IN' => ['OK','FAILED','CANCELED']
                //  ]);

                $summary = $this->Porting->find();
                $summary->where([
                        'operation IN' => ['PortIn', 'PortOut'],
                        'tickettimestamp >=' => $startDate . ' 00:00:00',
                        'tickettimestamp <=' => $endDate . ' 23:59:59',
                        'resultcode IN' => ['OK','FAILED','CANCELED']
                    ])
                    ->select([
                        'count' => $summary->func()->count('operation'),
                        'operation'
                    ])
                    ->group('operation');

                $summaryByRecipientCarrier = $this->Porting->find();
                $summaryByRecipientCarrier
                    ->select([
                        'recipientcarrier',
                        'count' => $summaryByRecipientCarrier->func()->count('recipientcarrier')
                    ])
                    ->where([
                        'operation =' => 'PortOut',
                        'tickettimestamp >=' => $startDate . ' 00:00:00',
                        'tickettimestamp <=' => $endDate . ' 23:59:59',
                        'resultcode IN' => ['OK','FAILED','CANCELED'],
                    ])
                    ->group('recipientcarrier');

                $summaryByDonorCarrier = $this->Porting->find();
                $summaryByDonorCarrier
                    ->select([
                        'donorcarrier',
                        'count' => $summaryByDonorCarrier->func()->count('donorcarrier')
                    ])
                    ->where([
                        'operation =' => 'PortIn',
                        'tickettimestamp >=' => $startDate . ' 00:00:00',
                        'tickettimestamp <=' => $endDate . ' 23:59:59',
                        'resultcode IN' => ['OK','FAILED','CANCELED'],
                    ])
                    ->group('donorcarrier');

                $this->set('summary', $summary);
                $this->set('summaryByDonorCarrier', $summaryByDonorCarrier);
                $this->set('summaryByRecipientCarrier', $summaryByRecipientCarrier);
                $this->set('startDate', $startDate);
                $this->set('endDate', $endDate);
                // $this->set('tickets', $tickets);
            }
        }
    }

    public function portin()
    {
        if ($this->request->is('get') && isset($_GET['startDate']) && isset($_GET['endDate'])) {
            $startDate = $_GET["startDate"];
            $endDate = $_GET["endDate"];    
        }
        
        if (isset($startDate) && isset($endDate)) {

            if ($startDate != '' && $endDate != '') {
                $query = $this->Porting->find()
                    ->where([
                        'operation =' => 'PortIn',
                        'tickettimestamp >=' => $startDate . ' 00:00:00',
                        'tickettimestamp <=' => $endDate . ' 23:59:59',
                        'resultcode IN' => ['OK','FAILED','CANCELED']
                    ]);
                
                $this->loadComponent('Paginator');
                $tickets = $this->Paginator->paginate($query);

                $this->set('startDate', $startDate);
                $this->set('endDate', $endDate);
                $this->set('tickets', $tickets);
            }
        }
    }

    public function portout()
    {
        if ($this->request->is('get') && isset($_GET['startDate']) && isset($_GET['endDate'])) {
            $startDate = $_GET["startDate"];
            $endDate = $_GET["endDate"];    
        }
        
        if (isset($startDate) && isset($endDate)) {

            if ($startDate != '' && $endDate != '') {
                $query = $this->Porting->find()
                    ->where([
                        'operation =' => 'PortOut',
                        'tickettimestamp >=' => $startDate . ' 00:00:00',
                        'tickettimestamp <=' => $endDate . ' 23:59:59',
                        'resultcode IN' => ['OK','FAILED','CANCELED']
                    ]);
                
                $this->loadComponent('Paginator');
                $tickets = $this->Paginator->paginate($query);

                $this->set('startDate', $startDate);
                $this->set('endDate', $endDate);
                $this->set('tickets', $tickets);
            }
        }
    }

    // public function print() {
    //  if (isset($_POST['data']) && isset($_POST['options'])) {
          //   $data = $_POST['data'];
          //   $options = $_POST['options'];
            
          //   $this->viewBuilder()->options([
       //          'pdfConfig' => [
       //              'orientation' => 'portrait',
       //              'filename' => $options->filename,
       //              'title' => $options->title
       //          ]
       //      ]);

       //      $this->set('options', $options);
       //      $this->set('data', $data);
    //  }
    // }

    public function print() {

        $opt = [
            'title' => 'Hola',
            'filename' => 'archivo.pdf',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum assumenda, deleniti voluptates quam quis. Dolore nam aperiam ipsum quibusdam impedit recusandae laudantium soluta omnis ullam maxime delectus, laborum nemo eius!',
            'headers' => ['title', 'name', 'value']
        ];

        $data = [
            ['ID1', 'ID2', 'ID3'],
            [1,2,3]
        ];

        // $this->viewBuilder()->options([
        //     'pdfConfig' => [
        //         'orientation' => 'portrait',
        //         'filename' => $opt['filename'],
        //         'title' => $opt['title']
        //     ]
        // ]);

        $this->set('options', $opt);
        $this->set('data', $data);
    
    }
}