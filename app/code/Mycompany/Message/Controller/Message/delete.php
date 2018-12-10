<?php

namespace Mycompany\Message\Controller\Message;

class Delete extends \Magento\Framework\App\Action\Action
{
    protected $messageRepository;
    
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Mycompany\Message\Api\MessageRepositoryInterface $messageRepository
    ) {
        parent::__construct($context);
        $this->messageRepository = $messageRepository;
    }

    public function execute()
    {
        $messageId = $this->getRequest()->getParam('id');
        
        if($messageId) {
            $this->messageRepository->deleteById($messageId);
            // TODO : Ajout d'un message ?
            $this->_redirect('mycompany_message/message/index');
            //$message = $this->messageRepository->getById($messageId);
            //return $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
        } else {
            $this->_redirect('mycompany_message/message/index');
        }
    }
}
