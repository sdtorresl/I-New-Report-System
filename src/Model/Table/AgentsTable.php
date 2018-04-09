<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;

class AgentsTable extends Table
{

    public function initialize(array $config)
    {
        $this->table('tbm_agent');
        $this->entityClass('App\Model\Entity\Agent');

        $this->hasMany('Interactions')
            ->setForeignKey('userId')
            ->setBindingKey('userId');
    }

    public static function defaultConnectionName() {
        return 'contact_center';
    }

}