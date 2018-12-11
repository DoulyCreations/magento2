<?php

namespace Mycompany\Message\Controller\Message;

use Magento\Framework\App\Action\Context;
use Mycompany\Message\Api\MessageRepositoryInterface;
use \Magento\Framework\Message\ManagerInterface;

class Delete extends \Mycompany\Message\Controller\Message
{
    protected $messageManagement;
    
    public function __construct(
        Context $context,
        MessageRepositoryInterface $messageRepository,
        \Magento\Framework\Api\Search\SearchCriteriaBuilder $searchCriteriaBuilder,
        ManagerInterface $messageManagement
    ) {
        parent::__construct($context, $messageRepository, $searchCriteriaBuilder);
        $this->messageManagement = $messageManagement;
    }

    public function execute()
    {
        $messageId = $this->getRequest()->getParam('id');
        
        if($messageId) {
            $this->messageRepository->deleteById($messageId);
            $this->messageManagement->addSuccess('Message '.$messageId.' supprimé');
        } else {
            $this->messageManagement->addError('Message '.$messageId.' introuvable');
        }
        
        $resultRedirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('*/*/index');
        
        return $resultRedirect;
    }
}
