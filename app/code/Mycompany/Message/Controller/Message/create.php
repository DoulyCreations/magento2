<?php

namespace Mycompany\Message\Controller\Message;

class Create extends \Mycompany\Message\Controller\Message
{
    protected $messageFactory;
    
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Mycompany\Message\Api\MessageRepositoryInterface $messageRepository,
        \Magento\Framework\Api\Search\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Mycompany\Message\Api\Data\MessageInterfaceFactory $messageFactory
    ) {
        parent::__construct($context, $messageRepository, $searchCriteriaBuilder);
        $this->messageFactory = $messageFactory;
    }

    public function execute()
    {
        if ($this->getRequest()->isPost()) {
            $dataMessage = $this->messageFactory->create();
            $dataMessage->setTitle($this->getRequest()->getParam('title'));
            $dataMessage->setContent($this->getRequest()->getParam('content'));
            $this->messageRepository->save($dataMessage);
            
            $resultRedirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setPath('*/*/index');
            
            return $resultRedirect;
            
            // Anciennement :
            //return $this->_redirect('*/*/index');
        }
        
        return $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
    }
    
    public function getMessageForm()
    {
        
    }
}
