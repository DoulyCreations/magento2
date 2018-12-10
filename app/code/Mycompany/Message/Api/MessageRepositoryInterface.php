<?php

namespace Mycompany\Message\Api;

interface MessageRepositoryInterface
{
	/**
	 * @api
	 * @param \Mycompany\Message\Api\Data\MessageInterface $message
	 * @return \Mycompany\Message\Api\Data\MessageInterface
	 */
	public function save(\Mycompany\Message\Api\Data\MessageInterface $dataMessage);
	
	/**
	 * @api
	 * @param int $messageId
	 * @return \Mycompany\Message\Api\Data\MessageInterface
	 */
    public function getById($messageId);
	
    /**
     * @api
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Mycompany\Message\Api\Data\MessageSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
	
    /**
     * @api
     * @param \Mycompany\Message\Api\Data\MessageInterface $message
     * @return bool true on success
     */
    public function delete(\Mycompany\Message\Api\Data\MessageInterface $dataMessage);
	
    /**
     * @api
     * @param \Mycompany\Message\Api\Data\MessageInterface $messageId
     * @return bool true on success
     */
    public function deleteById($messageId);
}
