<?php
namespace App\Controller;

use App\Controller\AppController;

class PortingController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->allowedDays = 62;
        $this->allowedDaysPDF = 5;
    }

    public function index()
    {       
        if ($this->request->is('get') && isset($_GET['startDate']) && isset($_GET['endDate'])) {
            $startDate = $_GET["startDate"];
            $endDate = $_GET["endDate"];
            $this->set('startDate', $startDate);
            $this->set('endDate', $endDate);

            $diff = date_diff(date_create($endDate), date_create($startDate));          
            if ($diff->days > $this->allowedDays) {
                $this->Flash->error('The maximum allowed range is ' . $this->allowedDays . ' days, you have selected ' . $diff->days);
                return;
            }
            if ($diff->invert == 0) {
                $this->Flash->error('Start date must be before end date');
                return;
            }

            $tickets = $this->Porting->find();
            $tickets->select([
                    'date' => "TO_CHAR(tickettimestamp, 'YY-MM-DD')",
                    'portin' => $tickets->func()->sum("CASE WHEN operation = 'PortIn' THEN 1 ELSE 0 END"),
                    'portout' => $tickets->func()->sum("CASE WHEN operation = 'PortOut' THEN 1 ELSE 0 END"),
                ])
                ->where([
                    'operation IN' => ['PortOut', 'PortIn'],
                    'tickettimestamp >=' => $startDate . ' 00:00:00',
                    'tickettimestamp <=' => $endDate . ' 23:59:59',
                    'resultcode IN' => ['OK','FAILED','CANCELED']
                ])
                ->group(['1'])
                ->order('date');

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

            $this->set('tickets', $tickets);
            $this->set('summary', $summary);
            $this->set('summaryByDonorCarrier', $summaryByDonorCarrier);
            $this->set('summaryByRecipientCarrier', $summaryByRecipientCarrier);
        }
    }

    public function portin()
    {
        if ($this->request->is('get') && isset($_GET['startDate']) && isset($_GET['endDate'])) {
            $startDate = $_GET["startDate"];
            $endDate = $_GET["endDate"];
            $this->set('startDate', $startDate);
            $this->set('endDate', $endDate);
        
            $diff = date_diff(date_create($endDate), date_create($startDate));
            if ($diff->days > $this->allowedDays) {
                $this->Flash->error('The maximum allowed range is ' . $this->allowedDays . ' days, you have selected ' . $diff->days);
                return;
            }
            if ($diff->invert == 0) {
                $this->Flash->error('Start date must be before end date');
                return;
            }

            $query = $this->Porting->find()
                ->where([
                    'operation =' => 'PortIn',
                    'tickettimestamp >=' => $startDate . ' 00:00:00',
                    'tickettimestamp <=' => $endDate . ' 23:59:59',
                    'resultcode IN' => ['OK','FAILED','CANCELED']
                ]);
            
            $this->loadComponent('Paginator');
            $tickets = $this->Paginator->paginate($query);

            $this->set('tickets', $tickets);
        }
    }

    public function portout()
    {
        if ($this->request->is('get') && isset($_GET['startDate']) && isset($_GET['endDate'])) {
            $startDate = $_GET["startDate"];
            $endDate = $_GET["endDate"];  
            $this->set('startDate', $startDate);
            $this->set('endDate', $endDate);
        
            $diff = date_diff(date_create($endDate), date_create($startDate));
            if ($diff->days > $this->allowedDays) {
                $this->Flash->error('The maximum allowed range is ' . $this->allowedDays . ' days, you have selected ' . $diff->days);
                return;
            }
            if ($diff->invert == 0) {
                $this->Flash->error('Start date must be before end date');
                return;
            }

            $query = $this->Porting->find()
                ->where([
                    'operation =' => 'PortOut',
                    'tickettimestamp >=' => $startDate . ' 00:00:00',
                    'tickettimestamp <=' => $endDate . ' 23:59:59',
                    'resultcode IN' => ['OK','FAILED','CANCELED']
                ]);
            
            $pdf = $this->request->getQuery('pdf') ? true : false;
            $csv = $this->request->getQuery('csv') ? true : false;
            if ($pdf || $csv) {

                // Check allowed dates
                $diff = date_diff(date_create($endDate), date_create($startDate));
                if ($diff->days > $this->allowedDaysPDF) {
                    $this->Flash->error('The maximum allowed range for PDF is ' . $this->allowedDaysPDF . ' days, you have selected ' . $diff->days);
                    return;
                }
                
                // Generate PDF
                if ($pdf) {
                    $options = [
                        'title' => 'Reporte de Port Out',
                        'filename' => 'portouts.pdf',
                        'description' => 'Portabilidades desde ' . $startDate . ' hasta ' . $endDate,
                        'headers' => ['MSISDN', 'Nuevo MSISDN', 'Fecha', 'Operaror', 'Resultado']
                    ];

                    $this->viewBuilder()->options([
                        'pdfConfig' => [
                            'orientation' => 'portrait',
                            'filename' => $options['filename'],
                            'title' => $options['title']
                        ]
                    ]);

                    $this->set('options', $options);
                    $this->set('tickets', $query);

                    $this->RequestHandler->renderAs($this, 'pdf', ['attachment' => 'filename.pdf']);
                } else {
                    // Generate CSV
                }
            }
            else {
                $this->loadComponent('Paginator');
                $tickets = $this->Paginator->paginate($query);

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

    public function print($data) {
        $opt = [
            'title' => 'Hola',
            'filename' => 'archivo.pdf',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum assumenda, deleniti voluptates quam quis. Dolore nam aperiam ipsum quibusdam impedit recusandae laudantium soluta omnis ullam maxime delectus, laborum nemo eius!',
            'headers' => ['title', 'name', 'value']
        ];

        $this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => $opt['filename'],
                'title' => $opt['title']
            ]
        ]);

        $this->set('options', $opt);
        $this->set('printable', $data);

        $this->RequestHandler->renderAs($this, 'pdf', ['attachment' => 'filename.pdf']);
    }
}