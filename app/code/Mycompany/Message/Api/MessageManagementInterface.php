<?php

namespace Mycompany\Message\Api;

interface MessageManagementInterface
{
	public function canCustomerHandleMessage($messageId, $customerId);
}