<?php 
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Porting extends Entity
{
    protected $_accessible = [
		'id' => true,
		'recordversion' => true,
		'tickettypeid' => true,
		'providerid' => true,
		'nodeid' => true,
		'tickettimestamp' => true,
		'sessioncreationtimestamp' => true,
		'sessionid' => true,
		'operation' => true,
		'donorid' => true,
		'donorcarrier' => true,
		'recipientid' => true,
		'recipientcarrier' => true,
		'oldmsisdn' => true,
		'oldimsi' => true,
		'oldiccid' => true,
		'oldimei' => true,
		'newmsisdn' => true,
		'newimsi' => true,
		'newiccid' => true,
		'newimei' => true,
		'pin1' => true,
		'pin2' => true,
		'puk1' => true,
		'puk2' => true,
		'subscribertype' => true,
		'subscriberstate' => true,
		'simtype' => true,
		'modifieddate' => true,
		'tariff' => true,
		'counter' => true,
		'servicetype' => true,
		'customercareuser' => true,
		'resultcode' => true,
		'transparentdata' => true,
    ];
}