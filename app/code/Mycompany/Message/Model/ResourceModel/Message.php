<?php

namespace Mycompany\Message\Model\ResourceModel;

class Message extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('mycompany_message', 'id');
    }
}
