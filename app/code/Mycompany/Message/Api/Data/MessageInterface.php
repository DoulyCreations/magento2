<?php

namespace Mycompany\Message\Api\Data;

interface MessageInterface
{
	/**#@+
	 * Constants defined for keys of the data array. Identical to the name of the getter in snake case
	 */
	const ID = 'id';
	const CUSTOMER_ID = 'customer_id';
	const TITLE = 'title';
	const CONTENT = 'content';
	const OBJECT = 'object';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	/**#@-*/
	
	/**
	 * @api
	 * @return int
	 */
	public function getId();
	
	/**
	 * @api
	 * @param int $id
     * @return $this
	 */
	public function setId($id);
	
	/**
	 * @api
	 * @return int|null
	 */
	public function getCustomerId();
	
	/**
	 * @api
	 * param int $customerId
     * @return $this
	 */
	public function setCustomerId($customerId);
	
	/**
	 * @api
	 * @param string $title
     * @return $this
	 */
	public function setTitle($title);
	
	/**
	 * @api
	 * @return string|null
	 */
	public function getTitle();
	
	/**
	 * @api
	 * @param string $content
     * @return $this
	 */
	public function setContent($content);
	
	/**
	 * @api
	 * @return string|null
	 */
	public function getContent();
	
	/**
	 * @api
	 * @param string $object
     * @return $this
	 */
	public function setObject($object);
	
	/**
	 * @api
	 * @return string|null
	 */
	public function getObject();
	
	/**
	 * @api
	 * @return string|null
	 */
	public function getCreatedAt();
	
	/**
	 * @api
	 * @param string $createdAt
     * @return $this
	 */
	public function setCreatedAt($createdAt);
	
	/**
	 * @api
	 * @return string|null
	 */
	public function getUpdatedAt();
	
	/**
	 * @api
	 * @param string $updatedAt
     * @return $this
	 */
	public function setUpdatedAt($updatedAt);
}