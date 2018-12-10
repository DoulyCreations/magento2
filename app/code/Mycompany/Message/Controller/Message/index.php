<?php

namespace Mycompany\Message\Controller\Message;

class Index extends \Magento\Framework\App\Action\Action
{
    
    public function execute()
    {
        // Equivalent loadLayout et renderLayout
        return $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
    }
}
