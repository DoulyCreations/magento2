<?php

require __DIR__ . '/app/bootstrap.php';
$bootstrap = \Magento\Framework\App\Bootstrap::create(BP, $_SERVER);
$objectManager = $bootstrap->getObjectManager();

$messageRepository = $objectManager->get('Mycompany\Message\Api\MessageRepositoryInterface');
$dataMessageFactory = $objectManager->get('Mycompany\Message\Api\Data\MessageInterfaceFactory');


// Exemple de gestion d'une date :
$date = new \DateTime();
$date->format(\Magento\Framework\Stdlib\DateTime::DATETIME_PHP_FORMAT);


for($i=1; $i <= 10; $i++) {
    $dataMessage = $dataMessageFactory->create();
    $dataMessage->setTitle('Title '.$i);
    $dataMessage->setContent('Content '.$i);
    $messageRepository->save($dataMessage);
}