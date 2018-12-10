<?php

namespace Mycompany\Message\Controller\Message;

class Update extends \Magento\Framework\App\Action\Action
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
        // TODO : IF POST > MAJ + Redirect ?
        
        
        $messageId = $this->getRequest()->getParam('id');
        
        if($messageId) {
            $message = $this->messageRepository->getById($messageId);
            return $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
        } else {
            $this->_redirect('mycompany_message/message/index');
        }
    }
}
