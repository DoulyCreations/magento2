<?php

namespace Mycompany\Message\Api\Data;

interface MessageSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * @api
     * @return \Mycompany\Message\Api\Data\MessageInterface[]
     */
    public function getItems();

    /**
     * @api
     * @param \Mycompany\Message\Api\Data\MessageInterface[] $items
     * @return $this
     */
    public function setItems(array $items = null);
}
