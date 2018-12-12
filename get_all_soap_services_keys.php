<?php

require __DIR__ . '/app/bootstrap.php';
$bootstrap = \Magento\Framework\App\Bootstrap::create(BP, $_SERVER);

$objectManager = $bootstrap->getObjectManager();
$serviceMetadata = $objectManager->create('Magento\Webapi\Model\ServiceMetadata');
var_dump(array_keys($serviceMetadata->getServicesConfig()));