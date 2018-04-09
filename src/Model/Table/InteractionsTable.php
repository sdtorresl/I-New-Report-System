<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;

class InteractionsTable extends Table
{

    public function initialize(array $config)
    {
        $this->table('tbm_agent_interaction');
        $this->entityClass('App\Model\Entity\Interaction');

        $this->belongsTo('Agents')
            ->setForeignKey('userId')
            ->setProperty('userId');
    }

    public static function defaultConnectionName() {
        return 'contact_center';
    }

}