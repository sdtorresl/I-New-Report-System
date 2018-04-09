<?php 
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Interaction extends Entity
{
    protected $_accessible = [
		'id' => true,
		'agentRecordId' => true,
		'customerId' => true,
		'userId' => true,
		'sfccSessionId' => true,
		'interactionType' => true,
		'callRecId' => true,
		'callStartMsec' => true,
		'callId' => true,
		'campaignId' => true,
		'campaign' => true,
		'channelId' => true,
		'loadFactor' => true,
		'agentState' => true,
		'currentWrapUp' => true,
		'serviceNumber' => true,
		'callingNumber' => true,
		'agentCallId' => true,
		'extension' => true,
		'conferenceId' => true,
		'stampDtm' => true,
		'stampMsec' => true,
		'intStartMsec' => true,
		'busyStartMsec' => true,
		'stateChgMemId' => true
    ];
}