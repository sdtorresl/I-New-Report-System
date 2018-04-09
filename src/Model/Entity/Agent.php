<?php 
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Agent extends Entity
{
    protected $_accessible = [
		'id' => true,
		'userId' => true,
		'customerId' => true,
		'extension' => true,
		'agentName' => true,
		'agentState' => true,
		'totalLoad' => true,
		'availableMsec' => true,
		'pauseRequest' => true,
		'stampDtm' => true,
		'stampMsec' => true,
		'stateChgMemId' => true
    ];
}