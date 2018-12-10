<?php

namespace Mycompany\Message\Controller\Message;

class Create extends \Magento\Framework\App\Action\Action
{
    protected $messageRepository;
    protected $messageFactory;
    
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Mycompany\Message\Api\MessageRepositoryInterface $messageRepository,
        \Mycompany\Message\Api\Data\MessageInterfaceFactory $messageFactory
    ) {
        parent::__construct($context);
        $this->messageRepository = $messageRepository;
        $this->messageFactory = $messageFactory;
    }

    public function execute()
    {
        if ($this->getRequest()->isPost()) {
            $dataMessage = $this->messageFactory->create();
            $dataMessage->setTitle($this->getRequest()->getParam('title'));
            $dataMessage->setContent($this->getRequest()->getParam('content'));
            $this->messageRepository->save($dataMessage);
            
            // Revoir le redirect
            $resultRedirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setPath('*/*/index');
            
            return $resultRedirect;
            
            //return $this->_redirect('*/*/index');
        }
        
        return $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
    }
}
