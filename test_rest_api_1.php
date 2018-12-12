<?php

require __DIR__ . '/app/bootstrap.php';
$bootstrap = \Magento\Framework\App\Bootstrap::create(BP, $_SERVER);
ini_set('default_socket_timeout', 600);

// ACCESS TOKEN IN API INTEGRATION
$token = 'jnwce5aprbw1otpidjbgbpw7lppm0tsg';
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

$httpHeaders = new \Zend\Http\Headers();
$httpHeaders->addHeaders([
	'Authorization' => 'Bearer ' . $token,
	'Accept' => 'application/json',
	'Content-Type' => 'application/json'
]);

$request = new \Zend\Http\Request();
$request->setHeaders($httpHeaders);
$request->setUri('http://127.0.0.1/magento2_formationref/index.php/rest/V1/products');
$request->setMethod(\Zend\Http\Request::METHOD_GET);
$request->setQuery(new \Zend\Stdlib\Parameters([
	'searchCriteria' => $searchCriteria
]));

$client = new \Zend\Http\Client();
$options = [
	'adapter'   => 'Zend\Http\Client\Adapter\Curl',
	'curloptions' => [CURLOPT_FOLLOWLOCATION => true],
	'maxredirects' => 0,
	'timeout' => 100
];
$client->setOptions($options);

$response = $client->send($request);

var_dump($response->getBody());