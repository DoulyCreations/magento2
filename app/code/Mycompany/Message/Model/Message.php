<?php

namespace Mycompany\Message\Model;

class Message extends \Magento\Framework\Model\AbstractModel 
    implements \Mycompany\Message\Api\Data\MessageInterface
{
    protected function _construct()
    {
        $this->_setResourceModel(
                \Mycompany\Message\Model\ResourceModel\Message::class,
                \Mycompany\Message\Model\ResourceModel\Message\Collection::class
        );
    }

    public function getContent() {
        return $this->getData(self::CONTENT);
    }

    public function getCreatedAt() {
        return $this->getData(self::CREATED_AT);
    }

    public function getCustomerId() {
        return $this->getData(self::CUSTOMER_ID);
    }

    public function getObject() {
        return $this->getData(self::OBJECT);
    }

    public function getTitle() {
        return $this->getData(self::TITLE);
    }

    public function getUpdatedAt() {
        return $this->getData(self::UPDATED_AT);
    }

    public function setContent($content) {
        return $this->setData(self::CONTENT, $content);
    }

    public function setCreatedAt($createdAt) {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    public function setCustomerId($customerId) {
        return $this->setData(self::CUSTOMER_ID, $customerId);
    }

    public function setObject($object) {
        return $this->setData(self::OBJECT, $object);
    }

    public function setTitle($title) {
        return $this->setData(self::TITLE, $title);
    }

    public function setUpdatedAt($updatedAt) {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }

}
