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


/////////////////////////
// Méthode sans le service : Triple Method
$messageFactory = $objectManager->get('\Mycompany\Message\Model\MessageFactory');
$message = $messageFactory->create();
$message->setTitle('1g51er51gre');
$message->getResource()->save($message);
//$message->getResource()->load($message, $messageId);



// Collection :
$collection = $this->messageCollectionFactory->create();
$collection->addFieldToFilter('content', ['in' => 'toto']);
$collection->load();
