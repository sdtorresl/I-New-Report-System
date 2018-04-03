<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;

class PortingTable extends Table
{

    public function initialize(array $config)
    {
        $this->table('prov_sdr');
        $this->entityClass('App\Model\Entity\Porting');
    }

    public static function defaultConnectionName() {
        return 'xdr';
    }

}