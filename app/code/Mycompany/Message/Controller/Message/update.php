<?php

namespace Mycompany\Message\Controller\Message;

use Magento\Framework\App\Action\Context;
use Mycompany\Message\Api\MessageRepositoryInterface;
use \Magento\Framework\Api\Search\SearchCriteriaBuilder;
use \Magento\Framework\Message\ManagerInterface;

class Update extends \Mycompany\Message\Controller\Message
{
    protected $messageManagement;

    public function __construct(
        Context $context,
        MessageRepositoryInterface $messageRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        ManagerInterface $messageManagement
    )
    {
        parent::__construct($context, $messageRepository, $searchCriteriaBuilder);
        $this->messageManagement = $messageManagement;
    }
    
    public function execute()
    {
        $messageId = $this->getRequest()->getParam('id');
        
        $dataMessage = $this->messageRepository->getById($messageId);

        if ($this->getRequest()->isPost()) {
            $dataMessage->setTitle($this->getRequest()->getParam('title'));
            $dataMessage->setContent($this->getRequest()->getParam('content'));
            $this->messageRepository->save($dataMessage);
            
            $this->messageManagement->addSuccess('Save OK');
            
            $resultRedirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setPath('*/*/index');

            return $resultRedirect;
        }

        return $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
    }
}
