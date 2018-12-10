<?php

namespace Mycompany\Message\Model\ResourceModel\Message;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
                \Mycompany\Message\Model\Message::class,
                \Mycompany\Message\Model\ResourceModel\Message::class
        );
    }
}
