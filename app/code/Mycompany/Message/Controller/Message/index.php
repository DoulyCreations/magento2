<?php

namespace Mycompany\Message\Controller\Message;

class Index extends \Mycompany\Message\Controller\Message
{
    
    public function execute()
    {
        // Equivalent loadLayout et renderLayout
        return $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
    }
}
