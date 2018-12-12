<?php

require __DIR__ . '/app/bootstrap.php';
$bootstrap = \Magento\Framework\App\Bootstrap::create(BP, $_SERVER);
ini_set('default_socket_timeout', 600);

// Voir get_all_soap_services_keys.php
$wsdlUrl = 'http://127.0.0.1/index.php/soap?wsdl&services=catalogProductRepositoryV1';

// ACCESS TOKEN IN API INTEGRATION
$token = 'jnwce5aprbw1otpidjbgbpw7lppm0tsg';

$opts = ['http' => ['header' => 'Authorization: Bearer ' . $token]];
$context = stream_context_create($opts);
$searchCriteria = [
	'filterGroups' => [
    	0 => [
      		'filters' => [
         		0 => [
           			'field' => 'sku',
           			'value' => '24-MB06',
           			'condition_type' => 'eq'
        		]
    		]
            ]
	]
];

$soapClient = new \Zend\Soap\Client($wsdlUrl);
$soapClient->setStreamContext($context);

$result = $soapClient->catalogProductRepositoryV1GetList(array('searchCriteria' => $searchCriteria));

var_dump($result);